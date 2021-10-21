<?php
	
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Portofolios;
	use App\Models\Testimonials;
	use App\Models\Articles;

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
			$articels = (new Articles)->select('*')
			->orderBy('id', 'desc')
			->limit(3)
			->get();
			view('page/home', [
				'title' => 'Home',
				'class' => explode('\\', get_called_class())[2],
				'portofolios' => $portofolios,
				'testimonials' => $testimonials,
				'articels' => $articels,
			]);
		}
	}