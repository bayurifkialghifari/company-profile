<?php

	use App\Core\Route;
	use App\Models\Pages;

	$pages = Pages::all();

	$app 			= new Route;

	// Router
	foreach($pages as $p)
	{
		$app->add($p['url'], $p['controller'], $p['functions'], $p['methods']);
	}
	
	/**
	* Admin
	**/ 
		// Auth
		$app->add('/admin', '\Admin\Auth');
		$app->add('/auth', '\Admin\Auth', 'login', 'post');
		$app->add('/logout', '\Admin\Auth', 'logout');

		// Dashboard
		$app->add('/admin/dashboard', '\Admin\Dashboard');
		// Banner
		$app->add('/admin/banner', '\Admin\Banner');
		$app->add('/admin/banner/create', '\Admin\Banner', 'create', 'post');
		$app->add('/admin/banner/update', '\Admin\Banner', 'update', 'post');
		$app->add('/admin/banner/delete', '\Admin\Banner', 'destroy', 'delete');
		// Article
		$app->add('/admin/article', '\Admin\Article');
		$app->add('/admin/article/get', '\Admin\Article', 'gets', 'post');
		$app->add('/admin/article/add', '\Admin\Article', 'add');
		$app->add('/admin/article/edit', '\Admin\Article', 'edit');
		$app->add('/admin/article/create', '\Admin\Article', 'create', 'post');
		$app->add('/admin/article/update', '\Admin\Article', 'update', 'post');
		$app->add('/admin/article/delete', '\Admin\Article', 'destroy', 'delete');
		// Testimonial
		$app->add('/admin/testimonial', '\Admin\Testimonial');
		$app->add('/admin/testimonial/create', '\Admin\Testimonial', 'create', 'post');
		$app->add('/admin/testimonial/update', '\Admin\Testimonial', 'update', 'post');
		$app->add('/admin/testimonial/delete', '\Admin\Testimonial', 'destroy', 'delete');
		// Portofolio
		$app->add('/admin/portofolio', '\Admin\Portofolio');
		$app->add('/admin/portofolio/create', '\Admin\Portofolio', 'create', 'post');
		$app->add('/admin/portofolio/update', '\Admin\Portofolio', 'update', 'post');
		$app->add('/admin/portofolio/delete', '\Admin\Portofolio', 'destroy', 'delete');
		// Website
		$app->add('/admin/website', '\Admin\Website');
		$app->add('/admin/website/create', '\Admin\Website', 'create', 'post');
		$app->add('/admin/website/update', '\Admin\Website', 'update', 'put');
		// Pages
		$app->add('/admin/pages', '\Admin\Page');
		$app->add('/admin/pages/create', '\Admin\Page', 'create', 'post');
		$app->add('/admin/pages/update', '\Admin\Page', 'update', 'put');
		$app->add('/admin/pages/delete', '\Admin\Page', 'destroy', 'delete');
		// Meta
		$app->add('/admin/metas', '\Admin\Meta');
		$app->add('/admin/metas/create', '\Admin\Meta', 'create', 'post');
		$app->add('/admin/metas/update', '\Admin\Meta', 'update', 'put');
		$app->add('/admin/metas/delete', '\Admin\Meta', 'destroy', 'delete');
	/**
	* # Admin
	**/
		
	$app->run('/');
