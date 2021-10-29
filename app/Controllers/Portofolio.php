<?php
	
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Portofolios;

	Class Portofolio extends Controller
	{
		public function index()
		{
			$portofolios = (new Portofolios)->select('*')
			->orderBy('id', 'desc')
			->get();

			view('page/portofolio', [
				'title' => 'Portofolio',
				'class' => explode('\\', get_called_class())[2],
				'portofolios' => $portofolios->fetch_assoc(),
			]);
		}
	}