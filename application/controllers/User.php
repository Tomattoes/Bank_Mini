<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Data_model', 'data');
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['j'] = 'MW Bank | Home';

        $id = $this->session->userdata('id_pengguna');

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['tabungan'] = $this->user->tabungan($id);
        $data['tabungan1'] = $this->user->tabungan1($id);
        $data['kredit'] = $this->user->kredit($id);
        $data['tbg'] = $this->user->tabunganById($id);

        // $this->load->view('user/header', $data);
        // $this->load->view('user/dashboard', $data);
        // $this->load->view('user/footer');
        $this->load->view('user/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('user/footer');

    }

    public function profile()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['j'] = 'MW Bank | Home';

        $id = $this->session->userdata('id_pengguna');

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['kj'] = $this->user->kj($id);

        // $this->load->view('user/header', $data);
        // $this->load->view('user/dashboard', $data);
        // $this->load->view('user/footer');
        $this->load->view('user/header', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('user/footer', $data);

    }
}