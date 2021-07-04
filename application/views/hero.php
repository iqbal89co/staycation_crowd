<div class="photo-banner position-absolute">
</div>
<div class="row w-100 p-0 m-0">
	<div class="col-sm-12 col-lg-6 left-side">
		<div class="logo m-3">
			<img class="" src="assets/img/logo.png" alt="" width="200">
		</div>

		<div class="quotes my-5">
			<h1 class="">
				Enjoy a Safe and Comfortable Vacation with <b>BABYMOON</b>
			</h1>
		</div>
	</div>
	<div class="col-sm-12 col-lg-6">
		<div class="search-panel position-absolute bg-white w-100">
			<nav class="navbar navbar-expand-lg navbar-light text-dark px-4">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item ml-3">
						<a class="nav-link" href="<?= base_url('auth/loginPage') ?>">Login <span class="sr-only">(current)</span></a>
					</li>
				</ul>
			</nav>

			<div class="search-filter">
				<div class="m-3 card">
					<form class="m-3" method="POST" action="<?= base_url('hero/listHotel') ?>">
						<div class="form-row">
							<div class="form-group col-md-12">
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
									<?php }
									endforeach; ?>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label for="checkIn">Check-In</label>
								<input type="date" name="checkIn" class="form-control" id="checkIn" placeholder="">
							</div>
							<div class="form-group col-md-6">
								<label for="checkOut">Check-Out</label>
								<input type="date" name="checkOut" class="form-control" id="checkOut" placeholder="">
							</div>
						</div>
						<div class="mb-3">
							<button type="button" class="btn btn-secondary w-100 drop-heading">
								Guest
							</button>

							<div class="drop-text w-100">
								<input type="number" value="0" hidden readonly min="0" class="ctIbuHamil" name="jlhIbuHamil">
								<input type="number" value="0" hidden readonly min="0" class="ctDewasa" name="jlhDewasa">
								<input type="number" value="0" hidden readonly min="0" class="ctAnak" name="jlhAnak">
								<ul class="list-group list-group-flush">
									<li class="list-group-item">Ibu Hamil
										<div class="float-right" id="rowIbuHamil">
											<button type="button" class="plusMin btnMin">-</button>
											<span class="ctGuest">0</span>
											<button type="button" class="plusMin btnPlus">+</button>
										</div>
									</li>
									<li class="list-group-item">Orang dewasa
										<div class="float-right" id="rowDewasa">
											<button type="button" class="plusMin btnMin">-</button>
											<span class="ctGuest">0</span>
											<button type="button" class="plusMin btnPlus">+</button>
										</div>
									</li>
									<li class="list-group-item">Anak-anak
										<div class="float-right" id="rowAnak">
											<button type="button" class="plusMin btnMin">-</button>
											<span class="ctGuest">0</span>
											<button type="button" class="plusMin btnPlus">+</button>
										</div>
									</li>
									<li><button type="button" class="btn w-100 drop-done">done</button></li>
								</ul>
							</div>
						</div>
						<div class="form-row">

							<button type="submit" class="btn btn-primary text-right ml-auto">Search</button>
						</div>

					</form>
				</div>
			</div>

			<div class="explore ml-5 my-3">
				<h2>Safest Vacation</h2>
				<div class=" list__wisata">
					<?php foreach ($popularHotel as $p) : ?>
						<div class="col-4 pr-0">
							<div class="wrapper">
								<div class="card radius shadowDepth1">
									<div class="card__image border-tlr-radius" style="background-image: url('<?= base_url('assets/img/hotel/') . $p['picture'] ?>');">
									<a href="#" class="m-2 badge badge-danger">High Risk</a>
									</div>
									<div class="card__content card__padding">
										<div class="name">
											<h6><?= $p['name'] ?></h6>
										</div>
										<div class="rate">
											<?php for ($i = 0; $i < $p['stars']; $i++) { ?>
												<i class="fa fa-star"></i>
											<?php } ?>
										</div>
										<div class="location">
											<span><i class="fas fa-map-marker-alt"></i> <?= $p['nama_kota'] ?></span>
										</div>
										<div class="info">
											<i><?= $p['nearest_hospital_distance'] ?> km from hospital</i>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>

	<div class="container benefit py-5">
            <h1 class="">Safe and Unique Vacation</h1>
            <div class="row my-5">
                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center py-5 justify-content-center">
                        <div class="card-body p-2">
                            <img class="float-center mb-4" src="assets/img/corona-safe.png" alt="" width="100">
                            <h6>guarantee health protocol</h6>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center py-5 justify-content-center">
                        <div class="card-body p-2">
                            <img class="float-center mb-4" src="assets/img/safe.png" alt="" width="100">
                            <h6>Provide the safest location for you</h6>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center py-5 justify-content-center">
                        <div class="card-body p-2">
                            <img class="float-center mb-4" src="assets/img/health.png" alt="" width="100">
                            <h6>Provide information on the nearest health service during an emergency</h6>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card text-center py-5 justify-content-center">
                        <div class="card-body p-2">
                            <img class="float-center mb-4" src="assets/img/vacation.png" alt="" width="100">
                            <h6>staycation with a variety of unique experiences</h6>
                         </div>
                    </div>
                </div>
            </div>
        </div>
