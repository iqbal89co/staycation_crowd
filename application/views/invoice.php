<div class="card col-lg-9 col-md-10 col-sm-10 mx-auto mt-3 mb-5 pb-3" id="cust-card-h">
	<div class="card-header text-center mt-4 font-weight-bold" id="card-h">
		<h4>Payment Details</h4>
	</div>
</div>

<div class="col-lg-10 mx-auto">
	<div class="row">

		<div class="card-body col-lg-6 mx-auto mb-5" id="cust-card-b1">
			<div class="row">
				<!-- Place photo -->
				<div class="col-lg-4 col-md-6 col-sm-12">
					<img src="<?= base_url("assets/img/hotel/$details->picture") ?>"
						alt="hotel image" width="150" class="rounded">
				</div>
				<!-- Place name -->
				<div class="col-lg-8 col-md-6 col-sm-12 align-self-center">
					<h5 class="font-weight-bold"><?= $details->hotel_name ?></h5>
					<p><?= $details->hotel_address ?></p>
				</div>
			</div>
			<!-- User name -->
			<div class="mt-4 pl-2" id="card-name">
				<b>Booked by</b>
				<p><?= $details->booking_name ?></p>
			</div>
			<div class="row mt-4 pl-2" id="card-date">
				<div class=" row col-6" id="date-card">
					<!-- Check in date -->
					<div class="col-12">
						<b>Check in</b>
						<p><?= date('d M Y H:i:s', strtotime($details->check_in)) ?></p>
					</div>
					<!-- Check out date -->
					<div class="col-12">
						<b>Check out</b>
						<p><?= date('d M Y H:i:s', strtotime($details->check_out)) ?></p>
					</div>
				</div>
				<!-- Duration of stay -->
				<div class="col-6 align-self-center pl-5">
					<b><?= $details->nights ?> nights</b>
				</div>
			</div>
			<!-- Room type -->
			<div class="mt-4 pl-2 pt-4 pb-4" id="card-room">
				<b>Room</b>
				<p><?= $details->room_name ?>
				<span class="float-right font-weight-bold">IDR <?= $details->price ?>/night</span></p>
			</div>
		</div>
		<div class="card-body col-lg-5 mx-auto mb-5 ml-2" id="cust-card-b2">
			<div class="col-lg-12">
				<!-- Total Payment -->
				<div class="mt-4 pl-2 pb-4" id="card-name">
					<b>Total Payment <span class="float-right">IDR <?= $details->nights * $details->price ?></span></b>
				</div>
				<!-- Payment Method -->
				<div class="mt-4 pl-2 pb-4">
					<b>Payment method</b> <br><br>
					<form action="<?= base_url('Hero/paymentSuccess') ?>" method="POST" id="payment-form">
						<div class="pb-3">
							<!-- Credit Card -->
							<div class="form-check form-check-inline mr-1">
								<input class="form-check-input" type="radio" name="payment_type" value="creditcard"
									required>
								<label class="form-check-label">Credit Card</label>
							</div>
							<!-- Debit Card -->
							<div class="form-check form-check-inline mr-1">
								<input class="form-check-input" type="radio" name="payment_type" value="debitcard"
									required>
								<label class="form-check-label">Debit Card</label>
							</div>
							<!-- Virtual Account -->
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="payment_type" value="virtualAcc"
									required>
								<label class="form-check-label">Virtual Account</label>
							</div>
							<!-- Other method -->
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="payment_type" value="Other" required>
								<label class="form-check-label">Other</label>
							</div>
						</div>
						<!-- credit card payment box -->
						<div id="creditMethod" class="paymentMethod p-3 col-lg-12" style="display: none;">
							<div class="form-group">
								<select class="form-control" name="payment_method" required>
									<option hidden>Select your credit card</option>
									<option>BCA</option>
									<option>Mandiri</option>
									<option>BNI</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Card Holder Name">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="card_type" placeholder="Card Number">
							</div>
							<div class="form-group form-row">
								<div class="col-sm-6">
									<div class="">
										<input type="text" class="form-control" name="expired_date"
											placeholder="Expiration date">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="">
										<input type="text" class="form-control" name="cv_code" placeholder="CVV/CVC">
										<small>3 last digit number that's printed at the back of your card</small>
									</div>
								</div>
							</div>
						</div>
						<!-- debit card payment box -->
						<div id="debitMethod" class="paymentMethod p-3 col-lg-12" style="display: none;">
							<div class="form-group">
								<select class="form-control">
									<option hidden>Select your debit card</option>
									<option>BCA</option>
									<option>Mandiri</option>
									<option>BNI</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Card Holder Name">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="card_number" placeholder="Card Number">
							</div>
							<div class="form-group form-row">
								<div class="col-sm-6">
									<div class="">
										<input type="text" class="form-control" name="expired_date"
											placeholder="Expiration date">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="">
										<input type="text" class="form-control" name="cv_code" placeholder="CVV/CVC">
										<small>3 last digit number that's printed at the back of your card</small>
									</div>
								</div>
							</div>
						</div>
						<!-- Virtual Account payment box -->
						<div id="virtualMethod" class="paymentMethod p-3 col-lg-12" style="display: none;">
							<div class="form-group">
								<select id="selectVirtual" class="form-control">
									<option hidden>Select your virtual account</option>
									<option value="virBCA">BCA</option>
									<option value="virMandiri">Mandiri</option>
									<option value="virBNI">BNI</option>
								</select>
							</div>
							<div id="virtualBCA" class="form-group" style="display: none;">
								<label>Here are BCA virtual ccount</label>
								<input type="text" value="001283" class="form-control virtualAcc" disabled>
								<small class="justify-align-left">Input 001283 + your phone number <br> ex: 001283
									0814-0217-2211</small>
							</div>
							<div id="virtualMandiri" class="form-group" style="display: none;">
								<label>Here are Mandiri virtual ccount</label>
								<input type="text" value="11298" class="form-control virtualAcc" disabled>
								<small class="justify-align-left">Input 11298 + your phone number <br> ex: 11298
									0814-0217-2211</small>
							</div>
							<div id="virtualBNI" class="form-group" style="display: none;">
								<label>Here are BNI virtual ccount</label>
								<input type="text" value="009283" class="form-control virtualAcc" disabled>
								<small class="justify-align-left">Input 009283 + your phone number <br> ex: 009283
									0814-0217-2211</small>
							</div>
						</div>
						<!-- Other method payment box -->
						<div id="otherMethod" class="paymentMethod p-3 col-lg-12" style="display: none;">
							<div class="form-group">
								<select id="selectOther" class="form-control">
									<option hidden>Select your payment</option>
									<option value="gopay">Gopay</option>
									<option value="ovo">Ovo</option>
								</select>
							</div>
							<div id="Gopay" class="text-center" style="display: none;">
								<label>Scan this Qr code</label> <br>
								<img src="<?= base_url('assets/img/qr.png') ?>" alt="Qr" width="150"
									class="text-center">
							</div>
							<div id="Ovo" class="text-center" style="display: none;">
								<label>Scan this Qr code</label> <br>
								<img src="<?= base_url('assets/img/qr.png') ?>" alt="Qr" width="150"
									class="text-center">
							</div>
						</div>
						<button class="btn pay-btn font-weight-bold float-right mt-4">Pay</button>
						<a type="button" class="font-weight-bold float-right mt-4 mr-3 p-2" id="cancel-btn">Cancel</a>
					</form>
				</div>
			</div>
		</div>


	</div>
