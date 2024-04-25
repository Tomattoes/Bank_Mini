<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Data_model', 'data');
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Dashboard';
        $data['h2'] = 'Dashboard';

        $data['user'] = $this->data->totalUser();

        $this->load->view('Cs/header', $data);
        $this->load->view('Cs/content', $data);
        $this->load->view('Cs/footer', $data);
    }

    // User 
    public function data_user()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Tabel Data User';
        $data['h2'] = 'Management User / Member';
        $data['ht'] = 'Tabel Data Member';
        $data['m1'] = 'Tambah Data Member';
        $data['m2'] = 'Edit Data Member';
        $data['t'] = 'Member';

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['pengguna1'] = $this->admin->pengguna();

        $this->load->view('Cs/header', $data);
        $this->load->view('Cs/t_user', $data);
        $this->load->view('Cs/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required|is_unique[pengguna.id_pengguna]', [
            'is_unique' => 'NIS ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('nm_lengkap', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
            'is_unique' => 'Alamat Email ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('nm_ortu', 'Nama Orang Tua', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Cs/data_user');
        } else {
            $data = array(
                "id_pengguna" => $this->input->post('nis'),
                "nm_pg" => $this->input->post('nm_lengkap'),
                "email" => $this->input->post('email'),
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                "kelas_id" => $this->input->post('kelas'),
                "jurusan_id" => $this->input->post('jurusan'),
                "nm_ortu" => $this->input->post('nm_ortu'),
                "no_hp" => $this->input->post('no_hp'),
                "alamat" => $this->input->post('alamat'),
                'no_rek' => random_string('numeric', '8'),
                "role_id" => 2,
                "is_active" => 1,
                "date_created" => time()
            );
            $this->db->insert('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Cs/data_user');
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('nm_lengkap', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nm_ortu', 'Nama Orang Tua', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('cs/data_user');
        } else {
            $data = [
                "nm_pg" => $this->input->post('nm_lengkap'),
                "kelas_id" => $this->input->post('kelas'),
                "jurusan_id" => $this->input->post('jurusan'),
                "nm_ortu" => $this->input->post('nm_ortu'),
                "no_hp" => $this->input->post('no_hp'),
                "alamat" => $this->input->post('alamat')
            ];
            $this->db->where('id_pengguna', $this->input->post('nis'));
            $this->db->update('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Cs/data_user');
        }
    }

    public function hapus($id)
    {
        $this->admin->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('Cs/data_user');
    }
}