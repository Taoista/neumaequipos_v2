<?php

define('_Url', 'https://'.$_SERVER['HTTP_HOST'].'/');

// * estado del tbk
function estado_tbk(){
    include("./include/conx.php");
    $data = false;
  
    $re = $mysqli->query("SELECT dato FROM configuracion WHERE tipo = 'tbk' ") or die(mysql_error());
      while($f = $re->fetch_object()){
        $data =  $f->dato;
      }
    $mysqli->close();
    return $data == "no" ? false : true;
}

require_once './vendor/autoload.php';
use Transbank\Webpay\WebpayPlus\Transaction;
$transaction = new Transaction();

$transaction = new \Transbank\Webpay\WebpayPlus\Transaction();
if(estado_tbk() == true){
  $transaction->configureForProduction('597034933758','4673a07d56f3795194955b2195f983cb');
}else{
  $transaction->configureForIntegration('597055555532', '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C');
}

echo "hola";

$token = !isset($_POST['token_ws']) ? $_GET['token_ws'] :  null;

echo $token.'<br>';


// ? aceptada
if($token != null){
    include("./include/conx.php");

    $response = $transaction->commit($token);

    $vci                = $response->vci;
    $status             = $response->status;
    $respCode           = $response->responseCode;
    $monto              = $response->amount;
    $auCode             = $response->authorizationCode;
    $paymentTypeCode    = $response->paymentTypeCode;
    $accountingDate     = $response->accountingDate;
    $iNuber             = $response->installmentsNumber;
    $uAmount            = $response->installmentsAmount;
    $sessionId          = $response->sessionId;
    $buyOrder           = $response->buyOrder;
    $cardNumber         = $response->cardNumber;
    $transDate          = $response->transactionDate;
    echo "enchtro"."<br>";
    $mysqli->query("UPDATE transbank SET `status` = '$status', status_code = '$respCode', authorizationCode = '$auCode',
                    paymentTypeCode = '$paymentTypeCode', accountingDate = '$accountingDate', installmentsNumber = '$iNuber',
                    cardNumber = '$cardNumber', installmentsAmount = '$installmentsAmount' WHERE id_order = '$buyOrder' ");
    echo "termino insert"."<br>";
    $mysqli->close();
}else{
// ? rechzada
    $token = $_GET['TBK_TOKEN'] ?? $_POST['TBK_TOKEN'] ?? null;
    $buyOrder = $_GET['TBK_ORDEN_COMPRA'] ?? $_POST['TBK_ORDEN_COMPRA'] ?? null;
    $sessionId = $_GET['TBK_ID_SESION'] ?? $_POST['TBK_ID_SESION'] ?? null;
}


// function get_data_compra_tbk($id){
//     include("./include/conx_pdo.php");
    
//     $data = array();
  
//     $sql = "SELECT t.status ,t.fecha, t.card_detail, t.payment_type_code, t.installments_amount, 
//                   t.installments_number, t.total, p.img, p.descripcion, c.enviado, ptc.nombre AS tipo_pago,
//                   c.nombre AS c_nombre, c.telefono AS telefono, c.email, c.region, c.ciudad, c.direccion
//             FROM transbank AS t 
//             INNER JOIN compras AS c
//             ON t.id_compra = c.id
//             INNER JOIN packs AS p
//             ON c.id_pack = p.id
//             INNER JOIN payment_type_code AS ptc
//             ON t.payment_type_code = ptc.tipe
//             WHERE t.id = '$id'";
  
//     $result = $base->prepare($sql);
//     $result->execute();
  
//     while($f = $result->fetch(PDO::FETCH_OBJ)){
//       $data = array("status" => $f->status, "fecha" => $f->fecha, "card_detail" => $f->card_detail, "payment_type_code" => $f->payment_type_code, 
//                   "installments_amount" => $f->installments_amount, "installments_number" => $f->installments_number, "total" => $f->total, 
//                   "img" => $f->img, "descripcion" => $f->descripcion, "enviado" => $f->enviado, "tipo_pago" => $f->tipo_pago,
//                   "c_nombre" => $f->c_nombre, "telefono" => $f->telefono, "email" => $f->email, "region" => $f->region, "ciudad" => $f->ciudad, 
//                   "direccion" =>$f->direccion);
//     }
  
//     $base = null;
//     $result->closeCursor();
  
//     return $data;
//   }


  $token = !isset($_POST['token_ws']) ? $_GET['token_ws'] :  null;


echo "terminado";

?>