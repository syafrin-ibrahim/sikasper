<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aduan_a extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/mod_aduan');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        } else {
            if ($this->session->userdata('role_id') != 1) {
                redirect('auth');
            }
        }
    }

    public function index()
    {

        //redirect('auth');
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $id = $data['user']['user_id'];
        $data['record'] = $this->mod_aduan->select_all()->result();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/aduan/view_admin', $data);
        $this->load->view('admin/template/footer');
    }






    public function aksi_adm()
    {
        if (isset($_POST['submit'])) {

            $idx = $this->input->post('id');
            $this->mod_aduan->update_adm();
            $this->session->set_flashdata('message', '<div class= "alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            Data berhasil Diubah.</div>');
            redirect('admin/aduan_a');
        } else {

            $url = $this->uri->segment(4);

            $data['aduan'] = $this->mod_aduan->select_one($url)->row_array();
            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/navbar', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/aduan/aksi_adm', $data);
            $this->load->view('admin/template/footer');
        }
    }
}
