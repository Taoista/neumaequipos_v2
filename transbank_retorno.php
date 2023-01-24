<?php

include_once("funciones/funciones.php");


// * estado del tbk pago o test
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

// * toma lso datos del tbk
function response_tbk($token){
  include("./include/conx.php");
  $data = false;

  $re = $mysqli->query("SELECT `status`, status_code FROM transbank WHERE token = '$token'") or die(mysql_error());
    while($f = $re->fetch_object()){
      $data =  $f->status;
  }

  $mysqli->close();
  return $data;
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


$token = !isset($_POST['token_ws']) ? $_GET['token_ws'] :  null;
$buyOrder = 0;
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
    $iNuber             = $response->installmentsNumber == "" ? 0 : $response->installmentsNumber;
    $uAmount            = $response->installmentsAmount == '' ? 0 : $response->installmentsAmount;
    $sessionId          = $response->sessionId;
    $buyOrder           = $response->buyOrder;
    $cardNumber         = $response->cardNumber;
    $transDate          = $response->transactionDate;

    $mysqli->query("UPDATE transbank SET `status` = '$status', status_code = '$respCode', authorizationCode = '$auCode',
                    paymentTypeCode = '$paymentTypeCode', accountingDate = '$accountingDate', installmentsNumber = '$iNuber',
                    cardNumber = '$cardNumber', installmentsAmount = '$uAmount' WHERE id_order = '$buyOrder'");


    $mysqli->close();
}else{
// ? rechzada
    $token = $_GET['TBK_TOKEN'] ?? $_POST['TBK_TOKEN'] ?? null;
    $buyOrder = $_GET['TBK_ORDEN_COMPRA'] ?? $_POST['TBK_ORDEN_COMPRA'] ?? null;
    $sessionId = $_GET['TBK_ID_SESION'] ?? $_POST['TBK_ID_SESION'] ?? null;
}


  $token = !isset($_POST['token_ws']) ? $_GET['token_ws'] :  null;
  // * resultado redirecciona
  $response = response_tbk($token);

  if($response == "AUTHORIZED"){
    // * como paso a ser autorizado debe enviar

    // * toma los datos de la cotizacion
    $data_token = get_data_token($token);
    // * toma los datos cotizados o el pack comprado
    $productos = get_productos_payment($data_token["id_order"]);

    $cliente_asunto     = "neumaequipos.cl Compra Nº ".$buyOrder;
    ob_start();
    include_once("./funciones/email-tbk/email.php");

    $nombre = $data_token["nombre"].' '.$data_token["apellido"];
    $email = $data_token["email"];
    $telefono = $data_token["telefono"];
    $fecha = $data_token["fecha"];
    $hora = '';
    $pack = $title = $productos[0]["tipo"] == '0' ? '' :$productos[0]["tipo"];
    $forma_pago = $data_token["tarjeta"];
    $codig_pago = $data_token['n_tarjeta'];
    $cant_ctas = $data_token["cuotas"];
    $val_ctas = $data_token["val_cuotas"];
    $productos = $productos;
    $region = $data_token["region"];
    $ciudad = $data_token["ciudad"];
    $direccion = $data_token["direccion"];
    $total = $data_token["total"];

    $correo_php             = ob_get_contents();
    ob_end_clean();

    $desde                 = 'MIME-Version: 1.0' . "\r\n";
    $desde                 .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $desde                 .= "From:"."	neumaequipos.cl <no-reply@neumaequipos.cl>";
    // // mail cliente

    // * verifica si el estado esta como debug
    if(estado_test() == false){
      // mail($contacto_admin,$cliente_asunto,$correo_php,$desde);
      // mail($email,$cliente_asunto,$correo_php,$desde);
      mail("luis.olave.carvajal@gmail.com",$cliente_asunto,$correo_php,$desde);

    }else{
      mail("luis.olave.carvajal@gmail.com",$cliente_asunto,$correo_php,$desde);
    }




    header('Location: '._Url.'transbank_result.php?token='.$token);
  }else{
    header('Location: '._Url.'transbank_result_fail.php/');
  }

?>