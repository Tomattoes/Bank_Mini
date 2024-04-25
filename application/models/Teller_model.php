<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teller_model extends CI_Model
{
    // Total Setoran & Penarikan, User
    public function totalSetoran()
    {
        return $query = $this->db->query("
        SELECT SUM(t.debit) as Setoran
        FROM tabungan t;
        ")->result_array();
    }

    public function totalPenarikan()
    {
        return $query = $this->db->query("
        SELECT SUM(t.kredit) as Penarikan
        FROM tabungan t;
        ")->result_array();
    }

    public function totalUser()
    {
        $query = $this->db->get_where('pengguna', ['role_id' => 2]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // Menu Transaksi - Setoran / START
    public function tabungan()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.kelas_id, p.jurusan_id, p.role_id, p.no_rek, k.id_kelas, k.nm_kelas, j.id_jurusan, j.nm_jurusan, t.tanggal, t.debit, t.siswa_id, t.id, t.jenis, t.kredit, t.keterangan, t.petugas
        FROM pengguna p, kelas k, jurusan j, tabungan t
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan AND
        t.siswa_id=p.id_pengguna AND
        t.jenis='ST'
        ORDER BY tanggal DESC;
        ")->result_array();
    }

    public function tabunganById($id)
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.kelas_id, p.jurusan_id, p.role_id, p.no_rek, k.id_kelas, k.nm_kelas, j.id_jurusan, j.nm_jurusan, t.tanggal, t.debit, t.kredit, t.siswa_id, t.petugas, t.id, t.keterangan
        FROM pengguna p, kelas k, jurusan j, tabungan t
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan AND
        t.siswa_id=p.id_pengguna AND
        t.id='" . $id . "';
        ")->row_array();
    }

    public function siswa()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.kelas_id, p.jurusan_id, p.no_rek, k.id_kelas, k.nm_kelas, j.id_jurusan, j.nm_jurusan
        FROM pengguna p, kelas k, jurusan j
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan
        ORDER BY id_pengguna ASC;
        ")->result_array();
    }

    public function addSetoran()
    {
        $data = [
            "debit" => $this->input->post('setor', true),
            "tanggal" => time(),
            "siswa_id" => $this->input->post('id_pengguna', true),
            "petugas" => $this->input->post('petugas', true),
            "jenis" => 'ST'
        ];

        $this->db->insert('tabungan', $data);
    }

    public function editSetoran()
    {
        $data = [
            "debit" => $this->input->post('setor', true),
            "tanggal" => time(),
            "petugas" => $this->input->post('petugas', true),
        ];
        $this->db->where('id',  $_POST['id']);
        $this->db->update('tabungan', $data);
    }

    public function saldo()
    {
        if (isset($_POST["id_pengguna"])) {
            $hasil = $this->db->query("
            SELECT SUM(t.debit)-SUM(t.kredit) as Total
            FROM pengguna p, tabungan t
            WHERE t.siswa_id=p.id_pengguna AND
            p.id_pengguna='" . $_POST["id_pengguna"] . "'");
        }
        return $hasil->row();
    }

    public function hapusSetoran($id)
    {
        // $this->db->where('id', $id); 
        $this->db->delete('tabungan', ['id' => $id]);
    }

    // penarikan
    public function penarikan()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.kelas_id, p.jurusan_id, p.role_id, p.no_rek, k.id_kelas, k.nm_kelas, j.id_jurusan, j.nm_jurusan, t.tanggal, t.kredit, t.siswa_id, t.petugas, t.id, t.jenis, t.keterangan
        FROM pengguna p, kelas k, jurusan j, tabungan t
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan AND
        t.siswa_id=p.id_pengguna AND
        t.jenis='TR'
        ORDER BY tanggal DESC;
        ")->result_array();
    }

    public function addPenarikan()
    {
        $data = [
            "kredit" => $this->input->post('setor', true),
            "tanggal" => time(),
            "siswa_id" => $this->input->post('id_pengguna', true),
            "petugas" => $this->input->post('petugas', true),
            "keterangan" => $this->input->post('ket', true),
            "jenis" => 'TR'
        ];

        $this->db->insert('tabungan', $data);
    }

    public function editPenarikan()
    {
        $data = [
            "kredit" => $this->input->post('setor', true),
            "tanggal" => time(),
            "petugas" => $this->input->post('petugas', true),
            "keterangan" => $this->input->post('ket', true)
        ];
        $this->db->where('id',  $_POST['id']);
        $this->db->update('tabungan', $data);
    }

    public function hapusPenarikan($id)
    {
        // $this->db->where('id', $id); 
        $this->db->delete('tabungan', ['id' => $id]);
    }


    // Data Menu - User
    public function tabungan1()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.no_rek, k.nm_kelas, j.nm_jurusan, SUM(t.debit) as Debit, SUM(t.kredit)as Kredit, SUM(t.debit) - SUM(t.kredit)as Saldo
        FROM pengguna p, kelas k, jurusan j, tabungan t
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan AND
        t.siswa_id=p.id_pengguna
        GROUP BY id_pengguna;
        ")->result_array();
    }

    // Rekap
    public function rekap()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.no_rek, k.nm_kelas, j.nm_jurusan, t.debit, t.kredit, t.jenis, t.keterangan, t.tanggal, t.petugas
        FROM pengguna p, tabungan t, kelas k, jurusan j
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan AND
        p.id_pengguna=t.siswa_id AND
        t.jenis='ST'
        ORDER BY tanggal DESC;
        ")->result_array();
    }

    public function rekap1()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.no_rek, k.nm_kelas, j.nm_jurusan, t.debit, t.kredit, t.jenis, t.keterangan, t.tanggal, t.petugas
        FROM pengguna p, tabungan t, kelas k, jurusan j
        WHERE p.role_id=2 AND
        p.kelas_id=k.id_kelas AND
        p.jurusan_id=j.id_jurusan AND
        p.id_pengguna=t.siswa_id AND
        t.jenis='TR'
        ORDER BY tanggal DESC;
        ")->result_array();
    }
}
