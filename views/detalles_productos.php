<?php
include_once './model/conexion.php';
include_once './model/ProductosImagenes.php';
include_once './model/Productos.php';
include_once './model/Imagenes.php';
$productos = new Productos();

$id=$_REQUEST['id'];


$lista = $productos->buscar($id);


print_r($lista);
?>


<br>

<div class="card">
	<div class="row no-gutters">
		<aside class="col-md-6">
			<article class="gallery-wrap">
				<div class="img-big-wrap">
					<div> <a href="#"><img src="bootstrap-ecommerce-html/images/items/12.jpg"></a></div>
				</div> <!-- slider-product.// -->
				<div class="thumbs-wrap">
					<a href="#" class="item-thumb"> <img src="bootstrap-ecommerce-html/images/items/12.jpg"></a>
					<a href="#" class="item-thumb"> <img src="bootstrap-ecommerce-html/images/items/12-1.jpg"></a>
					<a href="#" class="item-thumb"> <img src="bootstrap-ecommerce-html/images/items/12-2.jpg"></a>
				</div> <!-- slider-nav.// -->
			</article> <!-- gallery-wrap .end// -->
		</aside>
		<main class="col-md-6 border-left">
			<article class="content-body">

				<h2 class="title"><?=$lista['pro_nombre']?></h2>

				<!-- <div class="rating-wrap my-3">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active">
							<i class="fa fa-star"></i> <i class="fa fa-star"></i>
							<i class="fa fa-star"></i> <i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</li>
						<li>
							<i class="fa fa-star"></i> <i class="fa fa-star"></i>
							<i class="fa fa-star"></i> <i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</li>
					</ul>
					<small class="label-rating text-muted">132 reviews</small>
					<small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
				</div>  --><!-- rating-wrap.// -->

				<div class="mb-3">
					<var class="price h4">$<?=$lista['pro_precio_venta']?></var>
					<span class="text-muted">CPL</span>
				</div> <!-- price-detail-wrap .// -->

				<p><?=$lista['pro_descripcion']?></p>


				<dl class="row">
					<dt class="col-sm-3">Altura#</dt>
					<dd class="col-sm-9"><?=$lista['pro_altura']?></dd>

					<dt class="col-sm-3">Anchura</dt>
					<dd class="col-sm-9"><?=$lista['pro_ancho']?></dd>

					<dt class="col-sm-3">Peso</dt>
					<dd class="col-sm-9"><?=$lista['pro_peso']?> </dd>
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