<div class="container">
	<div class="card">
		<div class="card-body">
			<div>mom company</div>
			<hr>
			<div class="form-group">
				<label for="destination">Destination</label>
				<select class="form-control" id="destination">
					<option disabled selected>-- choose --</option>
					<?php foreach ($city as $c) : ?>
						<option value="<?= $c['id_kota'] ?>"><?= $c['nama_kota'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label for="checkIn">Check-In</label>
				<input type="date" class="form-control" id="checkIn" placeholder="name@example.com">
			</div>
			<div class="form-group">
				<label for="checkOut">Check-Out</label>
				<input type="date" class="form-control" id="checkOut" placeholder="name@example.com">
			</div>
			<div class="form-group">
				<label for="checkOut">Kamar</label>
				<input type="date" class="form-control" id="checkOut" placeholder="name@example.com">
			</div>
		</div>
	</div>
</div>
