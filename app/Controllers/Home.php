<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('auth/login');
	}

	public function register()
	{
		return view('auth/register');
	}

	public function user()
	{
		$data['header'] = false;
		return view('user/index', $data);
	}

	public function maintenance()
	{
		$data['header'] = false;
		$data['bottom'] = false;
		return view('user/maintenance', $data);
	}
}
