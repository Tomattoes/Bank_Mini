<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Data_model', 'data');
        $this->load->helper('string');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'NJE Bank | Log In';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $pengguna = $this->db->get_where('pengguna', ['email' => $email])->row_array();

        if ($pengguna) {
            // jika user aktif
            if ($pengguna['is_active']  == 1) {

                // cek password
                if (password_verify($password, $pengguna['password'])) {
                    $data = [
                        'email' => $pengguna['email'],
                        'role_id' => $pengguna['role_id'],
                        'id_pengguna' => $pengguna['id_pengguna']
                    ];

                    $this->session->set_userdata($data);
                    if ($pengguna['role_id'] == 1) {
                        redirect('admin');
                    }
                    if ($pengguna['role_id'] == 3) {
                        redirect('teller');
                    }
                    if ($pengguna['role_id'] == 4) {
                        redirect('pimpinan');
                    }
                    if ($pengguna['role_id'] == 5) {
                        redirect('cs');
                    } else {
                        redirect('user');
                        // penting cuy
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email ini belum diaktivasi!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email, Tidak terdaftar!</div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        $this->form_validation->set_rules('nis', 'NIS', 'required|is_unique[pengguna.id_pengguna]', [
            'is_unique' => 'NIS ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pengguna.email]', [
            'is_unique' => 'Alamat Email ini telah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password Tidak Sama!',
            'min_length' => 'Password Terlalu Pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('nama_ortu', 'Nama Orang Tua', 'required');
        $this->form_validation->set_rules('no_hp', 'no hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'NJE Bank | Registration';
            $data['kelas1'] = $this->data->getKelas1();
            $data['jurusan'] = $this->data->getJurusan1();

            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/auth_footer');               #AHMAD IRWANSYAH 
        } else {
            $data = [
                'id_pengguna' => $this->input->post('nis'),
                'nm_pg' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'kelas_id' => $this->input->post('kelas'),
                'jurusan_id' => $this->input->post('jurusan'),
                'nm_ortu' => $this->input->post('nama_ortu'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'no_rek' => random_string('numeric', '8'),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('pengguna', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Selamat, Akun Anda Berhasil Dibuat.</div>');
            redirect('auth');
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id_pengguna');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Anda berhasil logout</div>');
        redirect('auth');
    }

    // public function rek()
    // {
    //     $data['pengguna'] = $this->db->get_where('pengguna', ['email' => $this->session->userdata('email')])->result_array();

    //     $data['title'] = 'MW Bank | Registration';

    //     $this->load->view('templates/auth_header', $data);
    //     $this->load->view('auth/rek', $data);
    //     $this->load->view('templates/auth_footer');
    // }
}
