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
    public function pesan_masuk()
    {
        return $this->db->query("SELECT * FROM laporan where status='Belum dibaca'");
    }
    //
     // Hitung Pesan Masuk
    public function pesan_masukclient($user)
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
        where laporan.Status = 'Sudah Dibaca' and users.username = '$user'
           order by laporan.tanggal_lapor DESC");
    }
    //
    // Hitung History
    public function history()
    {
        return $this->db->query("SELECT * FROM users where status_keadaan='0'");
    }
    //
    // Hitung History Laporan
    public function history_laporan()
    {
        return $this->db->query("SELECT * FROM laporan where status_keadaan='0'");
    }
    //
    // Hitung Pesan Keluar
    public function pesan_keluar()
    {
        return $this->db->query("SELECT * FROM laporan where status='Sudah dibaca'");
    }
    //
    // Hitung Pesan Keluar
    public function pesan_keluarclient($user)
    {
        return $this->db->query("SELECT *
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
    public function client()
    {
        return $this->db->query("SELECT * FROM users where level='Client' and status_keadaan='1' ");
    }
    //
    // Hitung Admin
    public function admin()
    {
        return $this->db->query("SELECT * FROM users where level='Admin2' and status_keadaan='1' ");
    }
    //
	public function getdataheder()
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

        where laporan.Status = 'Belum Dibaca' 
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
    public function getviewdata()
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
        
        where laporan.Status = 'Belum Dibaca'
           order by laporan.tanggal_lapor DESC
     
     ;";
		
	return $this->db->query($data);

        }


        public function getdatadepartemen($key)
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

    public function hapusdata()
    {
            $data = "SELECT
        users.Nama
        
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
        where laporan.status_keadaan='0'
           order by laporan.tanggal_lapor DESC
     
     ;";
        
    return $this->db->query($data);

        }

public function getdatajenis()
    {
            $jenis = "SELECT * FROM jenis_laporan ;";
        
    return $this->db->query($jenis);

        }
    		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */