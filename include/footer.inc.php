<?php 
include_once("funciones/funciones.php");
$datos_contacto             = datos_contacto(1);
$tel_ventas                 = datos_contacto(2);
$tel_post_ventas            = datos_contacto(3);
?>
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
                                    <li><a href="product.html">Balanceadora</a></li>
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
                                    <li>
                                        <p><span> <b>Ventas:</b> </span> </p>
                                        <?php for ($i=0; $i < count($tel_ventas) ; $i++) { ?> 
                                            <p><a href="<?php echo $tel_ventas[$i]["telefono"]; ?>"><?php echo $tel_ventas[$i]["telefono"]; ?></a></p>
                                        <?php } ?>
                                    </li>
                                    <li>
                                        <p><span> <b>Post Venta:</b> </span></p>
                                        <?php for ($i=0; $i < count($tel_post_ventas) ; $i++) { ?> 
                                            <p><a href="<?php echo $tel_post_ventas[$i]["telefono"]; ?>"><?php echo $tel_post_ventas[$i]["telefono"]; ?></a></p>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="widgets_container">
                            <h3>Email</h3>
                            <div class="footer_menu">
                                <ul>
                                    <?php for ($i=0; $i < count($datos_contacto) ; $i++) { ?>
                                        <li></span> <a href="<?php echo 'mailto:'.$datos_contacto[$i]["correo"]; ?>"><?php echo $datos_contacto[$i]["correo"]; ?></a></p></li>
                                    <?php } ?>
                                    <!-- <li></span> <a href="imorales@neumachile.cl">Imorales@neumachile.cl</a></p></li> -->
                                </ul>
                            </div>
                            <hr>
                            <h3>Suscribete a nuestro Newsletter</h3>
                            <p> Nunca compartiremos su dirección de correo electrónico con un tercero..</p>
                            <div class="subscribe_form">
                                <form id="mc-form" class="mc-form footer-newsletter">
                                    <input id="mc-email" type="email" autocomplete="off"
                                        placeholder="Tu Email ..." />
                                    <button onclick="registrar_newslatter()" id="mc-submit">Suscribirme</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="copyright_area">
                            <p>Copyright &copy; 2021 <a href="https://neumachile.cl/">Neumachile</a> Todos los Derechos reservados.</p>
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
