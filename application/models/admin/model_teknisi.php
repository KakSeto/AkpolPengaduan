<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model_teknisi extends CI_model {

	public function getdata()
	{
		$hasil = $this->db->get('teknisi');
		return $hasil;
		
	}

	public function get()
	{
		$query = $this->db->query('SELECT * FROM teknisi where status_teknisi = "Aktif" order by Nama_Teknisi ');
		return $query->result();
		
	}


	public function getupdate($key,$data)
	{
		$this->db->where('id_teknisi',$key);
		$this->db->update('teknisi',$data);
		
		
	}
	public function getinsert($data)
	{
				$this->db->insert('teknisi',$data);

	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */