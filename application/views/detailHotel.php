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
		<?php for ($i = 0; $i < count($gambar); $i++) : ?>
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
								<div class="pt-price"><span><b>start from</b></span> IDR <?= $detail['price'] ?><span>/night</span></div>
								<h3><?= $detail['name'] ?></h3>
								<p><span class="icon_pin_alt"></span> <?= $detail['address'] ?></p>
							</div>
						</div>
					</div>
					<div class="pd-board">
						<div class="tab-board">
							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Rooms</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Hotel Description</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Hotel Rules</a>
								</li>
							</ul><!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active" id="tabs-1" role="tabpanel">
									<?php foreach ($rooms as $r) : ?>
										<div class="tab-details">
											<ul class="left-table">
												<img class="img-fluid" src="<?= base_url('assets/img/hotel/') . $r['picture'] ?>" alt="">
											</ul>
											<ul class="right-table">
												<li>
													<span class="type-name">Price</span>
													<span class="type-value">IDR <?= $r['price'] ?>/night</span>
												</li>
												<li>
													<span class="type-name">Type</span>
													<span class="type-value"><?= $r['type'] ?></span>
												</li>
												<li>
													<span class="type-name">Room Type</span>
													<span class="type-value"><?= $r['name'] ?></span>
												</li>
												<li>
													<span class="type-name">Capacity</span>
													<span class="type-value"><?= $r['capacity'] ?> person</span>
												</li>
												<li>
													<span class="type-name">Beds</span>
													<span class="type-value"><?= $r['beds'] ?> beds</span>
												</li>
												<li>
													<a class="btn btn-warning float-right" href="<?= base_url("/hero/booking/$r[id_room]") ?>">
														Choose this room
													</a>
												</li>
											</ul>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="tab-pane" id="tabs-2" role="tabpanel">
									<div class="tab-desc">
										<p><?= $detail['description'] ?></p>
									</div>
								</div>
								<div class="tab-pane" id="tabs-3" role="tabpanel">
									<div class="tab-desc">
										<p><?= $detail['rules'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pd-widget">
						<h4>Location</h4>
						<div class="map">
							<iframe class="w-100 h-100" src="<?= $detail['map_link'] ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
						</div>
						<div class="map-location">
							<div class="row">
								<div class="col-lg-6">
									<div class="ml-item">
										<div class="ml-single-item">
											<h6>Hospital <span>( <i class="fa fa-location-arrow"></i> <?= $detail['nearest_hospital_distance'] ?> km )</span></h6>
											<p>RS.Adam malik</p>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="ml-item">
										<!-- <div class="ml-single-item">
											<h6>mother and child hospital<span>( <i class="fa fa-location-arrow"></i> <?= $detail['nearest_rsia'] ?> km )</span></h6>
											<p>RS.Stella Maris</p>
											<p>(0411) 854341</p>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="pd-widget">
						<h4><?= $reviews['count'] ?> reviews</h4>
						<div class="pd-review">
							<?php for ($i = 0; $i < count($reviews['data']); $i++) : ?>
								<div class="pr-item">
									<div class="pr-avatar">
										<div class="pr-text">
											<h6><?= $reviews['data'][$i]->rater ?></h6>
											<span><?= date('d M Y', strtotime($reviews['data'][$i]->time)) ?></span>
											<div class="pr-rating">
												<?php for ($j = 0; $j < 5; $j++) : ?>
													<i class="fa fa-star <?= $j < $reviews['data'][$i]->rating ? 'rated' : '' ?>"></i>
												<?php endfor; ?>
											</div>
										</div>
									</div>
									<p><?= $reviews['data'][$i]->review ?></p>
								</div>
							<?php endfor; ?>
						</div>
					</div>
					<div class="pd-widget">
						<h4>Your Rating</h4>
						<form action="<?= base_url("/Review/addReview/$id") ?>" method="POST" class="review-form">
							<label for='input-rater'>Rater</label>
							<input type="text" id='input-rater' name="rater" class="form-control" placeholder="Provide your name" />
							<br />
							<textarea name="review" placeholder="Messages"></textarea>
							<div class="rating">
								<span>Your Rating:</span>
								<label for="rating-star-1">
									<i class="fa fa-star"></i>
								</label>
								<input class="d-none" id="rating-star-1" type="radio" name="rating" value='1' />
								<label for="rating-star-2">
									<i class="fa fa-star"></i>
								</label>
								<input class="d-none" id="rating-star-2" type="radio" name="rating" value='2' />
								<label for="rating-star-3">
									<i class="fa fa-star"></i>
								</label>
								<input class="d-none" id="rating-star-3" type="radio" name="rating" value='3' />
								<label for="rating-star-4">
									<i class="fa fa-star"></i>
								</label>
								<input class="d-none" id="rating-star-4" type="radio" name="rating" value='4' />
								<label for="rating-star-5">
									<i class="fa fa-star"></i>
								</label>
								<input class="d-none" id="rating-star-5" type="radio" name="rating" value='5' />
							</div>
							<button type="submit" class="btn btn-primary">Send messages</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(".review-form").on("change", `input[name="rating"]`, (e) => {
		for (let i = 0; i < 5; i++) {
			if (i < e.currentTarget.value) {
				$(".review-form").find(`label[for="rating-star-${i + 1}"]`).addClass('rated');
			} else {
				$(".review-form").find(`label[for="rating-star-${i + 1}"]`).removeClass('rated');
			}
		}
	});
</script>
<!-- Property Details Section End -->
