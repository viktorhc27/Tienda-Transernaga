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

						<li data-thumb="./<?= $img['ruta'] . "/" . $img['nombre'] ?>">
							<img src="./<?= $img['ruta'] . "/" . $img['nombre'] ?>" />
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
					<dt class="col-sm-3">Stock</dt>
					<dd class="col-sm-9"><?= $lista['pro_stock'] ?> </dd>

				</dl>

				<hr>
				<form method="post" action="./controller/CarritoController.php?accion=agregar">
					<div class="form-row">
						<div class="form-group col-md flex-grow-0">
							<label>Cantidad</label>
							<div class="input-group mb-3 input-spinner">
								<select class="form-control" name="cantidad">
									<?php
									for ($i = 1; $i <= $lista['pro_stock']; $i++) {
									?>
										<option value="<?= $i ?>"><?= $i ?></option>

									<?php
									}
									?>

								</select>
								<!-- 	<input type="text" id="contador" class="form-control" value="1"> -->

							</div>
						</div>
					</div>
					<br>
					<input type="hidden" name="id_producto" id="id_producto" value="<?= $lista['pro_id'] ?>">


					<button class="btn  btn-outline-warning"> <span class="text">Agregar al Carro</span> <i class="fas fa-shopping-cart"></i> </button>
				</form>
			</article>




		</main> <!-- col.// -->
		<div>
			

			<model-viewer class="w-screen" src="./resources/images/modelos/33/cama.glb" camera-controls auto-rotate ar>

				<div class="progress-bar hide" slot="progress-bar">
					<div class="update-bar"></div>
				</div>
				<button slot="ar-button" id="ar-button">
					Ver en tu Espacio
				</button>

			</model-viewer>
		</div>
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