<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Post_model extends CI_model {

public function __construct()
	{
		$this->load->database();
	}

	public function cariOrang($cari)
	{
		$data = $this->db->query("SELECT *

FROM
    jenis_laporan
    INNER JOIN laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    INNER JOIN users 
        ON (users.id = laporan.id_client)
        INNER JOIN gedung 
        ON (gedung.id_gedung = laporan.Subjek)
        INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)
        INNER JOIN teknisi 
        ON (teknisi.id_teknisi = laporan.Teknisi)
          where laporan.id_laporan = '$cari'");
		return $data->result();
	}

     public function carihapuslapor($cari)
    {
        $data = $this->db->query("SELECT
    laporan.id_laporan
    , laporan.id_client
    , jenis_laporan.Jenis
    , laporan.Status
    , laporan.Subjek
    , laporan.tanggal_lapor
    , laporan.Laporan
    , users.Nama
FROM
    jenis_laporan
    INNER JOIN laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    INNER JOIN users 
        ON (users.id = laporan.id_client)
          where laporan.id_laporan = '$cari' and laporan.status_keadaan = '0' ");
        return $data->result();
    }		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */