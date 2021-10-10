<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Banners;
	use App\Models\Pages;

	Class Banner extends Controller
	{
		public function index()
		{
			Sesion::cekBelum();

			$data = (new Banners)->select('banners.*, pages.nama as page')
			->leftJoin('pages', 'banners.page_id', 'pages.id')
			->get();
			$pages = Pages::all();
			
			view('admin/page/banners/index', [
				'title' => 'Halaman',
				'data' => $data,
				'pages' => $pages,
				'navigation' => ['Banner'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Halaman',
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
				$data = array_merge($data, ['foto' => Upload::execute('foto', ['folder' => 'banners/', 'max_size' => 500000000])]);
			}

			$exe = Banners::create($data);

			echo json_encode($exe);
		}

		public function update()
		{
			$data = parent::all();

			// Upload
			if(isset($_FILES['foto']))
			{
				$data = array_merge($data, ['foto' => Upload::execute('foto', ['folder' => 'banners/', 'max_size' => 500000000])]);
			}

			$exe = Banners::update(['id' => $data['id']], $data);

			echo json_encode($exe);
		}

		public function destroy()
		{
			$data = parent::all();

			$exe = Banners::delete(['id' => $data['id']]);

			echo json_encode($exe);
		}
	}