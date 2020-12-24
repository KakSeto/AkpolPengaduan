<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_departemen extends CI_model {

	public function getdata()
	{
		$hasil = $this->db->get('departemen');
		return $hasil;
		
	}

	public function get()
	{
		$query = $this->db->query('SELECT * FROM departemen where status_departemen = "Aktif" order by Nama_Departemen');
		return $query->result();
		
	}


	public function getupdate($key,$data)
	{
		$this->db->where('id_departemen',$key);
		$this->db->update('departemen',$data);
		
		
	}
	public function getinsert($data)
	{
				$this->db->insert('departemen',$data);

	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */