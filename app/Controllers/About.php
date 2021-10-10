<?php
	
	namespace App\Controllers;

	use App\Core\Controller;

	Class About extends Controller
	{
		public function index()
		{
			view('page/about', [
				'title' => 'About us',
				'class' => explode('\\', get_called_class())[2],
			]);
		}
	}