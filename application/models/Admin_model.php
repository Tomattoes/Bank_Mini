<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    // Management User - User / START
    public function pengguna()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.email, p.no_hp, p.alamat, p.nm_ortu, p.kelas_id, p.jurusan_id, p.role_id, p.no_rek, k.id_kelas, k.nm_kelas, j.id_jurusan, j.nm_jurusan, p.date_created
        FROM pengguna p, kelas k, jurusan j
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan
        ORDER BY id_pengguna ASC;
        ")->result_array();
    }

    public function hapus($id)
    {
        // $this->db->where('id', $id); 
        $this->db->delete('pengguna', ['id_pengguna' => $id]);
    }
    // Management User - User / END


    // Master Data - Kelas / START
    public function hapusKelas($id)
    {
        // $this->db->where('id', $id); 
        $this->db->delete('kelas', ['id_kelas' => $id]);
    }
    // Master Data - Kelas / END


    // Master Data - Jurusan / START
    public function hapusJurusan($id)
    {
        // $this->db->where('id', $id); 
        $this->db->delete('jurusan', ['id_jurusan' => $id]);
    }
    // Master Data - Jurusan / END


    // Master Data - Tahun Ajaran / START
    // Master Data - Tahun Ajaran / END


    // Management User - Teller / START
    public function hapusTeller($id)
    {
        // $this->db->where('id', $id); 
        $this->db->delete('pengguna', ['id_pengguna' => $id]);
    }
    // Management User - Teller / END


    // Management User - Customer Service / START
    public function hapuscs($id)
    {
        // $this->db->where('id', $id); 
        $this->db->delete('pengguna', ['id_pengguna' => $id]);
    }
    // Management User - Customer Service / END
}
