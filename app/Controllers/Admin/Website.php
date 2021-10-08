<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Websites;

	Class Website extends Controller
	{
		public function index()
		{
			Sesion::cekBelum();

			$data = Websites::all();
			
			view('admin/page/website/index', [
				'title' => 'Website',
				'data' => $data,
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Website',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
			]);
		}

		public function create()
		{
			$data = parent::all();

			$exe = Websites::create($data);

			echo json_encode($data);
		}

		public function update()
		{
			$data = parent::all();

			$exe = Websites::update(['id' => $data['id']], $data);

			echo json_encode($exe);
		}
	}