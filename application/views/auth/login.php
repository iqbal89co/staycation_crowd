<!-- Navbar-->
<header class="header">
	<nav class="navbar navbar-expand-lg navbar-light py-3">
		<div class="container">
			<!-- Navbar Brand -->
			<a href="#" class="navbar-brand">
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

<!-- Login container -->
<div class="container">
	<div class="row py-5 mt-4 align-items-center">
		<!-- Image -->
		<div class="col-lg-6 col-md-6 pr-lg-5 mb-5 mb-md-0">
			<img src="<?= base_url('assets/img/Login-img.png') ?>" alt="Image" class="img-fluid mb-3 d-none d-md-block float-right" style="max-width: 400px;">
		</div>

		<!-- Login Form -->
		<div class="col-lg-5 col-md-5 ml-auto">
			<form action="<?= base_url("Auth/doLogin") ?>" method="POST">
				<h2 class="font-weight-bold">Welcome Back!</h2>
				<p class="pb-4">Login to start your <span class="font-weight-bold"><u>staycation</u></span> </p>
				<div class="row">
					<!-- Username -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-user text-muted"></i>
							</span>
						</div>
						<input type="text" name="email" placeholder="Email" class="form-control form-control-md bg-white border-left-0 border-md">
					</div>
					<!-- Password -->
					<div class="input-group col-lg-12 mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text bg-white px-4 border-md border-right-0">
								<i class="fa fa-lock text-muted"></i>
							</span>
						</div>
						<input type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
					</div>
					<!-- Login Button -->
					<div class="form-group col-lg-12 mx-auto mb-0 mt-3">
						<button class="btn-block font-weight-bold rounded-pill p-2 cust-btn">Login</button>
						<p class="text-center mt-2">not a member yet? <a href="<?= base_url('auth/registerPage') ?>" class="reg-link">register here</a>
						</p>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
