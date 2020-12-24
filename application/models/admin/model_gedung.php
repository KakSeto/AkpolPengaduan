<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_gedung extends CI_model {

	public function getdata()
	{
		$hasil = $this->db->get('gedung');
		return $hasil;
		
	}

	public function get()
	{
		$query = $this->db->query('SELECT * FROM gedung where status_gedung = "Aktif" order by nama_gedung');
		return $query->result();
		
	}


	public function getupdate($key,$data)
	{
		$this->db->where('id_gedung',$key);
		$this->db->update('gedung',$data);
		
		
	}
	public function getinsert($data)
	{
				$this->db->insert('gedung',$data);

	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */