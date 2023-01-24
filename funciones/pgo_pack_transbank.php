<?php
define('_Url', 'http://'.$_SERVER['HTTP_HOST'].'/');
define('_Iva', '0.19');

// * caputara los datos
include("../include/conx_pdo.php");
include("../include/conx.php");

// * estado del tbk
function estado_tbk(){
  include("../include/conx.php");
  $data = false;

  $re = $mysqli->query("SELECT dato FROM configuracion WHERE tipo = 'tbk' ") or die(mysql_error());
    while($f = $re->fetch_object()){
      $data =  $f->dato;
    }
  $mysqli->close();
  return $data == "no" ? false : true;
}

// * email diferido el original esta en funciones
function get_email_usaurrio(){
  include("../include/conx_pdo.php");

  $cantidad = array();

  $sql = "SELECT email FROM email_diferido";

  $result = $base->prepare($sql);
  $result->execute();

  while($f = $result->fetch(PDO::FETCH_OBJ)){
    array_push($cantidad,$f->email);
  }

  $data = "";
  $cont = 1;

  $sql = "SELECT cont, email FROM email_diferido WHERE estado = 1 LIMIT 1";

  $result = $base->prepare($sql);
  $result->execute();

  while($f = $result->fetch(PDO::FETCH_OBJ)){
      $cont = $f->cont;
      $data = $f->email;
  }

  $cont_select = $cont;

  $sql = "UPDATE email_diferido SET estado = 0";
  $stmt= $base->prepare($sql);
  $stmt->execute();
              // 2          1
  if(count($cantidad)  > $cont){
    // resetear a 1
    $update = $cont + 1;
    $sql = "UPDATE email_diferido SET estado = 1 WHERE cont = '$update'";
    $stmt= $base->prepare($sql);
    $stmt->execute();
  }else{
    // se suma 1
    $sql = "UPDATE email_diferido SET estado = 1 WHERE cont = 1";
    $stmt= $base->prepare($sql);
    $stmt->execute();
  }
  // 3 -> 0, 1, 2
  $base = null;
  $result->closeCursor();

  return array($data,$cont_select);
}



// * toma los datos del producto
function get_data_product($id){ 
  include("../include/conx.php");
  $data = array();
  $re = $mysqli->query("SELECT id, codigo, p_venta, oferta ,p_oferta FROM packs WHERE id = '$id'") or die(mysql_error());
      while($f = $re->fetch_object()){
        $total = $f->p_oferta + (_Iva * $f->p_oferta);
        $data = array("id" => $f->id, "codigo" => $f->codigo, "total" => $total);
  }
  $mysqli->close();
  return $data;
}

// * toma el ultimo id con el email por si se genera otro al mismo tiempo
function get_las_id($email){
  include("../include/conx.php");
  $numero = 0;
  $re = $mysqli->query("SELECT max(id) FROM cotizaciones WHERE email = '$email'") or die(mysql_error());
  $row = $re->fetch_row();
  $numero = $row[0];
  $mysqli->close;

  return $numero;
}

function get_data_pac($id_pack){
  include("../include/conx.php");
  $nombre = "";
  $re = $mysqli->query("SELECT descripcion FROM packs WHERE id = '$id_pack'") or die(mysql_error());
  $row = $re->fetch_row();
  $nombre = $row[0];
  $mysqli->close;

  return $nombre;
}

// * toma los datos del producto
function get_productos_pack($id_pack){
  include("../include/conx.php");
  
  $productos = array();

  $re = $mysqli->query("SELECT id_producto
                        FROM productos_packs 
                        WHERE id_pack = '$id_pack'") or die(mysql_error());
      while($f = $re->fetch_object()){
        array_push($productos, array("id_producto" => $f->id_producto));
  }
  $mysqli->close();
  return $productos;
}

// 
// * inicio del script
// 

$nombre = $_POST["nombre"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$region = $_POST["region"];
$ciudad = $_POST["ciudad"];
$direccion = $_POST["direccion"];
$msg = $_POST["msg"];

$idPorducto = $_POST["id"]; // ? es el id del pack
$nombre_pack = get_data_pac($idPorducto);
$productos = get_productos_pack($idPorducto);

$id_producto =  $_POST["cantidad"] == 0 ? 1 : $_POST["cantidad"];

$total = get_data_product($idPorducto)["total"];

// * capturar id_email_diferido
$data_element = get_email_usaurrio();
$email_diferido = $data_element[0];
$id_email = $data_element[1];



// * agregar productos a cotizacion
$mysqli->query("INSERT INTO cotizaciones (empresa, nombre, apellido, email, telefono, region, 
                                                    ciudad, direccion, nota, id_email_diferido) 
                                            VALUES('$nombre','$nombre', '$nombre', '$email', '$phone', '$region',
                                                    '$ciudad', '$direccion', '$msg', '$id_email')");
// $mysqli->close();
$max_id = get_las_id($email);

// * aghreagr producto cotizado
for ($i=0; $i < count($productos) ; $i++) { 
  $id_prod = $productos[$i]["id_producto"];
  $mysqli->query("INSERT INTO productos_cotizaciones (id_cotizacion, id_producto, pack, cantidad) 
                                              VALUES('$max_id','$id_prod', '$nombre_pack' ,'1')");
}


// * detalle TBK

require_once '../vendor/autoload.php';

use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;
use Transbank\Webpay\WebpayPlus\Transaction;

// * si es verdadora en tra en produccion
$transaction = new \Transbank\Webpay\WebpayPlus\Transaction();
if(estado_tbk() == true){
  $transaction->configureForProduction('597034933758','4673a07d56f3795194955b2195f983cb');
}else{
  $transaction->configureForIntegration('597055555532', '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');
}


$return_url     = _Url.'transbank_retorno.php';
$buy_order      = $max_id;
$amount         = $total;
$uniqId         = uniqid();

// * inserta datos token



$createResponse = $transaction->create($buy_order, $uniqId, $amount, $return_url);

$redirectUrl = $createResponse->getUrl().'?token_ws='.$createResponse->getToken();
$_SESSION['token'] = $createResponse->getToken();

$token = $_SESSION['token'];

$mysqli->query("INSERT INTO transbank (id_order, session_id, token, total) 
                                             VALUES('$buy_order', '$uniqId', '$token', '$amount')");
$mysqli->close();


echo $redirectUrl;



?>