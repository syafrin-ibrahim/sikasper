<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aduan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/mod_aduan');

        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        //  $data['aduan'] = $this->mod_aduan->select_all()->result();
        //$data['kec'] = $this->db->get('kecamatan')->result();
        //$data['kateg'] = $this->db->get('kategori_aduan')->result();
        $data['record'] = $this->mod_aduan->select_all()->result();
        $this->load->view('admin/template/header', $data);
        $this->load->view('admin/template/navbar', $data);
        $this->load->view('admin/template/sidebar', $data);
        $this->load->view('admin/aduan/view', $data);
        $this->load->view('admin/template/footer');
    }

    function create()
    {
        if (isset($_POST['submit'])) {
            $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
            $this->form_validation->set_rules('telp', 'Telp', 'required|trim');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
            $this->form_validation->set_rules('jenis', 'Jenis Aduan', 'required|trim');
            $this->form_validation->set_rules('kec', 'Kecamatan', 'required|trim');
            $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');


            if ($this->form_validation->run() == false) {
                $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
                $data['kec'] = $this->db->get('kecamatan')->result();
                $data['kateg'] = $this->db->get('kategori_aduan')->result();
                $this->load->view('admin/template/header', $data);
                $this->load->view('admin/template/navbar', $data);
                $this->load->view('admin/template/sidebar', $data);
                $this->load->view('admin/aduan/create', $data);
                $this->load->view('admin/template/footer');
            } else {

                $this->mod_aduan->simpan();
                $this->session->set_flashdata('message', '<div class= "alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                Data berhasil Disimpan.</div>');
                redirect('admin/aduan');
            }
        } else {
            // $data['parent'] =  $this->mod_member->select_parent()->result();
            //$this->template->load('templateadmin', 'admin/member/post', $data);
            $data['kec'] = $this->db->get('kecamatan')->result();
            $data['kateg'] = $this->db->get('kategori_aduan')->result();
            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/template/header', $data);
            $this->load->view('admin/template/navbar', $data);
            $this->load->view('admin/template/sidebar', $data);
            $this->load->view('admin/aduan/create', $data);
            $this->load->view('admin/template/footer');
        }
    }
}
