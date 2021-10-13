<?php
include_once './model/conexion.php';
include_once './model/ProductosImagenes.php';
include_once './model/Productos.php';
include_once './model/Imagenes.php';


$id = $_REQUEST['id'];
$productos = new Productos();
$pro = new ProductosImagenes();
$imagen = new Imagenes();



$imagenes_productos = $pro->buscar($id);

$lista = $productos->buscar($id);


/* echo "<pre>";
print_r($imagenes_productos);
echo "</pre>"; */


?>
<?php
/* for ($i = 0; $i < count($imagenes_productos); $i++) {

	$img = $imagen->buscar($imagenes_productos[$i]['1']);
	print_r($img['ruta'] . "/" . $img['nombre']);
}


 */
?>
<br>

<div class="card container">
	<div class="row no-gutters">

		<aside class="col-md-6">
			<!-- Place somewhere in the <body> of your page -->
			<div class="flexslider">
				<ul class="slides">

					<?php
					for ($i = 0; $i < count($imagenes_productos); $i++) {

						$img = $imagen->buscar($imagenes_productos[$i]['1']);
						
					?>

						<li data-thumb="./<?=$img['ruta'] . "/" . $img['nombre']?>">
							<img src="./<?=$img['ruta'] . "/" . $img['nombre']?>" />
						</li>


					<?php
					} ?>
				</ul>
			</div>
		</aside>
		<main class="col-md-6 border-left">
			<article class="content-body">

				<h2 class="title"><?= $lista['pro_nombre'] ?></h2>

				<div class="mb-3">
					<var class="price h4">$<?= $lista['pro_precio_venta'] ?></var>
					<span class="text-muted">CPL</span>
				</div> <!-- price-detail-wrap .// -->

				<p><?= $lista['pro_descripcion'] ?></p>


				<dl class="row">
					<dt class="col-sm-3">Altura#</dt>
					<dd class="col-sm-9"><?= $lista['pro_altura'] ?></dd>

					<dt class="col-sm-3">Anchura</dt>
					<dd class="col-sm-9"><?= $lista['pro_ancho'] ?></dd>

					<dt class="col-sm-3">Peso</dt>
					<dd class="col-sm-9"><?= $lista['pro_peso'] ?> </dd>
				</dl>

				<hr>
				<div class="form-row">
					<div class="form-group col-md flex-grow-0">
						<label>Quantity</label>
						<div class="input-group mb-3 input-spinner">
							<div class="input-group-prepend">
								<button class="btn btn-light" type="button" id="button-plus"> + </button>
							</div>
							<input type="text" class="form-control" value="1">
							<div class="input-group-append">
								<button class="btn btn-light" type="button" id="button-minus"> − </button>
							</div>
						</div>
					</div> <!-- col.// -->
					<div class="form-group col-md">
						<label>Select size</label>
						<div class="mt-1">
							<label class="custom-control custom-radio custom-control-inline">
								<input type="radio" name="select_size" checked="" class="custom-control-input">
								<div class="custom-control-label">Small</div>
							</label>

							<label class="custom-control custom-radio custom-control-inline">
								<input type="radio" name="select_size" class="custom-control-input">
								<div class="custom-control-label">Medium</div>
							</label>

							<label class="custom-control custom-radio custom-control-inline">
								<input type="radio" name="select_size" class="custom-control-input">
								<div class="custom-control-label">Large</div>
							</label>

						</div>
					</div> <!-- col.// -->
				</div> <!-- row.// -->

				<a href="#" class="btn  btn-primary"> Buy now </a>
				<a href="#" class="btn  btn-outline-primary"> <span class="text">Add to cart</span> <i class="fas fa-shopping-cart"></i> </a>
			</article> <!-- product-info-aside .// -->
		</main> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->
<br>
<script type="text/javascript">
	// Can also be used with $(document).ready()
	$(window).load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
	});
</script>