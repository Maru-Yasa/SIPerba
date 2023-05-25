<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('home/index');
    }
	
	public function perhitungan()
	{
		$this->load->view('home/perhitungan');
	}

	public function profile()
	{
		$this->load->view('home/profile');
	}

	public function setting()
	{
		$this->load->view('home/setting');
	}

    public function history()
    {
        $data['riwayat'] = $this->M_process->getHistory();
        $this->load->view('home/history', $data);
    }
}
