<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Models\Meta_datas;
	use App\Models\Pages;

	Class Meta extends Controller
	{
		public function index()
		{
			Sesion::cekBelum();

			$data = (new Meta_datas)->select('meta_datas.*, pages.nama as page')
			->leftJoin('pages', 'meta_datas.page_id', 'pages.id')
			->get();
			$pages = Pages::all();
			
			view('admin/page/metas/index', [
				'title' => 'Meta data',
				'data' => $data,
				'pages' => $pages,
				'navigation' => ['Pengaturan'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Meta',
				'breadcrumb_1_url' => base_url . 'admin/dashboard',
				'breadcrumb_2_url' => '#',
			]);
		}

		public function create()
		{
			$data = parent::all();

			$exe = Meta_datas::create($data);

			echo json_encode($data);
		}

		public function update()
		{
			$data = parent::all();

			$exe = Meta_datas::update(['id' => $data['id']], $data);

			echo json_encode($exe);
		}

		public function destroy()
		{
			$data = parent::all();

			$exe = Meta_datas::delete(['id' => $data['id']]);

			echo json_encode($exe);
		}
	}