<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Peta Desa Kuwasen | Home',
			'site' => $this->site
		];
		return view('index', $data);
	}

	public function index2()
	{
		$data = [
			'title' => 'Peta Desa Kuwasen | Home',
			'site' => $this->site
		];
		return view('index2', $data);
	}
}
