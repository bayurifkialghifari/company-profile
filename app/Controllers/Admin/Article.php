<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Articles;

	Class Article extends Controller
	{
		public function index()
		{
			Sesion::cekBelum();

			$data = Articles::all();
			
			view('admin/page/articles/index', [
				'title' => 'Artikel',
				'data' => $data,
				'navigation' => ['Artikel'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Artikel',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
			]);
		}

		public function add()
		{
			Sesion::cekBelum();

			view('admin/page/articles/add_edit', [
				'title' => 'Tambah Artikel',
				'type' => 'ADD',
				'navigation' => ['Artikel'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Artikel',
				'breadcrumb_3' => 'Tambah',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => base_url . 'admin/article',
				'breadcrumb_3_url' => '#',
			]);	
		}

		public function edit()
		{
			Sesion::cekBelum();

			view('admin/page/articles/add_edit', [
				'title' => 'Edit Artikel',
				'type' => 'EDIT',
				'navigation' => ['Artikel'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Artikel',
				'breadcrumb_3' => 'Tambah',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => base_url . 'admin/article',
				'breadcrumb_3_url' => '#',
			]);	
		}

		public function gets()
		{
			Sesion::cekBelum();

			$id = parent::post('id');
			$data = Articles::find(['id' => $id]);

			echo json_encode($data->fetch_assoc());
		}

		public function create()
		{
			$data = parent::post_all();

			// Upload
			if(isset($_FILES['foto']))
			{
				$data = array_merge($data, ['foto' => Upload::execute('foto', ['folder' => 'banners/', 'max_size' => 500000000])]);
			}

			$data['user_id'] = parent::sess('id');

			$exe = Articles::create($data);

			echo json_encode($exe);
		}

		public function update()
		{
			$data = parent::post_all();

			// Upload
			if(isset($_FILES['foto']))
			{
				$data = array_merge($data, ['foto' => Upload::execute('foto', ['folder' => 'banners/', 'max_size' => 500000000])]);
			}

			$exe = Articles::update(['id' => $data['id']], $data);

			echo json_encode($exe);
		}

		public function destroy()
		{
			$data = parent::all();

			$exe = Articles::delete(['id' => $data['id']]);

			echo json_encode($exe);
		}
	}