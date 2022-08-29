<?php
session_start();
include_once("funciones/funciones.php");
include_once("include/head.inc.php");
$idProducto = $_GET["idProducto"];
$detalle_producto   = detalle_producto($idProducto);
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
for ($i=0; $i < count($crumbs) ; $i++) {
    // echo $crumbs[$i]."<br>";
}
$relacion           = $detalle_producto["relacion"];
$productos          = productos_realcionados($relacion,7);
$ficha              = get_ficha($idProducto);
$condiciones        = get_condiciones($idProducto);
?>
<body>
    <?php include_once("include/social_media.php"); ?>
    <?php include_once("include/header.inc.php"); ?>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="<?php echo _Url; ?>">home</a></li>
                            <li><a href="todos.php">Productos</a></li>
                             <li><a href="selecion.html"><?php echo $detalle_producto["tipo"]; ?></a></li>
                            <li><?php echo $detalle_producto["nombre"]; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
     <!--product details start-->
    <div class="product_details mt-20">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                   <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="<?php echo _Url.'productos/'.$detalle_producto["img"].".jpg"; ?>" data-zoom-image="<?php echo _Url.'productos/'.$detalle_producto["img"].".jpg"; ?>">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                       <!-- <form action="#"> -->
                            <h1><?php echo $detalle_producto["nombre"]; ?></h1>
                            <h5>codigo : <span id="codigo-producto"><?php echo $detalle_producto["codigo"] ;?></span></h5>
                            <h4>Cliente es responsable de contar con grúa para recibir carga</h4>
                            <!-- <div class="price_box">
                                <?php //if($detalle_producto["of"] == 1){ ?> 
                                <span class="current_price"><?php //echo "Total ".fomato_moneda($detalle_producto["p_oferta"] + ($detalle_producto["p_oferta"] * _Iva)); ?></span><br>
                                <?php// } ?>
                            </div> -->
                            <div class="price_box">
                                <?php //if( ($detalle_producto["id_marca"] == 3 OR $detalle_producto["id_marca"] == 4) AND $detalle_producto["stock"] != 0 ){ ?>
                                    <!-- <span class="current_price"><?php //echo fomato_moneda($detalle_producto["p_venta"])." + iva"; ?></span> -->
                                <?php //} ?>
                                <?php //if($detalle_producto["of"] == 1){ ?>
                                <!-- <span class="old_price"><?php //echo fomato_moneda($detalle_producto["p_venta"]); ?></span> -->
                                <?php //}else{ ?>
                                <!-- <span class="current_price"><?php //echo fomato_moneda($detalle_producto["p_venta"]); ?></span> -->
                                <?php //} ?>
                            </div>
                            <div class="product_desc">
                                <p>
                                    <?php
                                        echo $detalle_producto["detalle"];
                                    ?>
                                </p>
                            </div>
                          
                           
                            <div class="product_variant quantity">
                                <button id="btn-cotizacion" onclick="agregar_productos('<?php echo $idProducto; ?>')"  class="button" >Agregar a Cotización</button>
                            </div>
                            <div class="product_variant quantity">
                                <button id="btn-cotizacion" onclick="llamar_cotizacion('<?php echo $idProducto; ?>')"  class="button" >Solicitar</button> 
                            </div>
                            <!-- <span>En mantenimiento, favor llamar al numero +56 9 5912 0748</span> -->
                            
                            <div class="product_meta">
                                <span>Categoria: <a href="#"><?php echo $detalle_producto["tipo"]; ?></a></span>
                            </div>
                        <!-- </form> -->
                        <div class="product_meta">
                            <!-- <span>Compartir</span> -->
                            <ul>
                                <li>
                                    <!-- masterwebneuma@gmail.com google drive-->
                                    <?php if($detalle_producto["ficha"] == true ): ?>
                                    <button id="btn-ficha" data-typeid="<?php echo $detalle_producto["id"] ?>" type="button" class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                    </svg> Descargar Ficha</button>
                                    <?php endif;?>
                                </li>
                            </ul>
                        </div>
                        <div class="priduct_social">
                            <ul>
                                <li><a class="twitter" href="#" title="instagram"><i class="fa fa-instagram"></i> Instagram</a></li>
                                <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Facebook</a></li>
                                <!-- <span>En mantenimiento, favor llamar al numero +56 9 5912 0748</span> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->
    <!--product info start-->
    <div class="product_d_info">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info"
                                        aria-selected="false">Ficha</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet"
                                        aria-selected="false">Especificación</a>
                                </li>
                                <?php if($detalle_producto["id_tipo"] == 4): ?>
                                <li>
                                    <a data-toggle="tab" href="#manual-compresores" role="tab" aria-controls="sheet"
                                        aria-selected="false">Manual</a>
                                </li>
                                <?php endif ?>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <!--  *  -->
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_d_table">
                                    <form action="#">
                                        <table>
                                            <tbody>
                                                <?php for ($i=0; $i < count($ficha) ; $i++) { ?>
                                                <tr>
                                                    <td class="first_child"><?php echo $ficha[$i]["texto_1"]; ?></td>
                                                    <td><?php echo $ficha[$i]["texto_2"]; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                            <!--  * -->
                            <div class="tab-pane fade" id="sheet" role="tabpanel">
                                <div class="product_info_content">
                                    <?php for ($i=0; $i < count($condiciones) ; $i++) { ?>
                                        <p>
                                            <?php echo $condiciones[$i]["texto"]; ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--  * -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="reviews_wrapper">
                                    <h2>Pregunta 1</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_text">
                                            <p><strong>Raul Gonzalez </strong> - Enero 12, 2021
                                            <br><em>raul_g@gmail.com</em>
                                            </p>
                                            <span>Que medida tiene la maquina desmontadora?</span>
                                        </div>
                                    </div>
                                    <div class="comment_title">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2>Respuesta Neumaequipos </h2>
                                        <p>La medida es de 1.02 metros de alto x 75 cm de ancho</p>
                                    </div>
                                    <hr>
                                    <h2>Pregunta 2</h2>
                                    <div class="reviews_comment_box">
                                        <div class="comment_text">
                                            <p><strong>Sergio Ramos </strong> - Enero 20, 2021
                                                <br><em>Sramon_0152@gmail.com</em> </p>
                                            <span>Que medida tiene la maquina desmontadora?</span>
                                        </div>
                                    </div>
                                    <div class="comment_title">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                    <li><a href="#"><i class="ion-ios-star"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2>Respuesta Neumaequipos </h2>
                                        <p>La medida es de 1.02 metros de alto x 75 cm de ancho</p>
                                    </div>
                                    <hr>
                                    <div class="product_review_form">
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="author">Nombre</label>
                                                    <input id="author" type="text">
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <label for="email">Email </label>
                                                    <input id="email" type="text">
                                                </div>
                                                <div class="col-12">
                                                    <label for="review_comment">tu pregunta</label>
                                                    <textarea name="comment" id="review_comment"></textarea>
                                                </div>
                                            </div>
                                            <button type="submit">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- * Manual =>este manual es solo para compresores -->
                            <div class="tab-pane fade" id="manual-compresores" role="tabpanel">
                                <div class="product_info_content">
                                    <h1>Manual de uso y seguridad</h1>
                                    <h4>IMPORTANTE</h4>
                                    <p>Este manual contiene información muy importante que debe conocer y comprender. Esto se proporciona por SEGURIDAD y para EVITE PROBLEMAS EN EL EQUIPO. Para ayudar a entender esta información, observe lo siguiente:</p>
                                    <p> <img style="width:30px" src="<?php echo _Url.'assets/img/warning-svgrepo-com.svg' ?>" alt="">  Peligro: Indica una situación peligrosa inminente que, si no se evita, provocará la muerte o lesión grave.</p>
                                    <p> <img style="width:30px" src="<?php echo _Url.'assets/img/warning-svgrepo-com.svg' ?>" alt="">  Advertencia: Indica una situación potencialmente peligrosa que, si no se evita, podría causar la muerte o lesiones graves.</p>
                                    <p> <img style="width:30px" src="<?php echo _Url.'assets/img/warning-svgrepo-com.svg' ?>" alt="">  Precaución: Indica una situación potencialmente peligrosa que, si no se evita, puede resultar en lesiones menores o lesión moderada.</p>
                                    <p>Aviso: El aviso indica información importante que, si no se sigue, puede causar daños al equipo.</p>
                                    <p>Lea atentamente todos los manuales incluidos con este producto. Familiarícese a fondo con los controles y el uso adecuado del equipo.</p>
                                    <h4>IMPORTANTE</h4>
                                    <p>1. Permita que solo personas capacitadas y autorizadas que hayan leído y entendido estas instrucciones de operación usen este compresor. El incumplimiento de las instrucciones, procedimientos y precauciones de seguridad de este manual puede resultar en accidentes y lesiones.</p>
                                    <p>2. NUNCA arranque ni opere el compresor en condiciones inseguras. Etiquete el compresor, desconecte y bloquee toda la energía para evitar un arranque accidental hasta que se corrija la condición.</p>
                                    <p>3. Instale, use y opere el compresor únicamente de conformidad con todas las reglamentaciones permitidas.</p>
                                    <p>4. NUNCA modifique el compresor y/o los controles de ninguna manera.</p>
                                    <p>5. Mantenga un botiquín de primeros auxilios en un lugar conveniente. Busque asistencia médica de inmediato en caso de lesiones. </p>
                                    <h4>AIRE RESPIRABLE</h4>
                                    <p>1. Peligro: La inhalación de aire comprimido sin usar las medidas de seguridad adecuadas puede provocar la muerte o lesiones graves.</p>
                                    <p>2. NO utilice sistemas anticongelantes de líneas de aire que suministren respiradores u otros equipos utilizados para producir aire respirable. NO descargue aire de estos sistemas en áreas sin ventilación u otras áreas confinadas.</p>
                                    <h4>COMPONENTES PRESURIZADOS</h4>
                                    <p>Este equipo se suministra con un recipiente a presión protegido por una válvula de alivio clasificada. Jale el anillo antes de cada uso para asegurarse de que la válvula funciona. NO intente abrir la válvula mientras la máquina está bajo presión.</p>
                                    <h4>EQUIPO DE PROTECCIÓN PERSONAL</h4>
                                    <p>Asegúrese de que todos los operadores y otras personas alrededor del compresor y sus controles cumplan con todas las normas de seguridad.</p>
                                    <h4>IMPLEMENTOS DE SEGURIDAD</h4>
                                    <p>Equipos de protección, protección para las extremidades, ropa de protección, escudos y barreras de protección, protección eléctrica, equipo de protección y equipo de protección auditiva personal.</p>
                                    <h4>INSPECCIÓN, TRASLADO Y MONTAJE.</h4>
                                    <p>Advertencia: Inspeccione el compresor antes de cualquier uso. Compruebe si hay daños externos que puedan haber ocurrido durante tránsito. Tenga cuidado con las piezas móviles y luego pruebe la polea girándola libremente con la mano. Informar de cualquier daño al transportista inmediatamente.</p>
                                    <p>Precaución: asegúrese de que los compresores montados en paletas estén firmemente asegurados a la paleta antes de moverlos. NUNCA intente mover un compresor que no esté seguro, ya que podrían producirse lesiones graves o daños materiales.
                                        Puede ser necesaria una carretilla elevadora para descargar el compresor EMAX. Use todas las medidas de seguridad para montacargas y solicite un operador certificado de montacargas para conocer el procedimiento de descarga segura.
                                    </p>
                                    <h4>SEGURIDAD CON MONTACARGAS</h4>
                                    <p>1. Asegúrese de que el operador del elevador esté atento mientras mueve el compresor.</p>
                                    <p>2. Asegúrese de que la carga esté segura y bien equilibrada antes de mover el compresor.</p>
                                    <p>3. Asegúrese de que las horquillas estén completamente enganchadas y niveladas antes de levantar o mover el compresor.</p>
                                    <p>4. Mantenga la carga lo más baja posible y observe las prácticas de operación seguras.</p>
                                    <h4>SEGURIDAD DE ELEVACIÓN</h4>
                                    <p>1. Inspeccione cuidadosamente todo el equipo de elevación y asegúrese de que esté en buenas condiciones. La capacidad nominal no debe exceder peso del compresor. Asegúrese de que el gancho de elevación tenga un pestillo de seguridad funcional o equivalente y que esté correctamente sujeto</p>
                                    <p>2. Asegúrese de que los puntos de elevación estén en buenas condiciones y apriete las tuercas o pernos sueltos antes de levantar.</p>
                                    <p>3. Utilice la función de elevación provista o la eslinga adecuada.</p>
                                    <p>4. Use cuerdas guía o equivalentes para evitar que el compresor se tuerza u oscile mientras está en el aire y NUNCA intente levantar con vientos fuertes. Mantenga el compresor lo más cerca posible del suelo.</p>
                                    <p>5. Mantenga a las personas alejadas y asegúrese de que nadie esté debajo del compresor mientras se levanta.</p>
                                    <p>6. Utilice únicamente las funciones de elevación provistas para todo el paquete del compresor. NUNCA use pernos u otros ganchos individuales</p>
                                    <p>7. Asegúrese de colocar el compresor sobre una superficie nivelada que pueda soportar el peso del compresor y la carga.</p>
                                    <h4>INSTALACION Y AREA DE TRABAJO</h4>
                                    <p>Advertencia: No opere la unidad si está dañada durante el transporte, manejo o uso. El daño puede resultar en explosión y causar lesiones o daños a la propiedad</p>
                                    <p>1. Instale el compresor en un área limpia, seca y bien iluminada. </p>
                                    <p>2. Deje suficiente espacio alrededor del compresor para acceso de mantenimiento y flujo de aire adecuado. Unidad de montaje con polea hacia la pared y deje un mínimo de 50 centímetros de espacio libre.</p>
                                    <p>3. Use cuñas para nivelar el compresor si el área de instalación no es plana. Esto evitará vibraciones excesivas y prematuras desgaste de la bomba</p>
                                    <p>Peligro: NO instale el compresor en la sala de calderas, la sala de pulverización de pintura o el área donde se realiza el pulido con chorro de arena.</p>
                                    <p>Asegúrese de que el aire de entrada esté alejado de los gases de escape u otros gases o sustancias tóxicas, nocivas o corrosivas.</p>
                                    <h5><strong>Arenado</strong></h5>
                                    <p>4. Si se utiliza ácido en el entorno operativo o el aire está cargado de polvo, conecte la entrada de aire fresco al exterior. Aumentar el tamaño de la tubería por un tamaño por cada 20 pies de recorrido. Asegúrese de instalar una cubierta protectora alrededor del filtro de entrada.</p>
                                    <p>5. En ambientes operativos donde hay exceso de agua, aceite, suciedad, vapores ácidos o alcalinos, un TEFC (totalmente se recomienda un motor cerrado, enfriado por ventilador). Verifique la placa de identificación para el tipo de motor.</p>
                                    <p>6. Aísle las tuberías de agua fría u otras tuberías de baja temperatura que pasen por encima para evitar que la condensación gotee sobre compresor que podría causar oxidación y/o cortocircuito en el motor.</p>
                                    <h5><strong>Tubería</strong></h5>
                                    <h5>Pasos de seguridad</h5>
                                    <p>1. Instale válvulas limitadoras de flujo apropiadas según sea necesario de acuerdo con el tamaño de la tubería utilizada y las longitudes de los tramos. Esta voluntad reduzca la presión en caso de falla de la manguera, según la norma.</p>
                                    <p>2. Las válvulas limitadoras de flujo se enumeran por tamaño de tubería y CFM nominal. Seleccione las válvulas apropiadas en consecuencia, de acuerdo con las recomendaciones del fabricante.</p>
                                    <h5><strong>Instalación de tuberías/tanques</strong></h5>
                                    <p>1. Coloque las patas del tanque sobre almohadillas de goma de 1/4” de grosor. Un acolchado más grueso aumentará la vibración y la posibilidad de agrietamiento el tanque u otros daños a la unidad. No coloque la unidad sobre un piso sucio o una superficie irregular.</p>
                                    <p>2. Apriete bien los pernos de anclaje, pero no los apriete demasiado para que la vibración normal no dañe la unidad.</p>
                                    <p>Peligro: La unidad del compresor es pesada en la parte superior y debe atornillarse a una superficie sólida y plana para evitar caídas y desgaste prematuro de la bomba.</p>
                                    <p>La lubricación por salpicadura no funcionará correctamente si la unidad no está nivelada.</p>
                                    <p>3. Use un conector flexible entre el tanque del compresor y el sistema de tuberías para minimizar el ruido, la vibración, el daño a la unidad, y desgaste de la bomba.</p>
                                    <p>4. Instale válvulas de seguridad adecuadas y asegúrese de que el sistema de tuberías esté equipado con desagües de condensados.</p>
                                    <p>Advertencia: Nunca instale una válvula de cierre, como una válvula de guante o de compuerta, entre la descarga de la bomba y el tanque de aire a menos que se instale una válvula de seguridad en la línea entre la válvula y la bomba.</p>
                                    <p>5. Asegúrese de que cualquier tubo, tubería o manguera conectada a la unidad pueda soportar las temperaturas de funcionamiento y retener presión.</p>
                                    <p>Advertencia: Nunca use tubería de plástico (PVC) para aire comprimido. Se podrían producir lesiones graves o la muerte.</p>
                                    <p>6. Nunca use reductores en la tubería de descarga. Mantenga todas las tuberías y accesorios del mismo tamaño en el sistema de tuberías.</p>
                                    <p>Tamaño mínimo de tubería para líneas de aire comprimido (el tamaño de tubería se muestra en pulgadas)</p>
                                    <p>Sistema de circuito cerrado Instale un accesorio en T en la tubería del suministro de aire para minimizar la caída de presión y permitir el flujo de aire</p>
                                    <h4>SEGURIDAD CON MONTACARGAS</h4>
                                    <p>7. Para instalaciones permanentes de sistemas de aire comprimido, determine la longitud total del sistema y seleccione la tubería correcta Talla. Asegúrese de que las líneas subterráneas estén enterradas debajo de la línea de escarcha y evite las áreas donde se podría acumular condensación arriba y congelar.</p>
                                    <p>8. Pruebe todo el sistema de tuberías antes de enterrar las líneas subterráneas. Asegúrese de encontrar y reparar todas las fugas antes de usar compresor.</p>
                                    <p>Advertencia: Nunca exceda la presión o la velocidad recomendadas mientras opera el compresor.</p>
                                    <p>Drenaje automático electrónico (si está equipado)</p>
                                    <p>Se puede usar un drenaje automático para varias unidades de compresor. Instale las tuberías necesarias con los accesorios apropiados.</p>
                                    <h4>CONSIDERACIÓN DE INSTALACIÓN</h4>
                                    <p>1. Enchufe el drenaje automático en un tomacorriente.</p>
                                    <p>2. Establezca los temporizadores en la configuración deseada.</p>
                                    Si se utiliza el drenaje para varias unidades, aumente la configuración del temporizador según sea necesario.</p>
                                    <p>3. Utilice el botón de prueba para comprobar el funcionamiento correcto.
                                    Consulte la sección de mantenimiento para conocer el cuidado adecuado.</p>
                                    </p>Seguridad ELECTRICA
                                    Peligro: Asegúrese de que solo personal capacitado y autorizado instale y mantenga este compresor de acuerdo con todos los códigos, normas y reglamentos.
                                    Permitir solo personal de servicio autorizado de EMAX.</p>
                                    <p>2. Ponga la unidad en un circuito dedicado y asegúrese de que no haya ningún otro equipo eléctrico conectado. Falla en conectar la unidad circuito independiente puede causar sobrecarga del circuito y/o desequilibrio en las fases del motor.</p>
                                    <p>3. Asegúrese de que el servicio de entrada tenga un amperaje adecuado.</p>
                                    <p>4. Asegúrese de que la línea de suministro tenga las mismas características eléctricas (voltaje, ciclos y fase) que el motor eléctrico.</p>
                                    <p>5. Consulte la información de carga de amperios en la etiqueta del motor y use un cableado del tamaño correcto. Asegúrese de considerar la distancia entre la fuente de alimentación y la máquina.</p>
                                    <p>6. Instale un dispositivo de protección contra sobretensiones entre la fuente de alimentación y el motor del compresor.</p>
                                    <p>7. Asegúrese de instalar disyuntores y fusibles del tamaño adecuado.</p>
                                    <p>8. La unidad debe estar correctamente conectada a tierra. NO conecte el cable a tierra a las líneas de aire o refrigeración.</p>
                                    <p>Asegúrese de que la fuente de alimentación y el cableado interno sean adecuados con el voltaje y la frecuencia indicados en el motor placa de identificación y motor de arranque. El voltaje no debe variar más del 12 % para garantizar el correcto funcionamiento del compresor.</p>
                                    <p>Peligro: Los componentes eléctricos mal conectados a tierra son riesgos de descarga eléctrica.</p>
                                    <p>Asegúrese de que todos los componentes estén correctamente conectados a tierra para evitar la muerte o lesiones graves.</p>
                                    <p>9. Asegúrese de que esté instalada la protección de sobrecarga adecuada para el motor.</p>
                                    <h2>Puesta en marcha</h2>
                                    <p>1. Esta unidad se envía con aceite de rodaje de la bomba y debe estar lista para funcionar. Asegúrese de comprobar el nivel de aceite adecuado antes de operar el compresor. El aceite debe estar en el centro del vidrio del sitio. </p>
                                    <p>Aviso: Utilice únicamente aceite:</p>
                                    <p>TORNILLO//PISTON</p>
                                    <p>TOTAL DACNIC 46</p>
                                    <p>SHELL NUTO S46</p>
                                    <p>2. Verifique que la tensión de la correa sea la adecuada. Debe haber 1/2 pulgada de holgura. Consulte la sección de mantenimiento si el ajuste es necesario.</p>
                                    <p>Advertencia: Siempre asegúrese de que la alimentación principal esté apagada antes de tocar las correas u otras partes móviles del compresor.</p>
                                    <p>3. Presione ligeramente el interruptor de encendido para asegurarse de que el sistema esté funcionando.</p>
                                    <p>4. Si el eje del motor no gira en sentido contrario a las agujas del reloj, desconecte la alimentación del bloque de terminales y luego intercambie dos de los tres cables de alimentación. Vuelva a comprobar la rotación.</p>
                                    <p>Función de funcionamiento continuo (si está equipado)</p>
                                    <p>Para aplicaciones de uso intensivo, como el pulido con chorro de arena, está disponible la función de ejecución continua. Esta función mantiene la principal línea de alimentación abierta para eliminar numerosos arranques/paradas del motor y para ayudar a enfriar la bomba.</p>
                                    <p>Para activar la función de funcionamiento continuo, abra la válvula de bola que se encuentra siguiendo la tubería de cobre a través de las culatas de cilindros hasta el tanque.</p>
                                    <p>Detenga la función de funcionamiento continúo cerrando la válvula para que el compresor arranque y se detenga de acuerdo con el interruptor de presión.</p>
                                    <h2>Mantenimiento</h2>
                                    <p>Pasos de seguridad</p>
                                    <p>Advertencia: Desconecte, etiquete y bloquee la fuente de energía y luego libere toda la presión del sistema antes intentar instalar, reparar, reubicar o realizar CUALQUIER mantenimiento.</p>
                                    <p>1. Asegúrese de que las reparaciones se realicen en un área limpia, seca, bien iluminada y ventilada.</p>
                                    <p>2. Al limpiar, utilice una presión de aire inferior a  (2,1 bar). NUNCA use solventes inflamables para limpiar</p>
                                    <p>propósitos. También use protección eficaz contra virutas y equipo de protección personal.</p>
                                    <p>3. Libere toda la presión interna antes de abrir cualquier línea, accesorio, manguera, válvula, tapón de drenaje, conexión u otro componente, como filtros y engrasadores de línea, y antes de volver a llenar los sistemas anticongelantes de línea de aire opcionales con anticongelante compuesto.</p>
                                    <p>4. Mantenga el cableado eléctrico, incluidos todos los terminales y conectores de presión en buenas condiciones. Reemplace cualquier cableado que ha agrietado, cortado o dañado el aislamiento. Reemplace los terminales que estén desgastados, descoloridos o corroído. Mantenga todos los terminales y conectores de presión limpios y ajustados.</p>
                                    <p>5. Mantenga todas las partes del cuerpo y cualquier herramienta manual u otros objetos conductores alejados de las partes vivas expuestas del sistema eléctrico.</p>
                                    <p>Al realizar reparaciones o ajustes, párese sobre una superficie seca y aislada y NO toque ninguna otra parte del compresor</p>
                                    <p>6. NO deje el compresor desatendido con componentes eléctricos expuestos. Asegúrese de etiquetar y desconectar todos poder si la ausencia temporal es necesaria.</p>
                                    <p>Precaución: Los componentes del compresor pueden calentarse durante el funcionamiento.</p>
                                    <p>Evite el contacto corporal con líquidos calientes, superficies calientes y bordes y esquinas afilados.</p>
                                    <h5><strong>Ajuste de la correa</strong></h5>
                                    <p>Advertencia: asegúrese de aliviar toda la presión del sistema, luego bloquee la alimentación y etiquete el compresor para evitar movimiento inesperado de la unidad.</p>
                                    <p>Inspeccione la tensión de la correa después de las primeras 30 horas de funcionamiento y luego cada 30 días.</p>
                                    <p>1.	La tensión adecuada de la correa se determina presionando la correa a mitad de camino entre la polea del motor y el volante. Debería sea aproximado Tire del anillo aproximadamente 1/2 pulgada de deflexión.</p>
                                    <h3><strong>1.	PASOS PRINCIPALES DE MANTENCION PARA COMPRESOR PISTON</strong></h3>
                                    <p><strong>Diariamente</strong></p>
                                    <ul>
                                        <li>•	Revisar el nivel de aceite</li>
                                        <li>•	Compruebe si hay un funcionamiento inusual.</li>
                                        <li>•	Corrija antes de que ocurra el daño.</li>
                                        <li>•	Compruebe la válvula de seguridad</li>
                                        <li>•	Tanque de drenaje.</li>
                                    </ul>
                                    <p><strong>Semanalmente</strong></p>
                                    <ul>
                                        <li>•	filtro de aire limpio</li>
                                        <li>•	Cambio de aceite (después de las primeras 8 horas)</li>
                                        <li>•	Limpieza general de unidades.</li>
                                        <li>•	Compruebe si hay algo inusual en la operación. corregir antes que se produzca el daño.</li>
                                    </ul>
                                    <p><strong>Mensual</strong></p>
                                    <ul>
                                        <li>•	Revise y apriete todos los pernos como</li>
                                        <li>•	requerido Revise todas las conexiones para fugas de aire</li>
                                        <li>•	Verifique que las correas tengan la tensión adecuada, desgaste y alineación</li>
                                        <li>•	Inspeccione el aceite para contaminación. Cambiar si necesario.</li>
                                        <li>•	Verifique todas las líneas de descarga por fugas. </li>
                                        <li>•	Fugas de aire en las líneas de descarga causarán descargadores.</li>
                                        <li><strong>•	Cada 3 meses Cambie el aceite Inspeccione los conjuntos de válvulas</strong></li>
                                        <li></li>
                                    </ul>
                                    <h3><strong>2.	PASOS PRINCIPALES DE MANTENCION PARA COMPRESOR TORNILLO EN HORAS DE TRABAJO</strong></h3>
                                    <p><strong>500 Hrs</strong></p>
                                    <ul>
                                        <li>•	Cambio de aceite</li>
                                        <li>•	Revisión instalación del equipo</li>
                                        <li>•	revisión de parámetros de trabajo</li>
                                    </ul>
                                    <p><strong>2000 hrs</strong></p>
                                    <ul>
                                        <li>•	Cambio de aceite</li>
                                        <li>•	Cambio de filtro de aceite</li>
                                        <li>•	Cambio de filtro de aire</li>
                                        <li>•	Limpieza general</li>
                                        <li></li>
                                    </ul>
                                    <p><strong>4000 hrs</strong></p>
                                    <ul>
                                        <li>•	Cambio de aceite</li>
                                        <li>•	Cambio de filtro de aceite</li>
                                        <li>•	Cambio de filtro de aire</li>
                                        <li>•	Limpieza general</li>
                                    </ul>
                                    <p><strong>6000 hrs</strong></p>
                                        <ul>
                                            <li>•	Cambio de aceite</li>
                                            <li>•	Cambio de filtro de aceite</li>
                                            <li>•	Cambio de filtro de aire</li>
                                            <li>•	Limpieza general</li>
                                            <li>•	Limpieza correas</li>
                                            <li>•	Limpieza general</li>
                                        </ul>
                                    <p><strong>8000 hrs</strong></p>
                                        <ul>
                                            <li>•	Cambio de aceite</li>
                                            <li>•	Cambio de filtro de aceite</li>
                                            <li>•	Cambio de filtro de aire</li>
                                            <li>•	Mantención o cambio de todas las válvulas (cambio de kit de reparación)</li>
                                            <li>•	Limpieza correas</li>
                                            <li>•	Limpieza general</li>
                                        </ul>
                                    <p><strong>24000 hrs</strong></p>
                                        <ul>
                                            <li>OVERHALL (Se recomienda Mantención General)</li>
                                        </ul>
                                    <h3><strong>Problemas Causas posibles Soluciones</strong></h3>
                                    <h3><strong>Aire y presión</strong></h3>
                                    <ul>
                                        <li>•	Entrada obstruida </li>
                                        <li>•	Solución: Desmonte la válvula, límpiela a fondo.</li>
                                        <li>•	Fugas de aire en sistema</li>
                                        <li>•	Solución: Use agua jabonosa para localizar fugas, reemplace o apriete</li>
                                        <li>•	Excede el aire nominal de salida del compresor</li>
                                        <li>•	Solución:  Verifique los requisitos de CFM, cambie la herramienta o use compresor con mayor salida de aire.</li>
                                        <li>•	Culata y Válvulas no funcionan</li>
                                        <li>•	Solución: Retire las válvulas de la culata, repare o reemplace.</li>
                                        <li>•	Sellado</li>
                                        <li>•	Solución: Verifique la fuente de alimentación, recablee según sea necesario</li>
                                    </ul>
                                    
                                    <h3><strong> Calentamiento excesivo</strong></h3>

                                    <p><strong>Ciclo de trabajo excedido</strong></p>
                                    <p>Solución:  Mantenga el ciclo de trabajo en 60/40 para mantener la vida útil de la bomba</p>
                                    <p>Rotación incorrecta</p>
                                    <ul>
                                        <li>•	Solución: Cuando mire hacia el volante, asegúrese de que esté en el sentido contrario a las agujas del reloj.</li>
                                        <li>•	Válvula(s) </li>
                                        <li>•	Solución: Limpiar o reemplazar</li>
                                        <li>•	Cilindro soplado</li>
                                        <li>•	Solución: Reemplace las juntas</li>
                                        <li>•	Restricción en cabeza, intercooler o válvula de retención</li>
                                        <li>•	Solución: Elimina el bloqueo</li>
                                        <li>•	Bajo nivel de aceite</li>
                                        <li>•	Solución: Asegúrese de que el nivel de aceite esté en la mitad del vidrio del sitio.</li>
                                    </ul>

                                    
                                    <h3><strong> Garantía</strong></h3>
                                    <p>El equipo tiene una garantía de 1 año para la unidad del compresor El TORNILLO y 6 meses para la unidad del compresor PISTON.</p>
                                    <p>El compresor DEBE contar con Lubricante Sintético SHELL NUTO 46. exclusivamente, el mismo que debe adquirirse el mercado en general (Mezclar diferentes marcas de aceite anulará la garantía). </p>
                                    <p> Mantenga el nivel de aceite adecuado en la unidad en todo momento. Si la unidad se queda sin aceite, esta garantía quedará anulada.</p>
                                    <p>Se adjunta ficha al final de la garantía. </p>
                                    <p>Esto permitirá llevar un registro ordenado de las mantenciones. Filtro de aire, filtro de aceite y cambio de aceite con el total de horas de acuerdo con lo recomendado en el ítem de mantención.</p>
                                    <p>Las exclusiones de esta garantía también incluyen todos los elementos de uso y desgaste normal, incluidos, entre otros, los rodamientos, rotores, válvulas, correas, sellos de eje y solenoides de carga/descarga.</p>
                                    <p>La Garantía no incluye daños de utilización.</p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php include_once('include/productos_relacionados.inc.php'); ?>
    <?php include_once('include/folowus.inc.php'); ?>
   <?php include_once('include/footer.inc.php'); ?>
<?php //include_once("include/popup.inc.php"); ?>
<?php include_once("include/script.inc.php"); ?>


<script>

    const btn_ficha = document.getElementById('btn-ficha');

    const _Url = `https://${window.location.host}/`
    
    btn_ficha.addEventListener('click', (e) => {
        new Promise((resolve, reject) => {
            const id = btn_ficha.dataset.typeid
            const parameters = {"id_producto" : id};

            $.ajax({
                data: parameters,
                url:  _Url+"funciones/get_path_ficha.php",
                type: "GET",
                beforeSend:function(){
                    Swal.fire({
                        html:'<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>',
                        title: 'modificando..',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        showConfirmButton:false,
                    })
                    $(".swal2-modal").css('background-color', 'rgba(0, 0, 0, 0.0)'); 
                    $(".swal2-title").css("color","white"); 
                },
                success:function(response){
                    resolve(response);
                }
            });
        }).then(res => {
            window.open(res, "_blank");
            Swal.close();
        });
    });

    

</script>

</body>
</html>
