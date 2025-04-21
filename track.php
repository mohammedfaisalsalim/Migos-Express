<?php include 'Loginbackend.php'?>

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Google fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,500;0,700;1,500&display=swap" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<!-- Custom CSS -->
	<link href="style.css" rel="stylesheet">
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="MIGOSlogo.png">
	<title>Track and Trace | MIGOS Express</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="MainMenu.php">
				<img src="MIGOSlogo(S).png" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Shipping</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="<?php echo $ShippingLink ?>">Domestic Shipping</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="track.php">Tracking Order</a></li>
							<li><a class="dropdown-item" href="delivery-time.php">Estimate Delivery time</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="MainMenu.php#AboutUs" data-bs-toggle="dropdown">About us</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="MainMenu.php#AboutUs">About us</a></li>
							<li><a class="dropdown-item" href="MainMenu.php#ContactUs">Contact us</a></li>
						</ul>
					</li>
				</ul>
				<ul class="navbar-nav mb-2 mb-lg-0">
					<li class="nav-item dropdown">
						<?php echo $LoginStatus?>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="gap-nav"></div>

	<form method="$_GET">
            <div id="LogoutConfirm">
                <h1>Are You Leaving?</h1>
                <button id="yes" name="yes">Yes</button>
                <button id="no" name="no">No</button>
            </div>
    </form>

	<section class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6 my-5">

				<form id="form-tracking" class="form-tracking" action="order-status.php" method="GET">
					<h3 class="mb-5">Track and Trace</h3>

					<div class="input-group input-group-lg mb-4">
						<input type="text" class="form-control" name="trace_no" placeholder="E.g.: TNXXXXX, TNXXXXX" required="required">
						<button class="btn btn-primary" type="submit">Track</button>
					</div>

					<p>Enter your waybill number (separated by comma). Available up to 10 waybills.</p>
					<input type="hidden" name="_token" value="">
				</form>

			</div>
			<div class="col-md-3"></div>
		</div>
	</section>

	<footer>
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-3" style="width: 210px;"></div>
					<div class="col-md-3">
						<h3 class="widget-title">Shipping</h3>
						<ul class="list-link">
							<li><a href="<?php echo $ShippingLink ?>">Domestic Shipping</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h3 class="widget-title">Services</h3>
						<ul class="list-link">
							<li><a href="track.php">Tracking Order</a></li>
							<li><a href="delivery-time.php">Estimate Delivery time</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h3 class="widget-title">Info</h3>
						<ul class="list-link">
							<li><a href="MainMenu.php#AboutUs">About us</a></li>
							<li><a href="MainMenu.php#ContactUs">Contact us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<p>© 2022 All right reserved. Development by MIGOS Express</p>
			</div>
		</div>
	</footer>

	<!-- Jquery JS -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
	<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<!-- Custom JS -->
	
	<script src="logout.js"></script>
</body>
</html>