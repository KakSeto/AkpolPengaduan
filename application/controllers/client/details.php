<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class details extends CI_Controller {

	
		public function index()
	{
		
		$isi['data']	= $this->db->get('laporan');
		$isi['content'] = 'client/view';
		$isi['vale']	= $this->db->get('profil_akpol');
		$isi['label'] = 'VIEW';
	
		$this->model_scurity->getscurity();
		$key = $this->uri->segment(4);
		$this->db->where('id_laporan',$key);
		$query = $this->db->get('laporan');
		if($query->num_rows()>0)
		{
		foreach ($query->result() as $row) {
				$isi['id_laporan']				=  $row->id_laporan;
				$isi['id_client']	=  $row->id_client;
				$isi['Jenis_Laporan']			=  $row->Jenis_Laporan;
				$isi['Subjek']			=  $row->Subjek;
				$isi['Laporan']			=  $row->Laporan;
				$isi['Bukti']			=  $row->Bukti;
				$isi['Status']			=  $row->Status;
				$isi['tanggal_lapor']			=  $row->tanggal_lapor;
			}
		} else{
			$isi['id_laporan']				= "";
				$isi['id_client']	=  "";
				$isi['Jenis_Laporan']			=  "";
				$isi['Subjek']			=  "";
				$isi['Laporan']			=  "";
		}
		$this->load->view('client/client',$isi);
	
	}
	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */