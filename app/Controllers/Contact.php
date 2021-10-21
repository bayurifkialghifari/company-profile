<?php
	
	namespace App\Controllers;

	use App\Core\Controller;

	Class Contact extends Controller
	{
		public function index()
		{
			view('page/contact', [
				'title' => 'Contact',
				'class' => explode('\\', get_called_class())[2],
			]);
		}
	}