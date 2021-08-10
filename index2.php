<?php
    session_start();
    echo '=================== inicinado 2'."<br>";
    include_once("funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php");
    $mostrar_pack = mostrar_pack();
?>

<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <!--Offcanvas menu area end-->
    <!--slider area start-->
    <section class="slider_section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slider_area owl-carousel">
                        <!-- <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo _Url; ?>assets/img/slider/slider1.jpg">
                            <div class="slider_content">
                                <h2>Calidad Superior</h2>
                                <h1>Compresor de Pistón</h1>
                                <a class="button" href="shop.html">Ver compresores</a>
                                <img src="<?php echo _Url;?>demo.jpg" alt="">
                            </div>
                        </div> 
                    slider_content => width:
                    -->
                        <div class="single_slider d-flex align-items-center" data-bgimg="<?php echo _Url; ?>assets/img/slider/slider2.jpg">
                            <div class="slider_content">
                                <h2>Equipamiento Automotriz</h2>
                                <h1 style="text-align: right">Tenemos todo para su taller</h1>
                                <a class="button" href="shop.html">Ver mas</a>
                                <h2 class="owl-item"><img src="<?php echo _Url;?>demo.jpg" alt=""></h2>
                                
                            </div>
                        </div>
                        <!-- <div class="single_slider d-flex align-items-center" data-bgimg="assets/img/slider/slider3.jpg"> -->
                            <!-- <div class="slider_content">
                                <h2>Pagar ahora es mas</h2>
                                <h1>Fácil, Rapido y Seguro</h1>
                                <a class="button" href="shop.html">shopping now</a>
                            </div> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider area end-->

    <!--brand area start-->
    <div class="brand_area mb-42">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand_container owl-carousel">
                        <div class="single_brand">
                            <img src="assets/img/brand/brand.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand1.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand2.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand3.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand4.png" alt="">
                        </div>
                        <div class="single_brand">
                            <img src="assets/img/brand/brand2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PACKS -->

    <?php if($mostrar_pack["dato"] == "si"){
     include_once("include/explusivo.inc.php");
     } ?>

    <!--  -->
    <section class="shipping_area mb-50">
        <div class="container">
            <div class=" row">
                <div class="col-12">
                    <div class="shipping_inner">
                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/icon/envio.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>DESPACHO</h2>
                                <p>Despacho desde Antofagasta hasta Punta Arenas</p>
                            </div>
                        </div>

                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/icon/porcentaje.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>OFERTA</h2>
                                <p>Mejores Precios y nuevas promociones cada mes</p>
                            </div>
                        </div>

                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/icon/10.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>6 CUOTAS SIN INTERES</h2>
                                <p>Recibe link de Webpay, llena datos y relaiza el pago </p>
                            </div>
                        </div>

                        <div class="single_shipping">
                            <div class="shipping_icone">
                                <img src="assets/img/icon/asesoria.png" alt="">
                            </div>
                            <div class="shipping_content">
                                <h2>ASESORIA</h2>
                                <p>Asesoría técnica y servicio de Postventa personalizado</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--small product area start-->
    <section class="small_product_area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2><span> <strong>Productos</strong>Destacados</span></h2>
                    </div>

                    <div class="product_carousel small_product product_column3 owl-carousel">
                        <?php
                            for ($i=0; $i < count($destacados) ; $i++) {
                            $link = _Url.'producto/'.$destacados[$i]["id"].'/'.generar_url($destacados[$i]["descripcion"]);
                        ?>

                        <div class="single_product">
                            <div class="product_content">
                                <h3><a href="<?php echo $link; ?>"><?php echo $destacados[$i]["descripcion"]; ?></a></h3>
                                <div class="product_ratings">
                                    <ul>
                                        <?php for ($x=0; $x < $destacados[$i]["star"] ; $x++) {  ?>
                                            <li><a href="javascript:void(0);"><i class="ion-star"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_thumb">
                                <a class="primary_img" href="<?php echo $link; ?>"><img
                                        src="<?php echo "productos/".$destacados[$i]["img"].".jpg"; ?>" alt=""></a>
                            </div>
                        </div>
                        <!--  -->
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('include/folowus.inc.php'); ?>

    <?php include_once('include/footer.inc.php'); ?>

    <?php //include_once("include/popup.inc.php"); ?>

    <?php include_once("include/script.inc.php"); ?>

</body>
</html>