</div>


<!-- jquery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script>
	$(document).ready(function () {

		$("input[type='radio']").change(function () {
			if ($(this).val() == "creditcard") {
				$("#creditMethod").show();
				$("#debitMethod").hide();
				$("#virtualMethod").hide();
				$("#otherMethod").hide();
			} else if ($(this).val() == "debitcard") {
				$("#debitMethod").show();
				$("#creditMethod").hide();
				$("#virtualMethod").hide();
				$("#otherMethod").hide();
			} else if ($(this).val() == "virtualAcc") {
				$("#virtualMethod").show();
				$("#creditMethod").hide();
				$("#debitMethod").hide();
				$("#otherMethod").hide();
			} else if ($(this).val() == "Other") {
				$("#otherMethod").show();
				$("#creditMethod").hide();
				$("#debitMethod").hide();
				$("#virtualMethod").hide();
			} else {
				$("#creditMethod").hide();
				$("#debitMethod").hide();
				$("#virtualMethod").hide();
				$("#otherMethod").hide();
			}
		});

		$("#selectVirtual").change(function () {
			if ($(this).val() == "virBCA") {
				$("#virtualBCA").show();
				$("#virtualMandiri").hide();
				$("#virtualBNI").hide();
			} else if ($(this).val() == "virMandiri") {
				$("#virtualMandiri").show();
				$("#virtualBCA").hide();
				$("#virtualBNI").hide();
			} else if ($(this).val() == "virBNI") {
				$("#virtualBNI").show();
				$("#virtualBCA").hide();
				$("#virtualMandiri").hide();
			} else {
				$("#virtualBCA").hide();
				$("#virtualMandiri").hide();
				$("#virtualBNI").hide();
			}
		});

		$("#selectOther").change(function () {
			if ($(this).val() == "gopay") {
				$("#Gopay").show();
				$("#Ovo").hide();

			} else if ($(this).val() == "ovo") {
				$("#Ovo").show();
				$("#Gopay").hide();
			} else {
				$("#Gopay").hide();
				$("#Ovo").hide();
			}
		});

		$("#payment-form").submit(function(e){
			e.preventDefault();
			Swal.fire({
				title: "Payment Successful",
				icon: "success",
				willClose: () => {
					window.location.href = "<?= base_url() ?>";
				}
			});
		});
	});

</script>
