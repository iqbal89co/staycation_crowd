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
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
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
      <div class="pt-price">IDR 140.000<span>/night</span></div>
      <h3>Forrester Glamping Co.</h3>
      <p><span class="icon_pin_alt"></span> Megamendung, Kec. Megamendung, Bogor, Jawa Barat 16770</p>
    </div>
    <form action="" method="post" class="trip-form">
      <div class="form-row">
        <div class="col-6">
          <input type="text" class="form-control from-place" placeholder="First name">
        </div>
        <div class="col-6">
          <input type="text" class="form-control from-place" placeholder="Last name">
        </div>
      </div>
      <div class="form-group row mt-3">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control from-place" id="inputEmail" placeholder="Email">
        </div>
      </div>
      <div class="form-group row">
      <label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
        <div class="col-sm-10">
          <input type="text" class="form-control from-place" id="inputPhone" placeholder="Phone Number">
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
</body>

</html>
