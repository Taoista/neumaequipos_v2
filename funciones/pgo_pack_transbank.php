<?php
define('_Url', 'https://'.$_SERVER['HTTP_HOST'].'/');

// * caputara los datos
include("../include/conx_pdo.php");

// * toma los datos del producto
function get_data_product($id){ 
  include("../include/conx_pdo.php");

  $data = array();

  $sql = "SELECT id, codigo, oferta, v_oferta, p_venta FROM productos WHERE id = '$id'";

  $result = $base->prepare($sql);
  $result->execute();

  while($f = $result->fetch(PDO::FETCH_OBJ)){

    $total = $f->oferta == 1 ? $f->p_oferta : $f->p_venta;

    $data = array("id" => $f->id, "codigo" => $f->codigo, "total" => $total);
  }

  $base = null;
  $result->closeCursor();

  return $data;
}


$nombre = $_POST["nombre"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$region = $_POST["region"];
$ciudad = $_POST["ciudad"];
$direccion = $_POST["direccion"];
$msg = $_POST["msg"];
$idPorducto = $_POST["id"];
$id_producto =  $_POST["cantidad"] == 0 ? 1 : $_POST["cantidad"];

$total = get_data_product($idPorducto)["total"];

// * agregar productos a cotizacion


// * aghreagr producto cotizado


// * detalle TBK


$mysqli->query("INSERT INTO cotizaciones (empresa, nombre, apellido, email, telefono, region, ciduad, direccion,) 
                                            VALUES('$status', '$sessionId', '$fecha', 
                                            '$token', '$card_detail', '$paymentTypeCode',
                                            '$uAmount','$iNuber', '$total')");
$mysqli->close();




require_once '../vendor/autoload.php';


use Transbank\Webpay\Webpay;
use Transbank\Webpay\Configuration;
use Transbank\Webpay\WebpayPlus\Transaction;


$transaction = new \Transbank\Webpay\WebpayPlus\Transaction();

$transaction->configureForProduction('597034933758','4673a07d56f3795194955b2195f983cb');


$return_url     = _Url.'transbank_retorno.php';

$buy_order      = $cotizacion;
// $buy_order      = $cotizacion;
$amount         = $total;
$uniqId         = uniqid();

$createResponse = $transaction->create($buy_order, $uniqId, $amount, $return_url);

$redirectUrl = $createResponse->getUrl().'?token_ws='.$createResponse->getToken();
$_SESSION['token'] = $createResponse->getToken();
echo $_SESSION['token'];
header('Location: '.$redirectUrl, true, 302);





?>