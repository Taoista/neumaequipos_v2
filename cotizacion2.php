<?php
include_once("include/head.inc.php");

$usuario              	=	base64_decode($_COOKIE["f8032d5cae3de20fcec887f395ec9a6a"]); // email

$datos_usuario        	=	datos_usuario($usuario);

$privilegios          	=	tomar_privilegios($datos_usuario["id"]);

$oferta_usuario			=	oferta_usuario($datos_usuario["id"]);

?>

<body> 
	<section class="body">
		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">
				<?php include_once("include/header.inc.php"); ?>
				<hr class="separator" />
				<!-- NAV -->
				<?php include_once("include/nav.inc.php"); ?>
				<!-- /NAV -->
			</aside>
			<!-- end: sidebar -->
            <section role="main" class="content-body">
					<header class="page-header">
						<h2>Invoice</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Pages</span></li>
								<li><span>Invoice</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header> 

					<section class="panel">
						<div class="panel-body">
							<div class="invoice">
								<header class="clearfix">
									<div class="row">
										<div class="col-sm-6 mt-md">
											<h2 class="h2 mt-none mb-sm text-dark text-bold">COTIZACION</h2>
											<h4 class="h4 m-none text-dark text-bold">#76598345</h4>
										</div>
                                        
										<div class="col-sm-6 text-right mt-md mb-md">
											<address class="ib mr-xlg">
												Neumachile
												<br/>
												Santamargarita
												<br/>
												Pone soy un dios
												<br/>
												demo@demo.cl
											</address>
											<div class="ib">
												<img src="assets/images/invoice-logo.png" alt="OKLER Themes" />
											</div>
										</div>
									</div>
								</header>
								<div class="bill-info">
									<div class="row">
										<div class="col-md-6">
											<input onkeyup="on_press_search_dataclients(event)"  type="text" class="form-control" id="searsh-input" >
											<button onclick="search_dataclients()" id="btn-search-rut-client" type="button" class="mb-xs mt-xs mr-xs btn btn-primary" >Buscar</button>
										</div>
										<div class="col-md-6">
											<p>Cod. Vendedor: <span id="spn-cod-seller"></span> </p>
											<p>Email. Vendeedor: <span id="spn-email-seller"></span> </p>
											<p>Nombre Vendedors: <span id="spn-nombre-seller"></span> </p>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="bill-to">
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Nombre</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-name" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Rut</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-rut" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Contacto</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-contacto" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Telefono</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-telefono" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Celular</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-celular" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Direccion</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-adress" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Comuna</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-comuna" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Ciudad</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-city" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Dec.Cliente</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-autorizado-normal" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Desc.Vendedor</label>
													<div class="col-md-6">
														<input type="text" class="form-control" id="spn-desc-vendedor" value="<?php echo $oferta_usuario; ?>" disabled readonly>
													</div>
												</div>
												<div class="form-group">
													<label class="col-md-3 control-label text-semibold" for="inputDefault">Emailr</label>
													<div class="col-md-6">
														<select class="form-control input-sm mb-md" id="emails-seller">
															
														</select>
													</div>
												</div>
											</div> 
										</div>
										<div class="col-md-6">
											<div class="bill-data text-right">
												<p class="mb-none">
													<span class="text-dark">Fecha:</span>
													<span class="value">05/20/2014</span>
												</p>
											</div>
										</div>
									</div>
								</div>
							
								<div class="table-responsive">
									<table id="table_prod"  class="table ">
										<thead>
											<tr class="h4 text-dark">
												<th id="cell-id"	class="text-semibold" style="width:50px;">#</th> 
												<!-- 
													16839575-2 segio otarola
													08966048-3 rodrigo maldonado 35
											-->
												<th id="cell-item"	class="text-semibold" style="width:100px;">Codigo</th>
												<th id="cell-desc"	class="text-semibold">Descripcion</th>
												<th id="cell-price" class="text-semibold">Precio</th>
												<th id="cell-price" class="text-semibold" style="width:60px;">Cant.</th>
												<th id="cell-qty"   class="text-center text-semibold" style="width:60px;">Des%</th>
												<th id="cell-qty"   class="text-center text-semibold" style="width:100px;">Desc</th>
												<th id="cell-total" class="text-semibold">Total</th>
												<th class="text-semibold" style="width:80px;">+</th>
											</tr>
										</thead>
										<tbody id="table-productos">
											<tr data-id="1">
												<td>  </td>
												<td style="width:100px;" class="text-semibold text-dark"><input id="inp_code" onkeyup="search_code_product(event)" type="text" class="form-control" ></td> 
												<td><input type="text" class="form-control" id="inp_descripcion" disabled></td>
												<td class="text-center"><input type="text" class="form-control" id="inp_precio" disabled></td>
												<td style="width:60px;" class="text-center"><input value="1" onchange="change_value()" type="text" class="form-control" id="inp_cantidad"></td>
												<td style="width:60px;" class="text-center"><input value="0" onkeyup="apply_descount_code(event)" type="text" class="form-control" id="inp_desc_porc"></td>
												<td class="text-center"><input value="0"  type="text" class="form-control" id="inp_desc_precio" disabled></td>
												<td class="text-center"><input value="0" type="text" class="form-control" id="inp-cantidad" disabled style="width:100px;"></td>
												<td style="width:80px;">
													<button onclick="add_row_product()" type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default">+</button>
													<button onclick="edit_row_produc()" type="button" class="mb-xs mt-xs mr-xs btn btn-xs btn-default"><i class="fa fa-edit"></i></button>
												</td> 
											</tr>
										</tbody>
									</table>
								</div>
							
								<div class="invoice-summary">
									<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table h5 text-dark">
												<tbody>
													<tr class="b-top-none">
														<td colspan="2">Subtotal</td>
														<td class="text-left">$73.00</td> 
													</tr>
													<tr>
														<td colspan="2">Shipping</td>
														<td class="text-left">$0.00</td> 
													</tr>
													<tr class="h4">
														<td colspan="2">Grand Total</td>
														<td class="text-left">$73.00</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

							<div class="text-right mr-lg">
								<button onclick=> type="button" class="mb-xs mt-xs mr-xs btn btn-default">Guardar</button>
								<a href="#" class="btn btn-default">Submit Invoice</a>
								<a href="pages-invoice-print.html" target="_blank" class="btn btn-primary ml-sm"><i class="fa fa-print"></i> Print</a>
							</div>
						</div>
					</section>

					<!-- end: page -->
				</section>
			
		</div>
	</section>
	<?php include_once("include/nav_right.inc.php"); ?>
	<!-- Vendor -->
	<script src="<?php echo _Url.'assets/vendor/jquery/jquery.js' ?>"></script>
	<script src="<?php echo _Url.'assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js'; ?>"></script>
	<script src="<?php echo _Url.'assets/vendor/bootstrap/js/bootstrap.js' ?>"></script>
	<script src="<?php echo _Url; ?>assets/vendor/nanoscroller/nanoscroller.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/magnific-popup/magnific-popup.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>
	<!-- Specific Page Vendor -->
	<script src="<?php echo _Url; ?>assets/vendor/jquery-appear/jquery.appear.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/flot/jquery.flot.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/flot/jquery.flot.pie.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/flot/jquery.flot.categories.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/flot/jquery.flot.resize.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/raphael/raphael.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/morris/morris.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/gauge/gauge.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/snap-svg/snap.svg.js"></script>
	<script src="<?php echo _Url; ?>assets/vendor/liquid-meter/liquid.meter.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!-- Theme Base, Components and Settings -->
	<script src="<?php echo _Url; ?>assets/javascripts/theme.js"></script>
	<!-- Theme Custom -->
	<script src="<?php echo _Url; ?>assets/javascripts/theme.custom.js"></script>
	<!-- Theme Initialization Files -->
	<script src="<?php echo _Url; ?>assets/javascripts/theme.init.js"></script>
	<!-- Examples -->
	<script src="<?php echo _Url; ?>assets/javascripts/ui-elements/examples.charts.js"></script>
	<script src="<?php echo _Url; ?>assets/js/main.js" charset="utf-8"></script>
	<script src="<?php echo _Url; ?>assets/js/cotizacion.js" charset="utf-8"></script>

	<script type="text/javascript">

		// $(document).ready(function(){
		// 	setInterval(function(){
		// 		$("#ul-estadp-clientes").load("../include/load_estado_usuarios.php");
		// 	}, 3000);
		// });
		// $(document).ready(function(){
			// function(){
			// alert("ejejancufdo");
				// },2000
				// setInterval(function(){ alert("Hello"); }, 3000);
		// });
	</script>

</body>

</html>
