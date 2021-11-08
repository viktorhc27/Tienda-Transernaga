<?php
include_once './model/Productos.php';
include_once './model/ProductosImagenes.php';
include_once './model/Conexion.php';

$productos = new Productos();
$busqueda = $_REQUEST['s'];

$por_pagina = 4;

if (isset($_REQUEST['pagina'])) {
	$pagina = $_REQUEST['pagina'];
} else {
	$pagina = 1;
}

$empieza = ($pagina - 1) * $por_pagina;

$pag = (new Productos())->buscar_palabras($busqueda,$empieza, $por_pagina);
?>

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
	<div class="container">
		<h2 class="title-page">Resultado de la Busqueda</h2>
		<nav>
			<ol class="breadcrumb text-white">
				<li class="breadcrumb-item"><a href="#">Inicio</a></li>

				<li class="breadcrumb-item active" aria-current="page">Productos</li>
			</ol>
		</nav>
	</div> <!-- container //  -->
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
	<div class="container">

		<div class="row">
        <div class="card-body">
								<form class="pb-3" method="post" action="./controller/BusquedaController.php">
									<div class="input-group">
										<input name="busqueda" type="text" class="form-control" placeholder="Buscador">
										<div class="input-group-append">
											<button class="btn btn-light"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>

							</div> 
			<main class="col-md-12">



				<div class="row">
					<?php
					if (count($pag) > 0) {


						foreach ($pag as  $p) :

					?>


							<div class="col-md-4">


								<figure class="card card-product-grid">
									<div class="img-wrap">
										<!-- <span class="badge badge-danger"> NEW </span> -->
										<img src="./resources/images/productos/<?= $p['pro_id'] ?>/<?= $p['pro_img'] ?>">
										<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
									</div> <!-- img-wrap.// -->
									<figcaption class="info-wrap">
										<div class="fix-height">
											<a href="?param=detalles_productos&id=<?= $p['pro_id'] ?>" class="title"><?= $p['pro_nombre'] ?></a>
											<div class="price-wrap mt-2">
												<span class="price">$<?= number_format($p['pro_precio_compra'],0) ?></span>
												<!-- <del class="price-old">$1980</del> -->
											</div> <!-- price-wrap.// -->
										</div>
										
									</figcaption>
								</figure>

							</div> <!-- col.// -->
							
					<?php
						endforeach;
					} else {
						echo "NO SE ENCONTRO PRODUCTOS";
					}
					?>
				</div> <!-- row end.// -->


				<nav class="mt-4" aria-label="Page navigation sample">
					<?php
					$resultado = (new Productos())->leer();

					$total_registros = count($resultado);
					$total_de_paginas = ceil($total_registros / $por_pagina);
					?>
					<ul class="pagination">
						<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
						<?php for ($i = 1; $i <= $total_de_paginas; $i++) { ?>
							<li class="page-item"><a class="page-link" href="?param=productos&pagina=<?= $i; ?>"><?= $i; ?></a></li>
						<?php
						}
						?>
						<li class="page-item"><a class="page-link" href="?param=productos&pagina=<?= $total_de_paginas ?>">Next</a></li>
					</ul>
				</nav>

			</main> <!-- col.// -->

		</div>

	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->