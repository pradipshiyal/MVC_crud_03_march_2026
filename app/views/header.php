<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
		<title>Product Store</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
				<a class="navbar-brand" href="#">MyStore</a>
    		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
    		        <span class="navbar-toggler-icon"></span>
    		    </button>

    		    <div class="collapse navbar-collapse" id="navbarContent">
    		        <ul class="navbar-nav ms-auto">
    		            <li class="nav-item"> <a class="nav-link active" href="<?= BASE_URL ?>">Home</a> </li>
    		            <li class="nav-item"> <a class="nav-link" href="<?= BASE_URL ?>brands/"> Brands</a> </li>
    		            <li class="nav-item"> <a class="nav-link" href="<?= BASE_URL ?>wishlist/"> Wishlist </a> </li>
    		            <li class="nav-item"> <a class="nav-link" href="<?= BASE_URL ?>admin/login">Login</a> </li>
    		        </ul>
    		    </div>
    		</div>
		</nav>
	