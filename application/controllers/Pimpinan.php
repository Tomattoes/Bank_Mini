<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Data_model', 'data');
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Teller_model', 'teller');
    }

    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Dashboard';
        $data['h2'] = 'Dashboard';

        $data['user'] = $this->data->totalUser();
        $data['teller'] = $this->data->totalTeller();
        $data['cs'] = $this->data->totalCs();
        $data['setoran'] = $this->teller->totalSetoran();
        $data['penarikan'] = $this->teller->totalPenarikan();
        $data['saldo'] = $this->data->tabungan();

        $this->load->view('pimpinan/header', $data);
        $this->load->view('pimpinan/content', $data);
        $this->load->view('pimpinan/footer');
    }

     // Menu 
     public function ajuan()
     {
         $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
 
         $data['title'] = 'NJE Bank';
         $data['brand'] = 'Neo Java Era Bank';
         $data['h1'] = 'Tabel Data Ajuan Permintaan';
         $data['h2'] = 'Menu / Ajuan Permintaan';
         $data['ht'] = 'Tabel Ajuan Permintaan';
         $data['m1'] = 'Tambah Ajuan Permintaan';
         $data['m2'] = 'Edit Ajuan Permintaan';
         $data['t'] = 'Ajuan Permintaan';
 
         $data['kelas1'] = $this->data->getKelas1();
         $data['jurusan'] = $this->data->getJurusan1();
         $data['pengguna1'] = $this->admin->pengguna();
 
         $this->load->view('pimpinan/header', $data);
         $this->load->view('pimpinan/t_ajuan', $data);
         $this->load->view('pimpinan/footer');
     }

     // User 
     public function teller()
     {
         $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
 
         $data['title'] = 'NJE Bank';
         $data['brand'] = 'Neo Java Era Bank';
         $data['h1'] = 'Tabel Data Teller';
         $data['h2'] = 'Menu / Teller';
         $data['ht'] = 'Tabel Teller';
 
         $data['teller'] = $this->data->getTeller();
 
         $this->load->view('pimpinan/header', $data);
         $this->load->view('pimpinan/t_teller', $data);
         $this->load->view('pimpinan/footer');
     }

     public function cs()
     {
         $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();
 
         $data['title'] = 'NJE Bank';
         $data['brand'] = 'Neo Java Era Bank';
         $data['h1'] = 'Tabel Data Customer Service';
         $data['h2'] = 'Menu / Customer Service';
         $data['ht'] = 'Tabel Customer Service';
 
         $data['cs'] = $this->data->getCs();
 
         $this->load->view('pimpinan/header', $data);
         $this->load->view('pimpinan/t_cs', $data);
         $this->load->view('pimpinan/footer');
     }
}