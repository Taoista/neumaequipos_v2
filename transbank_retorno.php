<?php

define('_Url', 'https://'.$_SERVER['HTTP_HOST'].'/');

require_once './vendor/autoload.php';
use Transbank\Webpay\WebpayPlus\Transaction;
$transaction = new Transaction();

$commerceCode  = '597034933758';
$apiKeySecret  = '4673a07d56f3795194955b2195f983cb';

$transaction->configureForProduction($commerceCode, $apiKeySecret);

if($token != null){
    // $response = $transaction->commit($token);
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
}else{
    $token = $_GET['TBK_TOKEN'] ?? $_POST['TBK_TOKEN'] ?? null;
    $buyOrder = $_GET['TBK_ORDEN_COMPRA'] ?? $_POST['TBK_ORDEN_COMPRA'] ?? null;
    $sessionId = $_GET['TBK_ID_SESION'] ?? $_POST['TBK_ID_SESION'] ?? null;
}


function get_data_compra_tbk($id){
    include("./include/conx_pdo.php");
    
    $data = array();
  
    $sql = "SELECT t.status ,t.fecha, t.card_detail, t.payment_type_code, t.installments_amount, 
                  t.installments_number, t.total, p.img, p.descripcion, c.enviado, ptc.nombre AS tipo_pago,
                  c.nombre AS c_nombre, c.telefono AS telefono, c.email, c.region, c.ciudad, c.direccion
            FROM transbank AS t 
            INNER JOIN compras AS c
            ON t.id_compra = c.id
            INNER JOIN packs AS p
            ON c.id_pack = p.id
            INNER JOIN payment_type_code AS ptc
            ON t.payment_type_code = ptc.tipe
            WHERE t.id = '$id'";
  
    $result = $base->prepare($sql);
    $result->execute();
  
    while($f = $result->fetch(PDO::FETCH_OBJ)){
      $data = array("status" => $f->status, "fecha" => $f->fecha, "card_detail" => $f->card_detail, "payment_type_code" => $f->payment_type_code, 
                  "installments_amount" => $f->installments_amount, "installments_number" => $f->installments_number, "total" => $f->total, 
                  "img" => $f->img, "descripcion" => $f->descripcion, "enviado" => $f->enviado, "tipo_pago" => $f->tipo_pago,
                  "c_nombre" => $f->c_nombre, "telefono" => $f->telefono, "email" => $f->email, "region" => $f->region, "ciudad" => $f->ciudad, 
                  "direccion" =>$f->direccion);
    }
  
    $base = null;
    $result->closeCursor();
  
    return $data;
  }


  $token = !isset($_POST['token_ws']) ? $_GET['token_ws'] :  null;


if($token != null){
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

    $fecha = now();

    $mysqli->query("INSERT INTO transbank (`status`, `session_id`, `fecha`, 
                                            card_detail, payment_type_code, installments_amount, 
                                            installments_number, total) 
                                            VALUES('$status', '$sessionId', '$fecha', 
                                            '$token', '$card_detail', '$paymentTypeCode',
                                            '$uAmount','$iNuber', '$total')");
    $mysqli->close();


}else{
    $token =  null;
    $buyOrder = null;
    $sessionId =  null;
}


?>