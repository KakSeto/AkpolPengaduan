<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_jawab extends CI_model {

	public function getdata($key)
	{
		$hasil = $this->db->get('profil_akpol');
		return $hasil;
		
	}
public function getdataview($key)
	{
			$data = "SELECT *
FROM
    laporan
    INNER JOIN jawaban 
        ON (laporan.id_laporan = jawaban.id_laporan)
    INNER JOIN users 
        ON (users.id = jawaban.id_admin)
	INNER JOIN departemen 
        ON (departemen.id_departemen = users.Departemen)
	INNER JOIN teknisi 
        ON (teknisi.id_teknisi = laporan.Teknisi)
    INNER JOIN gedung 
        ON (gedung.id_gedung = laporan.Subjek)
		  where jawaban.id_laporan = '$key';
		  ;";
		
	return $this->db->query($data);

		}

public function viewdata()
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
	INNER JOIN teknisi 
        ON (teknisi.id_teknisi = laporan.Teknisi)
    INNER JOIN gedung 
        ON (gedung.id_gedung = laporan.Subjek)
        where laporan.Status = 'Sudah Dibaca'
           order by laporan.tanggal_lapor DESC
     
     ;";
		
	return $this->db->query($data);

		}

	public function getupdate($key,$jawab,$teknisi)
	{
		// $this->db->where('id_laporan',$key);
		// $this->db->update('laporan',$data);

		 $data = "UPDATE `laporan` SET `Jawaban`='$jawab', `Status`='Sudah Dibaca',`Teknisi`='$teknisi' WHERE  `id_laporan`='$key';";
    
  return $this->db->query($data);

		
	}
	public function getupdateid($key,$id)
	{
		 $this->db->where('id_laporan',$key);
		 $this->db->update('jawaban',$id);


		
    
  // return $this->db->query($data);
		
	}
	public function getinset($data)
	{
				$this->db->insert('laporan',$data);

	}
    		
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */