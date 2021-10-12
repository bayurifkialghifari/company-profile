<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Sesion;
	use App\Liblaries\Upload;
	use App\Models\Testimonials;

	Class Testimonial extends Controller
	{
		public function index()
		{
			Sesion::cekBelum();

			$data = Testimonials::all();
			
			view('admin/page/testimonials/index', [
				'title' => 'Testimonial',
				'data' => $data,
				'navigation' => ['Testimonial'],
				'breadcrumb_1' => 'Dashboard',
				'breadcrumb_2' => 'Testimonial',
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
				$data = array_merge($data, ['foto' => Upload::execute('foto', ['folder' => 'testimonials/', 'max_size' => 500000000])]);
			}

			$exe = Testimonials::create($data);

			echo json_encode($data);
		}

		public function update()
		{
			$data = parent::post_all();

			// Upload
			if(isset($_FILES['foto']))
			{
				$data = array_merge($data, ['foto' => Upload::execute('foto', ['folder' => 'testimonials/', 'max_size' => 500000000])]);
			}

			$exe = Testimonials::update(['id' => $data['id']], $data);

			echo json_encode($exe);
		}

		public function destroy()
		{
			$data = parent::all();

			$exe = Testimonials::delete(['id' => $data['id']]);

			echo json_encode($exe);
		}
	}