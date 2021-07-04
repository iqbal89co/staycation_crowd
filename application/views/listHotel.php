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
<div class="banner-simple">
</div>
<!-- search card -->
<div class="search-filter container all-view">
	<div class="m-3 card">
		<form class="m-3" method="POST" action="<?= base_url('hero/listHotel') ?>">
			<div class="form-group">
				<label for="inputState">Destination</label>
				<select id="inputState" name="city" class="form-control">
					<?php foreach ($city as $c) :
						if ($c->hasil == "TIDAK ADA KASUS" || $c->hasil == "TIDAK TERDAMPAK") { ?>
							<option class="noCity" value="<?= $c->kode_kota ?>"><?= $c->prov ?>, <?= $c->kota ?></option>
						<?php } else if ($c->hasil == "RESIKO RENDAH") { ?>
							<option class="rendahCity" value="<?= $c->kode_kota ?>"><?= $c->prov ?>, <?= $c->kota ?></option>
						<?php } else if ($c->hasil == "RESIKO SEDANG") { ?>
							<option class="sedangCity" value="<?= $c->kode_kota ?>"><?= $c->prov ?>, <?= $c->kota ?></option>
						<?php } else { ?>
							<option class="tinggiCity" value="<?= $c->kode_kota ?>"><?= $c->prov ?>, <?= $c->kota ?></option>
					<?php }
					endforeach; ?>
				</select>
			</div>
			<div class="form-row">
				<button type="submit" class="btn btn-primary text-right ml-auto">Search</button>
			</div>

		</form>
	</div>
</div>
<div class="container all-view">

	<div class="all mb-5">
		<div class="row">
			<?php foreach ($listHotel as $l) : ?>
				<div class="col-sm-6 col-lg-3 pr-0">
					<a href="<?= base_url('hero/detail/') . $l['id_hotel'] ?>" style="height: 200px;width: 170px;">
						<div class="wrapper">
							<div class="card radius shadowDepth1">
								<div class="card__image border-tlr-radius" style="background-image: url('<?= base_url('assets/img/hotel/') . $l['picture'] ?>');">
								<?php
									switch ($l['resiko']) {
										case "TIDAK ADA KASUS":
											echo '<span class="m-2 badge badge-success">No Case</span>';
											break;
										case "RESIKO RENDAH":
											echo '<span class="m-2 badge badge-info">Low Risk</span>';
											break;
										case "RESIKO SEDANG":
											echo '<span class="m-2 badge badge-warning">Medium Risk</span>';
											break;
										default:
											echo '<span class="m-2 badge badge-danger">High Risk</span>';
											break;
									}
								?>
								</div>
								<div class="card__content card__padding">
									<div class="location">
										<span><i class="fas fa-map-marker-alt"></i></span>
									</div>
									<div class="card__content card__padding">
										<div class="name">
											<h6><?= $l['name'] ?></h6>
										</div>
										<div class="rate">
											<?php for ($i = 0; $i < $l['stars']; $i++) { ?>
												<i class="fa fa-star"></i>
											<?php } ?>
										</div>
										<div class="card__content card__padding">
											<div class="location">
												<span><i class="fas fa-map-marker-alt"></i> <?= $l['nama_kota'] ?></span>
											</div>
											<div class="info">
												<i><?= $l['nearest_hospital_distance'] ?> km from hospital</i>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>


		</div>
	</div>
</div>
<script>
	$("#inputState").select2({
		theme: 'bootstrap',
		templateResult: function(state) {
			if (!state.id) {
				return state.text
			}
			return $(
				`<span class="h-100 w-100 d-block p-1 ${state.element.className}">` + state.text + "</span>"
			)
		}
	});
</script>
