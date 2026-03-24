<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin Dashboard</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="<?= BASE_URL ?>/css/dashboard.css">
		<link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
	</head>
	<body>
		<div class="sidebar">
			<div class="logo text-center"> Admin Panel </div>
				<a href="<?= BASE_URL ?>admin/dashboard"> <i class="fa-solid fa-sliders"></i> Dashboard</a>
				
				<a data-bs-toggle="collapse" href="#productMenu"> <i class="fa-solid fa-cart-plus"></i> Product </a>
				<div class="collapse submenu" id="productMenu" data-bs-parent=".sidebar">
					<a href="<?= BASE_URL ?>admin/product/add-product"> <i class="fa-solid fa-plus"></i> Add Product</a>
					<a href="<?= BASE_URL ?>admin/action/product/manage-product/1"> <i class="fa-solid fa-wrench"></i> Manage Product</a>
				</div>

				<a data-bs-toggle="collapse" href="#brandMenu"> <i class="fa-solid fa-tags"></i> Brand </a>
				<div class="collapse submenu" id="brandMenu" data-bs-parent=".sidebar">
					<a href="<?= BASE_URL ?>admin/brand/add-brand"> <i class="fa-solid fa-plus"></i> Add Brand</a>
					<a href="<?= BASE_URL ?>admin/brand/manage-brand"> <i class="fa-solid fa-wrench"></i> Manage Brand</a>
				</div>
			</div>
			
			<div class="main">
				<div class="topbar">
					<h5 class="m-0"></h5>
					<div class="dropdown">
						<a class="d-flex align-items-center text-decoration-none dropdown-toggle text-white" data-bs-toggle="dropdown"> 
							<img src="<?= BASE_URL ?>uploads/<?= $_SESSION['admin']['U_PROFILE'] ?>" class="profile-img me-2"> Admin
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							<li> <a class="dropdown-item" href="<?= BASE_URL ?>admin/show-profile">Profile</a> </li>
							<li> <a class="dropdown-item" href="<?= BASE_URL ?>admin/edit-profile">Settings</a> </li>
							<li> <hr class="dropdown-divider"> </li>
							<li> <a class="dropdown-item text-danger" href="<?= BASE_URL ?>admin/logout">Logout</a> </li>
						</ul>
					</div>
				</div>
