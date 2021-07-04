<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/1b121976b3.js" crossorigin="anonymous"></script>
    <!-- Animated on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- tab icon -->
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png') ?>" type="image/x-icon">
    <!-- style css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/index.css') ?>">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>BabyMoon- Your StayCation Solution !</title>
</head>

<body>
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
<div class="container">
  <div class="booking-card pd-text m-4 radius">
    <div class="pd-title m-3 pt-5">
      <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
      <div class="pt-price">IDR <?= $room->price ?><span>/night</span></div>
      <h3><?= $hotel['name'] ?></h3>
      <p><span class="icon_pin_alt"></span> <?= $hotel['address'] ?></p>
    </div>
    <form action="<?= base_url("/Hotel/bookRoom/$room->id_room") ?>" method="post" class="trip-form">
      <div class="form-row">
        <input type="text" name="name" class="form-control from-place" placeholder="Your name">
      </div>
      <div class="form-group row mt-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" name="email" class="form-control from-place" id="inputEmail" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
          <input type="text" name="phone_number" class="form-control from-place" id="inputPhone" placeholder="Phone Number">
        </div>
      </div>
      <div class="form-group row">
        <div class="form-group col-12 col-md-6">
          <label for="checkIn">Check-In</label>
          <input type="datetime-local" name="check_in" class="form-control" id="checkIn">
        </div>
        <div class="form-group col-12 col-md-6">
          <label for="checkOut">Check-Out</label>
          <input type="datetime-local" name="check_out" class="form-control" id="checkOut">
        </div>
      </div>
      <div class="mb-3">
        <div>
          Guests
        </div>
        <hr />
        <div class="w-100">
          <input type="number" value="0" hidden readonly min="0" class="ctIbuHamil" name="pregnant_mothers">
          <input type="number" value="0" hidden readonly min="0" class="ctDewasa" name="adults">
          <input type="number" value="0" hidden readonly min="0" class="ctAnak" name="children">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Pregnant Mothers
              <div class="float-right" id="rowIbuHamil">
                <button type="button" class="plusMin btnMin">-</button>
                <span class="ctGuest">0</span>
                <button type="button" class="plusMin btnPlus">+</button>
              </div>
            </li>
            <li class="list-group-item">Adults
              <div class="float-right" id="rowDewasa">
                <button type="button" class="plusMin btnMin">-</button>
                <span class="ctGuest">0</span>
                <button type="button" class="plusMin btnPlus">+</button>
              </div>
            </li>
            <li class="list-group-item">Children
              <div class="float-right" id="rowAnak">
                <button type="button" class="plusMin btnMin">-</button>
                <span class="ctGuest">0</span>
                <button type="button" class="plusMin btnPlus">+</button>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <input class="btn btn-primary" type="submit" value="Payment"/>
    </form>
  </div>
</div>
<footer class="footer">
	<div class="footer-left">
		<p class="footer-links">
			<a href="#">Home</a> ·
			<a href="#">About</a> ·
			<a href="#">Pricing</a> ·
			<a href="#">About</a> ·
			<a href="#">Faq</a> ·
			<a href="#">Contact</a>
		</p>
		<p class="footer-company-name text-light">Babymoon &copy; 2021</p>
	</div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://storage.googleapis.com/vrview/2.0/build/vrview.min.js"></script>
<script>
  $(document).on('click', '.btnMin', function() {
    let minNumber = Number($(this).next().text());
    if (minNumber > 0) {
      minNumber--;
    }
    $(this).next().text(minNumber);

    let getParent = $(this).parent().attr('id');
    if (getParent == 'rowIbuHamil') {
      let addVal = Number($('.ctIbuHamil').val());
      if (addVal > 0) {
        addVal--;
      }
      $('.ctIbuHamil').val(addVal);
    } else if (getParent == 'rowDewasa') {
      let addVal = Number($('.ctDewasa').val());
      if (addVal > 0) {
        addVal--;
      }
      $('.ctDewasa').val(addVal);
    } else if (getParent == 'rowAnak') {
      let addVal = Number($('.ctAnak').val());
      if (addVal > 0) {
        addVal--;
      }
      $('.ctAnak').val(addVal);
    }
  });
  $(document).on('click', '.btnPlus', function() {
    let plusNumber = Number($(this).prev().text()) + 1;
    $(this).prev().text(plusNumber);

    let getParent = $(this).parent().attr('id');
    if (getParent == 'rowIbuHamil') {
      let addVal = Number($('.ctIbuHamil').val()) + 1;
      $('.ctIbuHamil').val(addVal);
    } else if (getParent == 'rowDewasa') {
      let addVal = Number($('.ctDewasa').val()) + 1;
      $('.ctDewasa').val(addVal);
    } else if (getParent == 'rowAnak') {
      let addVal = Number($('.ctAnak').val()) + 1;
      $('.ctAnak').val(addVal);
    }
  });
</script>
</body>

</html>
