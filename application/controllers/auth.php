<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {

            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            $email = $this->input->post('email');
            $pass = $this->input->post('password');

            $user = $this->db->get_where('users', ['email' => $email])->row_array();

            if ($user) {
                if ($user['is_active'] == 1) {
                    if (password_verify($pass, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'role_id' => $user['role_id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('admin/home');
                    } else {
                        $this->session->set_flashdata('message', '<div class= "alert alert-danger alert-dismissi ble">
                        <button typ e="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa- check"></i> Alert!</h5>
                        Password Salah</div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class= "alert alert-danger alert-dismissi ble">
                    <button typ e="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa- check"></i> Alert!</h5>
                    Email Belum aktivasi</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class= "alert alert-danger alert-dismissi ble">
                <button typ e="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                Email Tidak Terdaftar</div>');
                redirect('auth');
            }
        }
    }



    public function regis()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[users.email]',
            [
                'is_unique' => 'this email has been registered'
            ]
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[8]|matches[c_password]',
            ['matches' => 'password not matches', 'min_length' => 'paasword too short']
        );
        $this->form_validation->set_rules('c_password', 'Password2', 'required|min_length[8]|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['title'] = " data registras i";
            $this->load->view('auth/header');
            $this->load->view('auth/regis', $data);
            $this->load->view('auth/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars(($this->input->post('nama', true))),
                'email' => htmlspecialchars(($this->input->post('email', true))),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image' => 'default-image.jpg',
                'role_id' => 2,
                'is_active' => 1,
                'created_at' => date('Y-m-d')
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('message', '<div class= "alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Anda Berhasil Registrasi.</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class= "alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        Anda Berhasil Logout.</div>');
        redirect('auth');
    }
}
