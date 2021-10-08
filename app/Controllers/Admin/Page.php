<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Pages;

	Class Page extends Controller
	{
		public function index()
		{
			Sesion::cekBelum();

			$data = Pages::all();
			
			view('admin/page/pages/index', [
				'title' => 'Halaman',
				'data' => $data,
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Halaman',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
			]);
		}

		public function create()
		{
			$data = parent::all();

			$exe = Pages::create($data);

			echo json_encode($data);
		}

		public function update()
		{
			$data = parent::all();

			$exe = Pages::update(['id' => $data['id']], $data);

			echo json_encode($exe);
		}

		public function destroy()
		{
			$data = parent::all();

			$exe = Pages::delete(['id' => $data['id']]);

			echo json_encode($exe);
		}
	}