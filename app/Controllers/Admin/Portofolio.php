<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Portofolios;

	Class Portofolio extends Controller
	{
		public function index()
		{
			Sesion::cekBelum();

			$data = Portofolios::all();
			
			view('admin/page/portofolios/index', [
				'title' => 'Halaman',
				'data' => $data,
				'navigation' => ['Portofolio'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Portofolios',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
			]);
		}

		public function create()
		{
			$data = parent::post_all();

			// Upload
			if(isset($_FILES['foto']))
			{
				$data = array_merge($data, ['foto' => Upload::execute('foto', ['folder' => 'portofolios/', 'max_size' => 500000000])]);
			}

			$exe = Portofolios::create($data);

			echo json_encode($data);
		}

		public function update()
		{
			$data = parent::post_all();

			// Upload
			if(isset($_FILES['foto']))
			{
				$data = array_merge($data, ['foto' => Upload::execute('foto', ['folder' => 'portofolios/', 'max_size' => 500000000])]);
			}

			$exe = Portofolios::update(['id' => $data['id']], $data);

			echo json_encode($exe);
		}

		public function destroy()
		{
			$data = parent::all();

			$exe = Portofolios::delete(['id' => $data['id']]);

			echo json_encode($exe);
		}
	}