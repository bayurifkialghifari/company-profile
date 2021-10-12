<?php
	
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Portofolios;
	use App\Models\Testimonials;

	Class Home extends Controller
	{
		public function index()
		{
			$portofolios = (new Portofolios)->select('*')
			->orderBy('id', 'desc')
			->limit(4)
			->get();
			$testimonials = (new Testimonials)->select('*')
			->orderBy('id', 'desc')
			->limit(4)
			->get();
			view('page/home', [
				'title' => 'Home',
				'class' => explode('\\', get_called_class())[2],
				'portofolios' => $portofolios,
				'testimonials' => $testimonials,
			]);
		}
	}