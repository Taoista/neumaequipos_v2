<?php
    include_once("./funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("./include/head.inc.php");

    $phone_postventa = get_phone(3);

    $datos_token = get_data_token($_GET["token"]);
    $productos = get_productos_payment($datos_token["id_order"]);
 
    // * ruta demo
    // http://localhost:8080/transbank_result.php?token=01aba9a330a561d26183bfbe010bcbf87ac2264e680cd813255ba319e34d9655
    // * 01ab7778bf7176c51e693758e0cc27600f5d2cbeb379fd531848a9c473c7027b
?>
<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?php echo _Url; ?>">home</a></li>
                            <li>Pago Transbank</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
     <!--contact map start-->
    <div class="contact_map mt-30">
    </div>
    <!--contact map end-->
    <!--contact area start-->
    <div class="contact_area">
        <div class="container">   
            <div class="row">
                <div class="col-lg-6 col-md-12">
                   <div class="contact_message content">
                        <h3>Gracias por Tu compra</h3>    
                        <ul>
                            <?php
                            $dateString = $datos_token["fecha"];
                            $timestamp = strtotime($dateString);
                            $formattedDate = date("d-m-Y", $timestamp);
                            ?>
                            <li style="font-size: 17px;">N Compra : <?php echo $datos_token["id_order"] ?></li>
                            <li style="font-size: 17px;">Fecha : <?php echo $formattedDate ?></li>
                            <li style="font-size: 17px;">Nombre : <?php echo ucfirst($datos_token["nombre"]." ".ucfirst($datos_token["apellido"])) ?></li>
                            <li style="font-size: 17px;">R.social : <?php echo ucfirst($datos_token["empresa"]) ?></li>
                        </ul>      
                    </div>
                    <div class="contact_message content mt-30">
                        <h3>Forma de compra</h3><br>
                        <ul>
                            <li style="font-size: 17px;">N Tarjeta : <?php echo $datos_token["tarjeta"] ?></li>
                            <li style="font-size: 17px;">N Tarjeta : <?php echo $datos_token["n_tarjeta"] ?></li>
                            <?php if($datos_token["cuotas"] != 0): ?>
                            <li style="font-size: 17px;">N Tarjeta : <?php echo $datos_token["cuotas"] ?></li>
                            <li style="font-size: 17px;">Val Cuotas: <?php echo fomato_moneda($datos_token["val_cuota"]) ?></li>
                            <?php endif ?>
                            <li style="font-size: 17px;">Val Cuotas: <?php echo fomato_moneda($datos_token["total"]) ?></li>
                        </ul> 
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="contact_message content mt-30">
                        <?php 
                        $title = $productos[0]["tipo"] == '0' ? '' :$productos[0]["tipo"];
                        ?>
                        <h3>Productos <?php echo $title ?></h3><br>
                        <ul>
                            <?php for ($i=0; $i < count($productos) ; $i++) { ?>
                                <li style="font-size: 17px;"><?php echo strtoupper($productos[$i]["descripcion"]) ?></li>
                            <?php } ?>
                        </ul> 
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!--contact area end-->
    <!--call to action start-->
    <section class="call_to_action">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="call_action_inner">
                        <div class="call_text">
                            <h3>Siguenos en <span>Nuestras Redes Sociales</span></h3>
                            <p>Enterate minúto a minúto de nuestas ofertas y/o promociones</p>
                        </div>
                        <div class="discover_now">
                            <a href="#">Contáctanos</a>
                        </div>
                        <div class="link_follow">
                            <ul>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--call to action end-->
     <!--footer area start-->
    <?php include_once("include/footer.inc.php"); ?>
    <!--footer area end-->
    <!-- modal area start-->
   
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<script>
function enviar_post_venta(){
    console.log("llamando");
}
</script>
</body>
</html>