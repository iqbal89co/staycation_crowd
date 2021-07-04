<!-- Navbar-->
<header class="header">
	<nav class="navbar navbar-expand-lg navbar-light py-3">
		<div class="container">
			<!-- Navbar Brand -->
			<a href="<?= base_url() ?>" class="navbar-brand">
				<img src="<?= base_url('assets/img/logo.png') ?>" alt="babymoon" width="150">
			</a>
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active ml-3">
					<a class="nav-link " href="<?= base_url('auth/loginPage') ?>">Login <span class="sr-only">(current)</span></a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<?php for($i = 0; $i < count($gambar); $i++) : ?>
			<div class="carousel-item <?= $i == 0 ? "active" : "" ?>">
				<div class="d-block w-100 carousel-image" style="background-image: url('<?= base_url('assets/img/hotel/') . $gambar[$i]['name'] ?>');" height="400" alt="slide"></div>
			</div>
		<?php endfor; ?>
	</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- Property Details Section Begin -->
<section class="property-details-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="pd-text">
					<div class="row my-3">
						<div class="col-lg-6">
							<div class="pd-title">
								<a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
								<div class="pt-price">IDR <?= $detail['price'] ?><span>/night</span></div>
								<h3><?= $detail['name'] ?></h3>
								<p><span class="icon_pin_alt"></span> <?= $detail['address'] ?></p>
							</div>
						</div>
					</div>
					<div class="pd-board">
						<div class="tab-board">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Overview</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Description</a>
								</li>
							</ul><!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active" id="tabs-1" role="tabpanel">
									<div class="tab-details">
										<ul class="left-table">
											<li>
												<span class="type-name">Price</span>
												<span class="type-value">IDR <?= $detail['price'] ?>/night</span>
											</li>
											<li>
												<span class="type-name">Type</span>
												<span class="type-value">Glamping</span>
											</li>
										</ul>
										<ul class="right-table">
											<li>
												<span class="type-name">Room Type</span>
												<span class="type-value">Luxury</span>
											</li>
											<li>
												<span class="type-name">Capacity</span>
												<span class="type-value">2</span>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-pane" id="tabs-2" role="tabpanel">
									<div class="tab-desc">
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolor itaque facere consequatur, dignissimos minus adipisci ipsam repudiandae nisi illum provident, natus quidem vero? Quaerat ducimus sequi praesentium commodi, consectetur corporis eos sit perspiciatis, quae sed officia error, iure quasi.</p>
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt dolor itaque facere consequatur, dignissimos minus adipisci ipsam repudiandae nisi illum provident, natus quidem vero? Quaerat ducimus sequi praesentium commodi, consectetur corporis eos sit perspiciatis, quae sed officia error, iure quasi.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pd-widget">
						<h4>Location</h4>
						<div class="map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9862545618907!2d106.94509731423047!3d-6.648624666843121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b7bca97fa715%3A0x7763f029fab7bed5!2sForrester%20Glamping%20Co.!5e0!3m2!1sid!2sid!4v1625326827861!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
						<div class="map-location">
							<div class="row">
								<div class="col-lg-6">
									<div class="ml-item">
										<div class="ml-single-item">
											<h6>Hospital <span>( <i class="fa fa-location-arrow"></i> 5 km )</span></h6>
											<p>Portland Ave Rochester, NY 14621</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="ml-item">
										<div class="ml-single-item">
											<h6>Apotic <span>( <i class="fa fa-location-arrow"></i> 5 km )</span></h6>
											<p>Boomerang Barber & Beauty</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pd-widget">
						<h4>02 reviews</h4>
						<div class="pd-review">
							<div class="pr-item">
								<div class="pr-avatar">
									<!-- <div class="pr-pic">
                                        <img src="" alt="">
                                    </div> -->
									<div class="pr-text">
										<h6>Brandon Kelley</h6>
										<span>15 Aug 2017</span>
										<div class="pr-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
								</div>
								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
							</div>
							<div class="pr-item">
								<div class="pr-avatar">
									<!-- <div class="pr-pic">
                                        <img src="" alt="">
                                    </div> -->
									<div class="pr-text">
										<h6>Matthew Nelson</h6>
										<span>15 Aug 2017</span>
										<div class="pr-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
								</div>
								<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam.</p>
							</div>
						</div>
					</div>
					<div class="pd-widget">
						<h4>YOur Rating</h4>
						<form action="#" class="review-form">
							<div class="group-input">

							</div>
							<textarea placeholder="Messages"></textarea>
							<div class="rating">
								<span>Your Rating:</span>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<button type="submit" class="btn btn-primary">send messages</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Property Details Section End -->
