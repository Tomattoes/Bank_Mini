<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Data_model', 'data');
        $this->load->model('Teller_model', 'teller');
    }

    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // judul website
        $data['title'] = 'NJE Bank';
        // judul brand
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Dashboard';
        $data['h2'] = 'Dashboard';

        $data['user'] = $this->data->totalUser();
        $data['setoran'] = $this->teller->totalSetoran();
        $data['penarikan'] = $this->teller->totalPenarikan();
        $data['saldo'] = $this->data->tabungan();
        
        $this->load->view('teller/header', $data);
        $this->load->view('teller/content', $data);
        $this->load->view('teller/footer');
    }

    // Menu Transaksi - Setoran
    public function setoran()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // judul website
        $data['title'] = 'NJE Bank';
        // judul brand
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Setoran';
        $data['h2'] = 'Menu Transaksi / Setoran';
        $data['ht'] = 'Setoran / Tabungan';

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['tabungan'] = $this->teller->tabungan();
        $data['totalSetoran'] = $this->teller->totalSetoran();

        $this->load->view('teller/header', $data);
        $this->load->view('teller/tb_setoran', $data);
        $this->load->view('teller/footer');
    }

    public function addSetoran()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // judul website
        $data['title'] = 'NJE Bank';
        // judul brand
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Setoran';
        $data['h2'] = 'Menu Transaksi / Setoran';
        $data['ht'] = 'Input Setoran / Tabungan';

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['siswa'] = $this->teller->siswa();

        $this->form_validation->set_rules('setor', 'Setoran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teller/header', $data);
            $this->load->view('teller/t_setoran', $data);
            $this->load->view('teller/footer');
        } else {
            $this->teller->addSetoran();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan</div>');
            redirect('teller/setoran');
        }
    }

    public function editSetoran($id)
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // judul website
        $data['title'] = 'NJE Bank';
        // judul brand
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Setoran';
        $data['h2'] = 'Menu Transaksi / Setoran';
        $data['ht'] = 'Edit Setoran / Tabungan';

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['siswa'] = $this->teller->siswa();
        $data['tabungan'] = $this->teller->tabunganById($id);

        $this->form_validation->set_rules('setor', 'Setoran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teller/header', $data);
            $this->load->view('teller/edit_setoran', $data);
            $this->load->view('teller/footer');
        } else {
            $this->teller->editSetoran();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan</div>');
            redirect('teller/setoran');
        }
    }

    public function hapusSetoran($id)
    {
        $this->teller->hapusSetoran($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('teller/setoran');
    }


    // Menu Transaksi - Penarikan
    public function penarikan()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // judul website
        $data['title'] = 'NJE Bank';
        // judul brand
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Penarikan';
        $data['h2'] = 'Menu Transaksi / Penarikan';
        $data['ht'] = 'Penarikan';

        $data['penarikan'] = $this->teller->penarikan();
        $data['totalPenarikan'] = $this->teller->totalPenarikan();

        $this->load->view('teller/header', $data);
        $this->load->view('teller/tb_penarikan', $data);
        $this->load->view('teller/footer');
    }

    public function addPenarikan()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // judul website
        $data['title'] = 'NJE Bank';
        // judul brand
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Penarikan';
        $data['h2'] = 'Menu Transaksi / Penarikan';
        $data['ht'] = 'Input Penarikan';

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['siswa'] = $this->teller->siswa();

        $this->form_validation->set_rules('setor', 'Setoran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teller/header', $data);
            $this->load->view('teller/t_penarikan', $data);
            $this->load->view('teller/footer');
        } else {
            $this->teller->addPenarikan();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan</div>');
            redirect('teller/penarikan');
        }
    }

    public function editPenarikan($id)
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

         // judul website
         $data['title'] = 'NJE Bank';
         // judul brand
         $data['brand'] = 'Neo Java Era Bank';
         $data['h1'] = 'Penarikan';
         $data['h2'] = 'Menu Transaksi / Penarikan';
         $data['ht'] = 'Edit Penarikan';

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['siswa'] = $this->teller->siswa();
        $data['tabungan'] = $this->teller->tabunganById($id);

        $this->form_validation->set_rules('setor', 'Setoran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('teller/header', $data);
            $this->load->view('teller/edit_penarikan', $data);
            $this->load->view('teller/footer');
        } else {
            $this->teller->editPenarikan();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil ditambahkan</div>');
            redirect('teller/penarikan');
        }
    }

    public function hapusPenarikan($id)
    {
        $this->teller->hapusPenarikan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('teller/penarikan');
    }

    // Saldo
    public function infoSaldo()
    {
        $data = $this->teller->saldo();

        if ($data) {
            $json_data = json_encode($data);
            echo $json_data;
        }
    }

    // Data Menu - User
    public function user()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // judul website
        $data['title'] = 'NJE Bank';
        // judul brand
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'User';
        $data['h2'] = 'Data Menu / User';
        $data['ht'] = 'Data User';

        $data['tabungan'] = $this->teller->tabungan1();
        $data['user'] = $this->teller->totalUser();

        $this->load->view('teller/header', $data);
        $this->load->view('teller/tb_user', $data);
        $this->load->view('teller/footer');
    }

    // Data Menu - Rekap
    public function rekap()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        // judul website
        $data['title'] = 'NJE Bank';
        // judul brand
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Rekap';
        $data['h2'] = 'Data Menu / Rekap';
        $data['ht1'] = 'Data Rekap Setoran';
        $data['ht2'] = 'Data Rekap Penarikan';

        $data['rekap'] = $this->teller->rekap();
        $data['rekap1'] = $this->teller->rekap1();

        $this->load->view('teller/header', $data);
        $this->load->view('teller/tb_rekap', $data);
        $this->load->view('teller/footer');
    }
}
