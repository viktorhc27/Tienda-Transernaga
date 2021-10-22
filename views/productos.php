<?php
include_once './model/Productos.php';
include_once './model/ProductosImagenes.php';
include_once './model/Conexion.php';

$productos = new Productos();



$lista = $productos->leer();


?>

<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg">
	<div class="container">
		<h2 class="title-page">Productos</h2>
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
			<aside class="col-md-3">

				<div class="card">
					<article class="filter-group">
						<header class="card-header">
							<a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
								<i class="icon-control fa fa-chevron-down"></i>
								<h6 class="title">Product type</h6>
							</a>
						</header>
						<div class="filter-content collapse show" id="collapse_1">
							<div class="card-body">
								<form class="pb-3">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Search">
										<div class="input-group-append">
											<button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>

								<ul class="list-menu">
									<li><a href="#">People </a></li>
									<li><a href="#">Watches </a></li>
									<li><a href="#">Cinema </a></li>
									<li><a href="#">Clothes </a></li>
									<li><a href="#">Home items </a></li>
									<li><a href="#">Animals</a></li>
									<li><a href="#">People </a></li>
								</ul>

							</div> <!-- card-body.// -->
						</div>
					</article> <!-- filter-group  .// -->
					<article class="filter-group">
						<header class="card-header">
							<a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
								<i class="icon-control fa fa-chevron-down"></i>
								<h6 class="title">Brands </h6>
							</a>
						</header>
						<div class="filter-content collapse show" id="collapse_2">
							<div class="card-body">
								<label class="custom-control custom-checkbox">
									<input type="checkbox" checked="" class="custom-control-input">
									<div class="custom-control-label">Mercedes
										<b class="badge badge-pill badge-light float-right">120</b>
									</div>
								</label>
								<label class="custom-control custom-checkbox">
									<input type="checkbox" checked="" class="custom-control-input">
									<div class="custom-control-label">Toyota
										<b class="badge badge-pill badge-light float-right">15</b>
									</div>
								</label>
								<label class="custom-control custom-checkbox">
									<input type="checkbox" checked="" class="custom-control-input">
									<div class="custom-control-label">Mitsubishi
										<b class="badge badge-pill badge-light float-right">35</b>
									</div>
								</label>
								<label class="custom-control custom-checkbox">
									<input type="checkbox" checked="" class="custom-control-input">
									<div class="custom-control-label">Nissan
										<b class="badge badge-pill badge-light float-right">89</b>
									</div>
								</label>
								<label class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input">
									<div class="custom-control-label">Honda
										<b class="badge badge-pill badge-light float-right">30</b>
									</div>
								</label>
							</div> <!-- card-body.// -->
						</div>
					</article> <!-- filter-group .// -->
					<article class="filter-group">
						<header class="card-header">
							<a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
								<i class="icon-control fa fa-chevron-down"></i>
								<h6 class="title">Price range </h6>
							</a>
						</header>
						<div class="filter-content collapse show" id="collapse_3">
							<div class="card-body">
								<input type="range" class="custom-range" min="0" max="100" name="">
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>Min</label>
										<input class="form-control" placeholder="$0" type="number">
									</div>
									<div class="form-group text-right col-md-6">
										<label>Max</label>
										<input class="form-control" placeholder="$1,0000" type="number">
									</div>
								</div> <!-- form-row.// -->
								<button class="btn btn-block btn-primary">Apply</button>
							</div><!-- card-body.// -->
						</div>
					</article> <!-- filter-group .// -->
					<article class="filter-group">
						<header class="card-header">
							<a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class="">
								<i class="icon-control fa fa-chevron-down"></i>
								<h6 class="title">Sizes </h6>
							</a>
						</header>
						<div class="filter-content collapse show" id="collapse_4">
							<div class="card-body">
								<label class="checkbox-btn">
									<input type="checkbox">
									<span class="btn btn-light"> XS </span>
								</label>

								<label class="checkbox-btn">
									<input type="checkbox">
									<span class="btn btn-light"> SM </span>
								</label>

								<label class="checkbox-btn">
									<input type="checkbox">
									<span class="btn btn-light"> LG </span>
								</label>

								<label class="checkbox-btn">
									<input type="checkbox">
									<span class="btn btn-light"> XXL </span>
								</label>
							</div><!-- card-body.// -->
						</div>
					</article> <!-- filter-group .// -->
					<article class="filter-group">
						<header class="card-header">
							<a href="#" data-toggle="collapse" data-target="#collapse_5" aria-expanded="false" class="">
								<i class="icon-control fa fa-chevron-down"></i>
								<h6 class="title">More filter </h6>
							</a>
						</header>
						<div class="filter-content collapse in" id="collapse_5">
							<div class="card-body">
								<label class="custom-control custom-radio">
									<input type="radio" name="myfilter_radio" checked="" class="custom-control-input">
									<div class="custom-control-label">Any condition</div>
								</label>

								<label class="custom-control custom-radio">
									<input type="radio" name="myfilter_radio" class="custom-control-input">
									<div class="custom-control-label">Brand new </div>
								</label>

								<label class="custom-control custom-radio">
									<input type="radio" name="myfilter_radio" class="custom-control-input">
									<div class="custom-control-label">Used items</div>
								</label>

								<label class="custom-control custom-radio">
									<input type="radio" name="myfilter_radio" class="custom-control-input">
									<div class="custom-control-label">Very old</div>
								</label>
							</div><!-- card-body.// -->
						</div>
					</article> <!-- filter-group .// -->
				</div> <!-- card.// -->

			</aside> <!-- col.// -->
			<main class="col-md-9">

				<header class="border-bottom mb-4 pb-3">
					<div class="form-inline">
						<span class="mr-md-auto"><?= count($lista) . " Producto(s)" ?> </span>
						<select class="mr-2 form-control">
							<option>Latest items</option>
							<option>Trending</option>
							<option>Most Popular</option>
							<option>Cheapest</option>
						</select>
						<div class="btn-group">
							<a href="#" class="btn btn-outline-secondary" data-toggle="tooltip" title="List view">
								<i class="fa fa-bars"></i></a>
							<a href="#" class="btn  btn-outline-secondary active" data-toggle="tooltip" title="Grid view">
								<i class="fa fa-th"></i></a>
						</div>
					</div>
				</header><!-- sect-heading -->

				<div class="row">
					<?php
					foreach ($lista as  $p) :

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
											<span class="price">$<?= $p['pro_precio_compra'] ?></span>
											<!-- <del class="price-old">$1980</del> -->
										</div> <!-- price-wrap.// -->
									</div>
									<a href="?param=carrito" class="btn btn-block btn-primary">agregar al carro </a>
								</figcaption>
							</figure>

						</div> <!-- col.// -->
					<?php
					endforeach;
					?>
				</div> <!-- row end.// -->


				<nav class="mt-4" aria-label="Page navigation sample">
					<ul class="pagination">
						<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item active"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
				</nav>

			</main> <!-- col.// -->

		</div>

	</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->