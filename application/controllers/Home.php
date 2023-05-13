<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('home/index');
    }
	
    public function history()
    {
        $data['riwayat'] = $this->M_process->getHistory();
        $this->load->view('home/history', $data);
    }
}
