<?php
    include_once("funciones/funciones.php");
    $state_popup    = state_popup();
    $destacados     = productos_destacados();
    include_once("include/head.inc.php");
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
                            <li><a href="index.html">home</a></li>
                            <li>Contactos post venta</li>
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
                        <h3>Contacto</h3>    
                         <p>Te responderemos lo mas pronto posible tus consultas ó inquietudes. <br>
                        Contamos con el personal calificado para atenderte</p>
                        <ul>
                            <li><i class="fas fa-map-marker-alt"></i>  Dirección : Santa Margarita 0448, San Bernardo</li>
                            <li><i class="fa fa-envelope-o"></i> <a href="#">postventa@neumaquipos.cl</a></li>
                            <li><i class="fa fa-phone"></i><a href="tel:56959038284">Móvil: +56 9 5903 8284 </a> </li>
                            <li><i class="fa fa-phone"></i><a href="tel:56224846074">Anexo: +56 2 2484 6074 </a> </li>
                        </ul>             
                    </div> 
                </div>
                <div class="col-lg-3 col-md-12">
                   <div class="contact_message form">
                        <h3>Escribenos tu Solicitud</h3>   
                            <p>  
                               <label> Rut</label>
                                <input id="rut" name="name" placeholder="ingresa aquí *" type="text"> 
                            </p>
                            <p>       
                               <label>  Dirección</label>
                                <input id="direccion" name="email" placeholder="ingresa aquí  *" type="email">
                            </p>
                            <p>          
                               <label>  Asunto</label>
                                <input id="asunto" name="subject" placeholder="ingresa aquí  *" type="text">
                            </p>    
                                <div class="contact_textarea">
                                    <label>  Mensaje</label>
                                    <textarea id="msg" placeholder="Mensaje *" name="Escribe aquí "  class="form-control2" ></textarea>     
                                </div>   
                                <button onclick="enviar_post_venta();" type="submit"> Enviar</button>  
                    </div> 
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="contact_message form">
                         <h3>.</h3>   
                             <p>  
                                <label> Razon Social </label>
                                 <input id="razon_soc" name="name" placeholder="ingresa aquí *" type="text"> 
                             </p>
                             <p>       
                                <label>  Teléfono</label>
                                 <input name="email" placeholder="ingresa aquí  *" type="email">
                             </p>
                             <div class="col-6 mb-20">
                                <label for="country">Mantención <span>*</span></label>
                                <select id="selec_mantencion" class="niceselect_option" name="cuntry" id="country"> 
                                    <option value="2">Balanceadora</option>      
                                    <option value="3">Alineadora</option> 
                                    <option value="4">Elevador</option>    
                                    <option value="5">Desmontadora</option>    
                                    <option value="6">Torno</option>    
                                    <option value="7">Compresor</option>    
                                    <option value="8">Bomba neumatica</option>    
                                    <option value="9">Aire Acondicionado</option>   
                                </select>
                            </div>   
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
     <footer class="footer_widgets">
        <div class="container">
            <div class="footer_top">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container contact_us">
                            <div class="footer_logo">
                                <a href="#"><img src="assets/img/logo/logo_v.png" alt=""></a>
                            </div>
                            <div class="footer_contact">
                                <p>Neumaequipos nace como una empresa de Urrutia y Otarola ltda, ante la necesidad
                                    constante de nuestros clientes, por contar con productos de calidad que puedan
                                    suplir sus diferentes necesidades en el rubro de maquinarias, talleres automotrices
                                    entre otros rubros.</p>
                                <p><span>Dirección</span>  Santa Margarita 0448<br> San Bernardo, Santiago Chile</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Productos</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="about.html">Balanceadora</a></li>
                                    <li><a href="#">Alineadora</a></li>
                                    <li><a href="privacy-policy.html">Elevadores</a></li>
                                    <li><a href="coming-soon.html">Desmontadoras</a></li>
                                    <li><a href="#">Torno</a></li>
                                    <li><a href="#">Red de lubricación</a></li>
                                    <li><a href="#">Compresores</a></li>
                                    <li><a href="#">Mantención</a></li>
                                    <li><a href="videos.html">Videos</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widgets_container widget_menu">
                            <h3>Contactos</h3>
                            <div class="footer_menu"> 
                                <ul>
                                    <li><p><span> <b>Ventas:</b> </span> <a href="tel:+56959120748">+56 9 5912 0748</a></p></li>
                                     </p></span> <a href="tel:+56954104080">+56 9 5410 4080</a></p>
                                    </p></span> <a href="tel:+56224846055">+56 2 2484 6055</a></p>
                                    <li><p><span> <b>Post Venta:</b> </span> <a href="tel:+56959038284">+56 9 5903 8284</a></p></li>
                                    </p></span> <a href="tel:+5622484 6074">+56 2 2484 6074</a></p>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container">
                            <h3>Email</h3>
                            <div class="footer_menu">
                                <ul>
                                    <li></span> <a href="rbustos@neumachile.cl">Rbustos@neumachile.cl</a></p></li>
                                    <li></span> <a href="imorales@neumachile.cl">Imorales@neumachile.cl</a></p></li>
                                </ul>
                            </div>
                            <hr>
                            <h3>Suscribete a nuestro Newsletter</h3>
                            <p> Nunca compartiremos su dirección de correo electrónico con un tercero..</p>
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off"
                                        placeholder="Tu Email ..." />
                                    <button id="mc-submit">Suscribirme</button>
                                </form>
                                <!-- mailchimp-alerts Start -->
                                <div class="mailchimp-alerts text-centre">
                                    <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                    <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                                    <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                                </div><!-- mailchimp-alerts end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2021 <a href="https://www.neumachile.cl/">Neumachile</a> Todos los Derechos reservados.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer_payment text-right">
                            <a href="#"><img src="assets/img/icon/payment.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer area end-->
    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product1.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product2.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product3.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img src="assets/img/product/product5.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
                                                    aria-controls="tab1" aria-selected="false"><img
                                                        src="assets/img/product/product1.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                    aria-controls="tab2" aria-selected="false"><img
                                                        src="assets/img/product/product2.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                    role="tab" aria-controls="tab3" aria-selected="false"><img
                                                        src="assets/img/product/product3.jpg" alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                                    aria-controls="tab4" aria-selected="false"><img
                                                        src="assets/img/product/product5.jpg" alt=""></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Handbag feugiat</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price">$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                            laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                            in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                            recusandae </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                            <h2>size</h2>
                                            <select class="select_option">
                                                <option selected value="1">s</option>
                                                <option value="1">m</option>
                                                <option value="1">l</option>
                                                <option value="1">xl</option>
                                                <option value="1">xxl</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>color</h2>
                                            <select class="select_option">
                                                <option selected value="1">purple</option>
                                                <option value="1">violet</option>
                                                <option value="1">black</option>
                                                <option value="1">pink</option>
                                                <option value="1">orange</option>
                                            </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="1" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>
<script>
function enviar_post_venta(){
    console.log("llamando");
}
</script>
</body>
</html>