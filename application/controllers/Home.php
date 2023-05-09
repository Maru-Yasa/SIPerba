<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->view('home/index');
    }
    public function hitung()
    {
        date_default_timezone_set('Asia/Jakarta');
        $this->form_validation->set_rules('balok', 'Balok', 'required');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required');
        $this->form_validation->set_rules('luas', 'Luas', 'required');
        $this->form_validation->set_rules('kekuatan', 'Kekuatan', 'required');
        $this->form_validation->set_rules('mutu', 'Mutu', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('hasil', 'Data yang anda masukkan salah');
            redirect('/');
        } else {
            $b = htmlspecialchars($this->input->post('balok'));
            $d = htmlspecialchars($this->input->post('tinggi'));
            $as = htmlspecialchars($this->input->post('luas'));
            $fc = htmlspecialchars($this->input->post('kekuatan'));
            $fy = htmlspecialchars($this->input->post('mutu'));
            $query = $this->M_process->hitung($b, $d, $as, $fc, $fy);
            $this->session->set_flashdata('hasil', $query);
            redirect('/');
        }
    }
    public function history()
    {
        $data['riwayat'] = $this->M_process->getHistory();
        $this->load->view('home/history', $data);
    }
}
