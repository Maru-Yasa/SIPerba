<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user_id') == false) {
			redirect('auth');
		}
	}
	public function index()
	{
		$this->M_process->redirect();
		$data['title'] = 'SIPerba | Dashboard';
		$data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('user_id')])->row_array();
		$data['countU'] = $this->M_process->countUser();
		$data['countH'] = $this->M_process->countHistory();
		$this->load->view('layout/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('layout/footer');
	}

	public function perhitungan()
	{
		if ($this->session->userdata('role') == 'admin') {
			redirect('home');
		}
		$this->load->view('home/perhitungan');
	}
	public function edit($id)
	{
		$data['hitung'] = $this->db->get_where('history', ['id' => $id])->row_array();
		$this->load->view('home/edit_perhitungan', $data);
	}
	public function profile()
	{
		$data['title'] = 'SIPerba | Profile';
		$data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('user_id')])->row_array();
		$this->load->view('layout/header', $data);
		$this->load->view('home/profile', $data);
		$this->load->view('layout/footer');
	}
	public function update_profile()
	{

		$id = $this->session->userdata('user_id');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$user = $this->db->get_where('users', ['id_user' => $id])->row_array();
		$new_username = htmlspecialchars($this->input->post('username'));
		$new_email = htmlspecialchars($this->input->post('email'));
		if ($new_username == $user['username']) {
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', ['is_unique' => 'This username has already registered!']);
		}
		if ($new_email == $user['email']) {
			$this->form_validation->set_rules('email', 'Email', 'required|trim');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]', ['is_unique' => 'This email has already registered!']);
		}
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Update!!');
			redirect('home/profile');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),
				'username' => htmlspecialchars($this->input->post('username')),
				'email' => htmlspecialchars($this->input->post('email')),
			];
			$where = [
				'id_user' => $id
			];
			$this->db->where($where);
			$query =  $this->db->update('users', $data);
			if (!$query) {
				$this->session->set_flashdata('flash-gagal', 'Di Update');
				redirect('home/profile');
			} else {
				$this->session->set_flashdata('flash', 'Di Updatee');
				redirect('home/profile');
			}
		}
	}
	public function changepassword()
	{
		$data['user'] = $this->db->get_where('users', ['id_user' => $this->session->userdata('user_id')])->row_array();
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[6]');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			redirect('home/profile');
		} else {
			$current_password = htmlspecialchars($this->input->post('current_password'));
			$new_password = htmlspecialchars($this->input->post('new_password'));
			if (!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-error my-3 ">
					<div>
						<span>  Wrong current password!</span>
					</div>
				</div>');
				redirect('/home/profile');
			} else {
				if ($current_password == $new_password) {
					$this->session->set_flashdata('message', '<div class="alert alert-error my-3 ">
					<div>
						<span>   New Password cannot be the same as current password!</span>
					</div>
				</div>');
					redirect('/home/profile');
				} else {
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('id_user', $data['user']['id_user']);
					$this->db->update('users');
					$this->session->set_flashdata('flash', 'Di Update');
					redirect('/home/profile');
				}
			}
		}
	}

	public function setting()
	{
		$this->M_process->redirect();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$data['setting'] = $this->M_process->getSetting();
		if ($this->form_validation->run() == false) {
			$data['title'] = 'SIPerba | Setting';
			$this->load->view('layout/header', $data);
			$this->load->view('home/setting', $data);
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nama_intansi' => htmlspecialchars($this->input->post('nama')),
				'alamat_intansi' => htmlspecialchars($this->input->post('alamat')),
			];
			$where = [
				'id_setting' => 1
			];
			$this->db->where($where);
			$query =  $this->db->update('setting', $data);
			if (!$query) {
				$this->session->set_flashdata('flash-gagal', 'Di Update');
				redirect('home/setting');
			} else {
				$this->session->set_flashdata('flash', 'Di Updatee');
				redirect('home/setting');
			}
		}
	}
	public function edituser($id)
	{
		$data['title'] = 'SIPerba | Edit User';
		$data['user'] = $this->db->get_where('users', ['id_user' => $id])->row_array();
		$this->load->view('layout/header', $data);
		$this->load->view('home/edituser', $data);
		$this->load->view('layout/footer');
	}
	public function updateuser($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$user = $this->db->get_where('users', ['id_user' => $id])->row_array();
		$new_username = htmlspecialchars($this->input->post('username'));
		if ($new_username == $user['username']) {
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', ['is_unique' => 'This username has already registered!']);
		}
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('flash-gagal', 'Di Update');
			redirect('home/users');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),
				'username' => htmlspecialchars($this->input->post('username')),
				'role' => htmlspecialchars($this->input->post('role'))
			];
			$where = [
				'id_user' => $id
			];
			$this->db->where($where);
			$query =  $this->db->update('users', $data);
			if (!$query) {
				$this->session->set_flashdata('flash-gagal', 'Di Update');
				redirect('home/users');
			} else {
				$this->session->set_flashdata('flash', 'Di Updatee');
				redirect('home/users');
			}
		}
	}
	public function reject($id)
	{
		$role = $this->session->userdata('role');
		if ($role == 'engineer') {
			$this->db->set('is_verified_by_engineer', 0);
		} else {
			$this->db->set('is_verified_by_manager', 0);
		}
		$this->db->where('id', $id);
		$query =  $this->db->update('history');
		if ($query) {
			$this->session->set_flashdata('flash-perhitungan', 'Ditolak');
			redirect('home/history');
		}
	}
	public function verify($id)
	{
		$role = $this->session->userdata('role');
		if ($role == 'engineer') {
			$this->db->set('is_verified_by_engineer', 1);
		} else {
			$this->db->set('is_verified_by_manager', 1);
		}
		$this->db->where('id', $id);
		$query =  $this->db->update('history');
		if ($query) {
			$this->session->set_flashdata('flash-perhitungan', 'Terverifikasi');
			redirect('home/history');
		}
	}

	public function users()
	{
		$this->M_process->redirect();
		$data['dataUsers'] = $this->M_process->getUsers();
		$data['title'] = 'SIPerba | Users';
		$this->load->view('layout/header', $data);
		$this->load->view('home/users', $data);
		$this->load->view('layout/footer');
	}
	public function hapus_user($id)
	{
		$this->M_process->redirect();
		if ($this->session->userdata('role') == 'user') {
			redirect('/home/perhitungan');
		}
		$this->db->where(['id_user' => $id]);
		$query = $this->db->delete('users');
		if ($query) {
			$this->session->set_flashdata('flash', 'Di Hapus');
			redirect('/home/users');
		} else {
			$this->session->set_flashdata('flash-gagal', 'Di Hapus');
			redirect('/home/users');
		}
	}
	public function tambahuser()
	{
		$this->M_process->redirect();
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]', ['is_unique' => 'This username has already registered!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('role', 'Role', 'required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'SIPerba | Tambah User';
			$this->load->view('layout/header', $data);
			$this->load->view('home/tambahuser');
			$this->load->view('layout/footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama')),
				'username' => htmlspecialchars($this->input->post('username')),
				'password' => password_hash(htmlspecialchars($this->input->post('password')), PASSWORD_DEFAULT),
				'role' => htmlspecialchars($this->input->post('role')),
				'created' => date("Y-m-d")
			];
			$query =  $this->db->insert('users', $data);
			if ($query) {
				$this->session->set_flashdata('flash', 'Di Tambahkan');
				redirect('home/users');
			} else {
				$this->session->set_flashdata('flash-gagal', 'Di Tambahkan');
				redirect('home/users');
			}
		}
	}

	public function history()
	{
		$data['title'] = 'SIPerba | History';
		$data['riwayat'] = $this->M_process->getHistory();
		$this->load->view('layout/header', $data);
		$this->load->view('home/history', $data);
		$this->load->view('layout/footer');
	}
	public function detailHistory($id)
	{
		$data['title'] = 'SIPerba | History';
		$history = $this->db->get_where('history', ['id' => $id])->row_array();
		$data['history'] = $history;
		$input = [
			'b' => $history['b'],
			'd' => $history['d'],
			'as' => $history['as2'],
			'fy' => $history['fy'],
			"f'c" => $history['fc'],
			"save" => false,
			"update" => false
		];
		$rumus = $this->M_process->detailHistory($input);
		$data['rumus'] = $rumus;

		$this->load->view('layout/header', $data);
		$this->load->view('home/detailHistory', $data);
		$this->load->view('layout/footer');
	}
}
