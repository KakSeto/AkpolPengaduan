<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_laporan extends CI_model {

public function gethitung()
    {
        return $this->db->query("SELECT * FROM profil_akpol limit 0,1");
        
    
        }
    
public function hapus_laporan($kode)
  {
    $data = "UPDATE `laporan` SET `status_keadaan`='0',`status`='DiTutup' WHERE  `id_laporan`=$kode;";
  return $this->db->query($data);
  //$this->load->view('client/pesan_masuk/view','refresh');
     redirect("client/pesan_masuk/view","refresh");
  }

    // Hitung Pesan Masuk
    public function pesan_masuk($departemen)
    {
        return $this->db->query("SELECT *
     
FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
        where laporan.Status = 'Belum Dibaca' and laporan.Tujuan = '$departemen'
           order by laporan.tanggal_lapor DESC");
    }
    //
     // Hitung Pesan Masuk
    public function pesan_masukclient($user)
    {
        return $this->db->query("SELECT *
   
FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
        where laporan.Status = 'Sudah Dibaca' and users.username = '$user'
           order by laporan.tanggal_lapor DESC");
    }
    //
    // Hitung History
    public function history($departemen)
    {
        return $this->db->query("SELECT * FROM users where status_keadaan='0' 
                                    and Departemen = '$departemen'");
    }
    //
    // Hitung History Laporan
    public function history_laporan()
    {
        return $this->db->query("SELECT * FROM laporan where status_keadaan='0'");
    }
    //
    // Hitung Pesan Keluar
    public function pesan_keluar($departemen)
    {
        return $this->db->query("SELECT *

FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
        where laporan.Status = 'Sudah Dibaca' and laporan.`status_keadaan`='1' and laporan.Tujuan = '$departemen'
           order by laporan.tanggal_lapor DESC
     ");
    }
    //
    // Hitung Pesan Keluar
    public function pesan_keluarclient($user)
    {
        return $this->db->query("SELECT
        users.Nama
    , laporan.id_laporan
    , jenis_laporan.Jenis
    , laporan.Status
    , laporan.Subjek
    , laporan.id_client
    , laporan.tanggal_lapor
FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
        where laporan.Status = 'Belum Dibaca' and laporan.`status_keadaan`='1' and users.username = '$user'
           order by laporan.tanggal_lapor DESC
     ");
    }
    //
       // Hitung history
    public function historyclient($kode)
    {
        return $this->db->query("SELECT
        users.Nama
    , laporan.id_laporan
    , jenis_laporan.Jenis
    , laporan.Status
    , laporan.Subjek
    , laporan.id_client
    , laporan.tanggal_lapor
FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
        where laporan.status_keadaan = '0' and users.id = '$kode'
           order by laporan.tanggal_lapor DESC
     ");
    }
    //
    // Hitung Client
    public function client($departemen)
    {
        return $this->db->query("SELECT * FROM users where level='Client' and status_keadaan='1'   
                                    and Departemen = '$departemen'");
    }
    //
    // Hitung Admin
    public function admin($departemen)
    {
        return $this->db->query("SELECT * FROM users where level='Admin2' and status_keadaan='1' 
                                    and Departemen = '$departemen'");
    }
    //
	public function getdataheder($departemen)
    {
            $data = "SELECT *
FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)
        where laporan.Status = 'Belum Dibaca' AND laporan.Tujuan = '$departemen'
           order by laporan.tanggal_lapor DESC limit 0,5
     
     ;";
        
    return $this->db->query($data);

        }
        public function data_id($user)
    {
            $data = "SELECT
    id
FROM
    users 
    where
users.username = '$user'
    ;

    ";
        
    return $this->db->query($data);

        }
    public function getviewdata($departemen)
	{
			$data = "SELECT *

FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)
        where laporan.Status = 'Belum Dibaca' AND laporan.Tujuan = '$departemen'
           order by laporan.tanggal_lapor DESC
     
     ;";
		
	return $this->db->query($data);

		}
		
		
		public function getlokasigedung($key)
	{
			$data = "SELECT *
    FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)

    INNER JOIN gedung
        ON (gedung.id_gedung = laporan.Subjek)
        
        where laporan.id_laporan = '$key'
		  ;";
		
	return $this->db->query($data);

        }
        

        public function getteknisi($key)
	{
			$data = "SELECT *
    FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
    INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)
    INNER JOIN gedung
        ON (gedung.id_gedung = laporan.Subjek)
        INNER JOIN teknisi 
        ON (teknisi.id_teknisi = laporan.Teknisi)
        
        where laporan.id_laporan = '$key'
		  ;";
		
	return $this->db->query($data);

		}

    public function hapusdata($departemen)
    {
            $data = "SELECT
        users.Nama
        ,users.Departemen
    , laporan.id_laporan
    , jenis_laporan.Jenis
    , laporan.Status
    , laporan.Subjek
    , laporan.id_client
    , laporan.status_keadaan
    , laporan.tanggal_lapor
FROM
    users
    INNER JOIN laporan 
        ON (users.id = laporan.id_client)
    INNER JOIN jenis_laporan 
        ON (jenis_laporan.id_jenis = laporan.Jenis_Laporan)
        where laporan.status_keadaan='0' AND laporan.Tujuan = '$departemen'
           order by laporan.tanggal_lapor DESC
     
     ;";
        
    return $this->db->query($data);

        }

public function getdatajenis($departemen)
    {
            $jenis = "SELECT * FROM jenis_laporan ;";
        
    return $this->db->query($jenis);

        }
    		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */