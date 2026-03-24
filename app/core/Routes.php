<?php 
	$router = new Router();
	$router->route('', [ProductController::class, 'index']);
	$router->route('brands', [BrandController::class, 'index']);
	$router->route('wishlist', [WishlistController::class, 'index']);
	
	$router->route('admin/login', [DashboardController::class, 'create']);
	$router->route('admin/dashboard', [DashboardController::class, 'index'])->middleware('admin');
	$router->route('admin/logout', [DashboardController::class, 'destroy'])->middleware('admin');
	
	$router->route('admin/product/add-product', [ProductController::class, 'create'])->middleware('admin');
	$router->route('admin/action/product/manage-product', [ProductController::class, 'index'])->middleware('admin');
	$router->route('admin/action/edit/product', [ProductController::class, 'edit'])->middleware('admin');
	$router->route('admin/action/delete/product', [ProductController::class, 'destroy'])->middleware('admin');
	$router->route('admin/brand/add-brand', [BrandController::class, 'create'])->middleware('admin');
	$router->route('admin/brand/manage-brand', [BrandController::class, 'index'])->middleware('admin');
	$router->route('admin/action/edit/brand', [BrandController::class, 'edit'])->middleware('admin');
	$router->route('admin/action/delete/brand', [BrandController::class, 'destroy'])->middleware('admin');
	
	$router->route('admin/show-profile', [AdminController::class, 'index'])->middleware('admin');
	$router->route('admin/edit-profile', [AdminController::class, 'create'])->middleware('admin');

	$router->run();
?>  