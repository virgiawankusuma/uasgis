<?php

namespace App\Controllers;

use App\Models\M_batas;
use App\Models\M_jalan;
use App\Models\M_fasilitas;

class Home extends BaseController
{
	protected $M_batas;
	protected $M_jalan;
	protected $M_fasilitas;
	public function __construct()
	{
		$this->M_batas = new M_batas();
		$this->M_jalan = new M_jalan();
		$this->M_fasilitas = new M_fasilitas();
	}

	public function index()
	{
		$data = [
			'title' => 'Peta Desa Kuwasen | Home',
			'site' => $this->site,
			'vb' => $this->vb,
			'neighborhood_associations' => $this->M_batas->findAll(),
			'roads' => $this->M_jalan->findAll(),
			'facilities' => $this->M_fasilitas->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('index', $data);
	}

	public function rt()
	{
		$data = [
			'title' => 'Batas RT | Home',
			'site' => $this->site,
			'vb' => $this->vb,
			'neighborhood_associations' => $this->M_batas->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('rt', $data);
	}

	public function jalan()
	{
		// dd($this->M_jalan->findAll());
		$data = [
			'title' => 'Jalan desa | Home',
			'site' => $this->site,
			'vb' => $this->vb,
			'roads' => $this->M_jalan->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('jalan', $data);
	}

	public function fasilitas()
	{
		$data = [
			'title' => 'Fasilitas umum desa | Home',
			'site' => $this->site,
			'vb' => $this->vb,
			'facilities' => $this->M_fasilitas->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('fasilitas', $data);
	}

	public function cari()
	{
		$keyword = $this->request->getVar('keyword');
		// dd($this->M_fasilitas->search($keyword)->findAll());	
		$data = [
			'title' => 'Peta Desa Kuwasen | Home',
			'site' => $this->site,
			'keyword' => $keyword,
			'vb' => $this->vb,
			'neighborhood_associations' => $this->M_batas->search($keyword)->findAll(),
			'roads' => $this->M_jalan->search($keyword)->findAll(),
			'facilities' => $this->M_fasilitas->search($keyword)->findAll(),
			'getsegment' => $this->request->uri->getSegment(1)
		];
		return view('cari', $data);
	}
}
