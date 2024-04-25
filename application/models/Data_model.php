<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

    public function getJurusan1()
    {
        return $query = $this->db->query("
        SELECT j.id_jurusan, j.nm_jurusan
        FROM jurusan j
        ORDER BY nm_jurusan ASC;
        ")->result_array();
    }

    public function getKelas1()
    {
        $this->db->from("kelas");
        $this->db->order_by("nm_kelas", "asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTeller()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.email, p.no_hp, p.alamat, p.no_rek, p.date_created
        FROM pengguna p
        WHERE p.role_id=3
        ORDER BY nm_pg ASC;
        ")->result_array();
    }

    public function getCs()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.email, p.no_hp, p.alamat, p.no_rek, p.date_created
        FROM pengguna p
        WHERE p.role_id=5
        ORDER BY nm_pg ASC;
        ")->result_array();
    }

    public function getHrd()
    {
        return $query = $this->db->query("
        SELECT p.id_pengguna, p.nm_pg, p.email, p.no_hp, p.alamat, p.no_rek, p.date_created
        FROM pengguna p
        WHERE p.role_id=4
        ORDER BY nm_pg ASC;
        ")->result_array();
    }

    // DASHBOARD - ADMIN
    public function totalUser()
    {
        $query = $this->db->get_where('pengguna', ['role_id' => 2]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function totalTeller()
    {
        $query = $this->db->get_where('pengguna', ['role_id' => 3]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function totalCs()
    {
        $query = $this->db->get_where('pengguna', ['role_id' => 5]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function totalPimpinan()
    {
        $query = $this->db->get_where('pengguna', ['role_id' => 4]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function totalKelas()
    {
        $query = $this->db->get_where('kelas');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function totalJurusan()
    {
        $query = $this->db->get_where('jurusan');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function tabungan()
    {
        return $query = $this->db->query("
        SELECT SUM(t.debit) - SUM(t.kredit) as saldo
        FROM tabungan t
        ")->result_array();
    }
} 