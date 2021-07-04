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
			<div class="form-row">
				<div class="form-group col-md-3">
					<label for="inputState">Destination</label>
					<select id="inputState" name="city" class="form-control">
					<?php foreach ($city as $c) :
						if ($c->hasil == "TIDAK ADA KASUS") { ?>
							<option class="noCity" value="<?= $c->kode_kota ?>"><?= $c->prov ?>, <?= $c->kota ?></option>
						<?php } else if ($c->hasil == "RESIKO RENDAH") { ?>
							<option class="rendahCity" value="<?= $c->kode_kota ?>"><?= $c->prov ?>, <?= $c->kota ?></option>
						<?php } else if ($c->hasil == "RESIKO SEDANG") { ?>
							<option class="sedangCity" value="<?= $c->kode_kota ?>"><?= $c->prov ?>, <?= $c->kota ?></option>
						<?php } else { ?>
							<option class="tinggiCity" value="<?= $c->kode_kota ?>"><?= $c->prov ?>, <?= $c->kota ?></option>
					<?php } endforeach; ?>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="checkIn">Check-In</label>
					<input type="date" name="checkIn" class="form-control" id="checkIn" value="<?= $date1 ?>" placeholder="">
				</div>
				<div class="form-group col-md-3">
					<label for="checkOut">Check-Out</label>
					<input type="date" name="checkOut" class="form-control" id="checkOut" value="<?= $date2 ?>" placeholder="">
				</div>

				<div class="mb-3 col-md-3">
					<label for="guest">&nbsp;</label>
					<button type="button" class="btn btn-secondary w-100 drop-heading">
						Guest
					</button>

					<div class="drop-text w-100">
						<input type="number" value="<?= $jlhIbuHamil ?>" hidden readonly min="0" class="ctIbuHamil" name="jlhIbuHamil">
						<input type="number" value="<?= $jlhDewasa ?>" hidden readonly min="0" class="ctDewasa" name="jlhDewasa">
						<input type="number" value="<?= $jlhAnak ?>" hidden readonly min="0" class="ctAnak" name="jlhAnak">
						<ul class="list-group list-group-flush">
							<li class="list-group-item">Ibu Hamil
								<div class="float-right" id="rowIbuHamil">
									<button type="button" class="plusMin btnMin">-</button>
									<span class="ctGuest"><?= $jlhIbuHamil ?></span>
									<button type="button" class="plusMin btnPlus">+</button>
								</div>
							</li>
							<li class="list-group-item">Orang dewasa
								<div class="float-right" id="rowDewasa">
									<button type="button" class="plusMin btnMin">-</button>
									<span class="ctGuest"><?= $jlhDewasa ?></span>
									<button type="button" class="plusMin btnPlus">+</button>
								</div>
							</li>
							<li class="list-group-item">Anak-anak
								<div class="float-right" id="rowAnak">
									<button type="button" class="plusMin btnMin">-</button>
									<span class="ctGuest"><?= $jlhAnak ?></span>
									<button type="button" class="plusMin btnPlus">+</button>
								</div>
							</li>
							<li><button type="button" class="btn w-100 drop-done">done</button></li>
						</ul>
					</div>
				</div>
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
				<div class="col-lg-3 col-md-4 col-sm-6">
					<a href="<?= base_url('hero/detail/') . $l['id_hotel'] ?>" class="wrapper">
						<div class="card radius shadowDepth1">
							<div class="card__image border-tlr-radius" style="background-image: url('<?= base_url('assets/img/hotel/') . $l['picture'] ?>');">
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
								<div class="location">
									<span><i class="fas fa-map-marker-alt"></i></span>
								</div>
								<div class="info">
									<i><?= $l['nearest_hospital_distance'] ?> km to hospital</i>
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
		templateResult: function(state){
			if(!state.id){
				return state.text
			}
			return $(
				`<span class="h-100 w-100 d-block p-1 ${state.element.className}">` + state.text + "</span>"
			)
		}
	});
</script>
