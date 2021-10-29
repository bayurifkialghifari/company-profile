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
				'title' => 'Article',
				'class' => explode('\\', get_called_class())[2],
				'articels' => $articels,
			]);
		}

		public function detail($param)
		{
			$param = explode('|', $param);
			$articels = (new Articles)->select('*')
			->where('id', $param[1])
			->get();

			view('page/article-detail', [
				'title' => 'Article',
				'class' => explode('\\', get_called_class())[2],
				'articels' => $articels->fetch_assoc(),
			]);
		}
	}