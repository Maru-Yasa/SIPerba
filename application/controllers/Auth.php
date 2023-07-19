<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('user_id')) {
            redirect('/');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));
        $user = $this->db->get_where('users', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'user_id' => $user['id_user'],
                    'role' => $user['role'],
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 'manager' || 'engineer') {
                    redirect('/');
                } else {
                    redirect('home/perhitungan');
                }
            } else {
                $this->session->set_flashdata('message', '<<div class="alert alert-error my-3 ">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Wrong Password!!</span>
            </div>
        </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-error my-3 ">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Username is not regitered!</span>
            </div>
        </div>');
            redirect('auth');
        }
    }
    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/forgot_password');
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $user = $this->db->get_where('users', ['email' => $email])->row_array();
            if ($user) {
                $token = random_string('alnum', 32);
                $this->db->set('token', $token);
                $this->db->where('email', $email);
                $this->db->update('users', $data);
                $this->M_process->sendEmail($email, $token);
                $this->session->set_flashdata('message', '<div class="alert alert-success my-3 ">
                <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                    <span>Reset password link sent. Check your email.</span>
                </div>
            </div>');
                redirect('auth');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-error my-3 ">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Email is not regitered!</span>
                </div>
            </div>');
                redirect('auth/forgot_password');
            }
        }
    }
    public function reset_password($token)
    {
        $user = $this->db->get_where('users', ['token' => $token])->row_array();
        if (!$user) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['token'] = $token;
            $this->load->view('auth/reset_password', $data);
        } else {
            $new_password = htmlspecialchars($this->input->post('password1'));
            $data = [
                'token' => null,
                'password' =>  password_hash($new_password, PASSWORD_DEFAULT)
            ];
            $this->db->where('token', $token);
            $this->db->update('users', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success my-3 ">
            <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
                <span>Password reset successful. Please login now.</span>
            </div>
        </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-success my-3 ">
        <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
            <span> You have been logged out!</span>
        </div>
    </div>');
        redirect('auth');
    }
}
