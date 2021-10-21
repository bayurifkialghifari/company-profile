<?php
	
	namespace App\Controllers;

	use App\Core\Controller;
	use App\Models\Articles;

	Class Article extends Controller
	{
		public function index()
		{
			$articels = (new Articles)->select('*')
			->orderBy('id', 'desc')
			->get();

			view('page/article', [
				'title' => 'About us',
				'class' => explode('\\', get_called_class())[2],
				'articels' => $articels,
			]);
		}
	}