<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['pimpinan'] = $this->data->totalPimpinan();
        $data['kelas'] = $this->data->totalKelas();
        $data['jurusan'] = $this->data->totalJurusan();
        $data['setoran'] = $this->teller->totalSetoran();
        $data['penarikan'] = $this->teller->totalPenarikan();
        $data['saldo'] = $this->data->tabungan();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/content', $data);
        $this->load->view('admin/footer');
    }

    // Management User - User / START
    public function data_user()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Tabel Data User';
        $data['h2'] = 'Management User / User';
        $data['ht'] = 'Tabel Data User';
        $data['m1'] = 'Tambah Data User';
        $data['m2'] = 'Edit Data User';
        $data['t'] = 'User';

        $data['kelas1'] = $this->data->getKelas1();
        $data['jurusan'] = $this->data->getJurusan1();
        $data['pengguna1'] = $this->admin->pengguna();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/t_user', $data);
        $this->load->view('admin/footer');
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
            redirect('admin/data_user');
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
            redirect('admin/data_user');
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
            redirect('Admin/data_user');
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
            redirect('Admin/data_user');
        }
    }

    public function hapus($id)
    {
        $this->admin->hapus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('Admin/data_user');
    }
    // Management User - User / END


    // Master Data - Kelas / START
    public function kelas()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Tabel Data Kelas';
        $data['h2'] = 'Master Data / Kelas';
        $data['ht'] = 'Tabel Data Kelas';
        $data['m1'] = 'Tambah Data Kelas';
        $data['m2'] = 'Edit Data Kelas';
        $data['t'] = 'Kelas';

        $data['kelas1'] = $this->data->getKelas1();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/t_kelas', $data);
        $this->load->view('admin/footer');
    }

    public function addKelas()
    {
        $this->form_validation->set_rules('id_kelas', 'ID', 'required|is_unique[kelas.id_kelas]', [
            'is_unique' => 'ID ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('nm_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/kelas');
        } else {
            $data = array(
                "id_kelas" => $_POST['id_kelas'],
                "nm_kelas" => $_POST['nm_kelas']
            );
            $this->db->insert('kelas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/kelas');
        }
    }

    public function editKelas()
    {
        $this->form_validation->set_rules('nm_kelas', 'Nama Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/kelas');
        } else {
            $data = [
                "nm_kelas" => $_POST['nm_kelas']
            ];
            $this->db->where('id_kelas',  $_POST['id']);
            $this->db->update('kelas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/kelas');
        }
    }

    public function hapusKelas($id)
    {
        $this->admin->hapusKelas($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('Admin/kelas');
    }
    // Master Data - Kelas / END


    // Master Data - Jurusan / START
    public function jurusan()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Tabel Data Jurusan';
        $data['h2'] = 'Master Datan / Jurusan';
        $data['ht'] = 'Tabel Data Jurusan';
        $data['m1'] = 'Tambah Data Jurusan';
        $data['m2'] = 'Edit Data Jurusan';
        $data['t'] = 'Jurusan';

        $data['jurusan'] = $this->data->getjurusan1();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/t_jurusan', $data);
        $this->load->view('admin/footer');
    }

    public function addJurusan()
    {
        $this->form_validation->set_rules('id_jurusan', 'ID', 'required|is_unique[jurusan.id_jurusan]', [
            'is_unique' => 'ID ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('nm_jurusan', 'Nama jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/jurusan');
        } else {
            $data = array(
                "id_jurusan" => $_POST['id_jurusan'],
                "nm_jurusan" => $_POST['nm_jurusan']
            );
            $this->db->insert('jurusan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/jurusan');
        }
    }

    public function editJurusan()
    {
        $this->form_validation->set_rules('nm_jurusan', 'Nama Jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/jurusan');
        } else {
            $data = [
                "nm_jurusan" => $_POST['nm_jurusan']
            ];
            $this->db->where('id_jurusan',  $_POST['id']);
            $this->db->update('jurusan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/jurusan');
        }
    }

    public function hapusJurusan($id)
    {
        $this->admin->hapusJurusan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('Admin/jurusan');
    }
    // Master Data - Jurusan / END


    // Master Data - Tahun Ajaran / START
    public function TahunAjaran()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['j'] = 'MW Bank | Tahun Ajaran';
        $data['judul'] = 'Tabel Jurusan';
        $data['judul1'] = 'Tabel Data Jurusan';
        $data['judul2'] = 'Master Data / Jurusan';
        $data['judulTabel'] = 'Tabel Jurusan';
        $data['jurusan'] = $this->data->getjurusan();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/t_jurusan', $data);
        $this->load->view('admin/footer');
    }

    public function addTA()
    {
        $this->form_validation->set_rules('id_jurusan', 'ID', 'required|is_unique[jurusan.id_jurusan]', [
            'is_unique' => 'ID ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('nm_jurusan', 'Nama jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/tahun_ajaran');
        } else {
            $data = array(
                "id_jurusan" => $_POST['id_jurusan'],
                "nm_jurusan" => $_POST['nm_jurusan']
            );
            $this->db->insert('jurusan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/tahun_ajaran');
        }
    }

    public function editTA()
    {
        $this->form_validation->set_rules('nm_jurusan', 'Nama Jurusan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/tahun_ajaran');
        } else {
            $data = [
                "nm_jurusan" => $_POST['nm_jurusan']
            ];
            $this->db->where('id_ta',  $_POST['id']);
            $this->db->update('tahun_ajaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/tahun_ajaran');
        }
    }

    public function hapusTA($id)
    {
        $this->admin->hapusTA($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('Admin/tahun_ajaran');
    }
    // Master Data - Tahun Ajaran / END


    // Management User - Teller / START
    public function teller()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Tabel Data Teller';
        $data['h2'] = 'Management User / Teller';
        $data['ht'] = 'Tabel Data Teller';
        $data['m1'] = 'Tambah Data Teller';
        $data['m2'] = 'Edit Data Teller';
        $data['t'] = 'Teller';

        $data['teller'] = $this->data->getTeller();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/t_teller', $data);
        $this->load->view('admin/footer');
    }

    public function addTeller()
    {
        $this->form_validation->set_rules('id', 'ID', 'required|is_unique[pengguna.id_pengguna]', [
            'is_unique' => 'ID ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('nm', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
            'is_unique' => 'Alamat Email ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/teller');
        } else {
            $data = array(
                "id_pengguna" => $this->input->post('id'),
                "nm_pg" => $this->input->post('nm'),
                "email" => $this->input->post('email'),
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                "no_hp" => $this->input->post('no_hp'),
                "alamat" => $this->input->post('alamat'),
                'no_rek' => random_string('numeric', '8'),
                "role_id" => 3,
                "is_active" => 1,
                "date_created" => time()
            );
            $this->db->insert('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/teller');
        }
    }

    public function editTeller()
    {
        $this->form_validation->set_rules('nm', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/teller');
        } else {
            $data = [
                "nm_pg" => $_POST['nm'],
                "no_hp" => $_POST['no_hp'],
                "alamat" => $_POST['alamat']
            ];
            $this->db->where('id_pengguna',  $_POST['id']);
            $this->db->update('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/teller');
        }
    }

    public function hapusTeller($id)
    {
        $this->admin->hapusTeller($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('Admin/teller');
    }
    // Management User - Teller / END


    // Management User - Customer Service / START
    public function cs()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Tabel Data Customer Service';
        $data['h2'] = 'Management User / Customer Service';
        $data['ht'] = 'Tabel Data Customer Service';
        $data['m1'] = 'Tambah Data Customer Service';
        $data['m2'] = 'Edit Data Customer Service';
        $data['t'] = 'Customer Service';

        $data['customer'] = $this->data->getCs();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/t_cs', $data);
        $this->load->view('admin/footer');
    }

    public function addCs()
    {
        $this->form_validation->set_rules('id', 'ID', 'required|is_unique[pengguna.id_pengguna]', [
            'is_unique' => 'ID ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('nm', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
            'is_unique' => 'Alamat Email ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/cs');
        } else {
            $data = array(
                "id_pengguna" => $this->input->post('id'),
                "nm_pg" => $this->input->post('nm'),
                "email" => $this->input->post('email'),
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                "no_hp" => $this->input->post('no_hp'),
                "alamat" => $this->input->post('alamat'),
                'no_rek' => random_string('numeric', '8'),
                "role_id" => 5,
                "is_active" => 1,
                "date_created" => time()
            );
            $this->db->insert('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/cs');
        }
    }

    public function editCs()
    {
        $this->form_validation->set_rules('nm', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/cs');
        } else {
            $data = [
                "nm_pg" => $_POST['nm'],
                "no_hp" => $_POST['no_hp'],
                "alamat" => $_POST['alamat']
            ];
            $this->db->where('id_pengguna',  $_POST['id']);
            $this->db->update('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/cs');
        }
    }

    public function hapusCs($id)
    {
        $this->admin->hapuscs($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('Admin/cs');
    }
    // Management User - Customer Service / END


    // Management User - HRD / START
    public function pimpinan()
    {
        $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'NJE Bank';
        $data['brand'] = 'Neo Java Era Bank';
        $data['h1'] = 'Tabel Data Pimpinan';
        $data['h2'] = 'Management User / Pimpinan';
        $data['ht'] = 'Tabel Data Pimpinan';
        $data['m1'] = 'Tambah Data Pimpinan';
        $data['m2'] = 'Edit Data Pimpinan';
        $data['t'] = 'Pimpinan';

        $data['pimpinan'] = $this->data->getHrd();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/t_pimpinan', $data);
        $this->load->view('admin/footer');
    }

    public function addPimpinan()
    {
        $this->form_validation->set_rules('id', 'ID', 'required|is_unique[pengguna.id_pengguna]', [
            'is_unique' => 'ID ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('nm', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
            'is_unique' => 'Alamat Email ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/pimpinan');
        } else {
            $data = array(
                "id_pengguna" => $this->input->post('id'),
                "nm_pg" => $this->input->post('nm'),
                "email" => $this->input->post('email'),
                "password" => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                "no_hp" => $this->input->post('no_hp'),
                "alamat" => $this->input->post('alamat'),
                'no_rek' => random_string('numeric', '8'),
                "role_id" => 4    ,
                "is_active" => 1,
                "date_created" => time()
            );
            $this->db->insert('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/pimpinan');
        }
    }

    public function editPimpinan()
    {
        $this->form_validation->set_rules('nm', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data gagal ditambahkan.</div>');
            redirect('Admin/pimpinan');
        } else {
            $data = [
                "nm_pg" => $_POST['nm'],
                "no_hp" => $_POST['no_hp'],
                "alamat" => $_POST['alamat']
            ];
            $this->db->where('id_pengguna',  $_POST['id']);
            $this->db->update('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Data berhasil ditambahkan</div>');
            redirect('Admin/pimpinan');
        }
    }

    public function hapusPimpinan($id)
    {
        $this->admin->hapuspimpinan($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data berhasil dihapus</div>');
        redirect('Admin/pimpinan');
    }
    // Management User - Customer Service / END


    // public function sessionExpired() 
    // {
    //     $this->session->
    // }

}
