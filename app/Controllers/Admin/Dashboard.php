<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;

	Class Dashboard extends Controller
	{
		public function index()
		{
			Sesion::cekBelum();
			
			view('admin/page/dashboard', [
				'title' => 'Dashboard',
				'navigation' => ['Dashboard'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_1_url' => '#',
			]);
		}
	}