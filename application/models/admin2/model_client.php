<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_client extends CI_model {

public function gethitung()
    {
        return $this->db->query("SELECT * FROM profil_akpol limit 0,1");
        
    
        }
        public function tampiltabel()
    {
       return $this->db->query("show tables")->result();
    }

        public function info()
    {  
     $date = date('m');
      $data = "SELECT * FROM info_akpol where month(tanggal_info) = $date ";
        
    return $this->db->query($data);

    }

    public function getupdate($key,$data)
    {
        $this->db->where('id',$key);
        $this->db->update('users',$data);
    }
    
    public function getinset($data)
    {
                $this->db->insert('users',$data);

    }

  public function getviewdataadmin($departemen)
    {
            $data = "SELECT *
FROM
    users
    INNER JOIN departemen 
                ON (departemen.id_departemen = users.Departemen)
where users.level = 'Admin2' and status_keadaan='1' and users.Departemen = '$departemen'
    ;
          ;";
        
    return $this->db->query($data);

        }



    // Hitung Pesan Masuk
    public function pesan_masuk($departemen)
    {
        return $this->db->query("SELECT
        users.Nama
        ,users.Departemen
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
        where laporan.Status = 'Belum Dibaca' and users.Departemen = '$departemen'
           order by laporan.tanggal_lapor DESC");
    }
    //
    // Hitung Pesan Keluar
    public function pesan_keluar($departemen)
    {
        return $this->db->query("SELECT
        users.Nama
        ,users.Departemen
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
        where laporan.Status = 'Sudah Dibaca' and users.Departemen = '$departemen'
           order by laporan.tanggal_lapor DESC");
    }

    //Tampil Data di Header
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
                where laporan.Status = 'Belum Dibaca'
                   order by laporan.tanggal_lapor DESC limit 0,5
     ;";
        
    return $this->db->query($data);

        }

// Tampil Data Client

    public function getviewdata($departemen)
	{
			$data = "SELECT *
FROM
    users
    INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)
where users.level = 'Client' and status_keadaan ='1' and users.Departemen = '$departemen'
    ;
          ;";
		
	return $this->db->query($data);

		}

// Tampil Data History

 public function getviewdatahistory($departemen)
    {
            $data = "SELECT
    username
    , Email
    , Nama
    , id
    , level
    , Departemen
FROM
    users where status_keadaan ='0' and status = '0' and users.Departemen = '$departemen'
    ;
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