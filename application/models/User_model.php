<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function tabungan($id)
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, SUM(t.debit) as debit, SUM(t.kredit) as kredit, SUM(t.debit) - SUM(t.kredit) as saldo, t.jenis
        FROM pengguna p, tabungan t
        WHERE p.role_id=2 AND
        t.siswa_id=p.id_pengguna AND
        p.id_pengguna='" . $id . "'
        ")->row_array();
    }

    public function tabungan1($id)
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, t.jenis, t.debit, t.kredit, t.tanggal
        FROM pengguna p, tabungan t
        WHERE p.role_id=2 AND
        t.siswa_id=p.id_pengguna AND
        p.id_pengguna='" . $id . "'
        ORDER BY tanggal desc;
        ")->row_array();
    }

    public function kredit($id)
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, MAX(t.kredit) as kredit
        FROM pengguna p, tabungan t
        WHERE p.role_id=2 AND
        t.siswa_id=p.id_pengguna AND
        p.id_pengguna='" . $id . "'
        ")->row_array();
    }

    public function kj($id)
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, k.nm_kelas, j.nm_jurusan
        FROM pengguna p, kelas k, jurusan j
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan AND
        p.id_pengguna='" . $id . "'
        ")->row_array();
    }

    public function tabunganById($id)
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, t.tanggal, t.debit, t.kredit, t.jenis
        FROM pengguna p, tabungan t
        WHERE p.role_id=2 AND
        t.siswa_id=p.id_pengguna AND
        p.id_pengguna='" . $id . "'
        order by tanggal desc limit 3;
        ")->row_array();
    }
}
