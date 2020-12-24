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

  public function getviewdataadmin()
    {
            $data = "SELECT *
  
FROM
    users
    INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)
where users.level = 'Admin2'  and status_keadaan='1'
    ;
          ;";
        
    return $this->db->query($data);

        }



    // Hitung Pesan Masuk
    public function pesan_masuk()
    {
        return $this->db->query("SELECT * FROM laporan where status='Belum dibaca'");
    }
    //
    // Hitung Pesan Keluar
    public function pesan_keluar()
    {
        return $this->db->query("SELECT * FROM laporan where status='Sudah dibaca'");
    }

    //Tampil Data di Header
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
        where laporan.Status = 'Belum Dibaca'
           order by laporan.tanggal_lapor DESC limit 0,5
     
     ;";
        
    return $this->db->query($data);

        }

// Tampil Data Client

    public function getviewdata()
	{
			$data = "SELECT *
FROM
    users
    INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)
where users.level = 'Client' and status_keadaan ='1'
    ;
          ;";
		
	return $this->db->query($data);

		}

// Tampil Data History

 public function getviewdatahistory()
    {
            $data = "SELECT
    username
    , Email
    , Nama
    , id
    , level
FROM
    users where status_keadaan ='0' and status = '0'
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