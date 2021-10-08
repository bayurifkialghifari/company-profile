<?php
	
	namespace App\Controllers\Admin;

	use App\Core\Controller;
	use App\Liblaries\Auth as Auths;
	use App\Liblaries\Sesion;

	Class Auth extends Controller
	{
		/**
		* Load View Login
		*/
		public function index()
		{
			Sesion::cekLogin();

			view('admin/auth/login');
		}

		/**
		* Login Proses
		*/
		public function login()
		{
			Sesion::cekLogin();

			// Post data
			$email = parent::post('email');
			$password = parent::post('password');

			// Auth
			Auths::table('users');
			Auths::user_field('email');
			Auths::password_field('password');
			
			// Execute Auth
			$exe = Auths::login($email, $password);

			echo json_encode($exe);
		}

		/**
		* Logout Proses
		*/
		public function logout()
		{
			Sesion::cekLogin();
			
			Auths::logout();

			redirect(base_url);
		}
	}