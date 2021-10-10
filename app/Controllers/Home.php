<?php
	
	namespace App\Controllers;

	use App\Core\Controller;

	Class Home extends Controller
	{
		public function index()
		{
			view('page/home', [
				'title' => 'Home',
				'class' => explode('\\', get_called_class())[2],
			]);
		}
	}