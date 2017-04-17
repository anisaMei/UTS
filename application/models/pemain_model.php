<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pemain_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataPemain()
		{
			$this->db->select("id,nama,posisi,tanggal_lahir,fk_klub");
			$query = $this->db->get('pemain');
			return $query->result();
		}

		public function getPemainByKlub($id)
		{
		//	$this->db->select("klub.nama as namaKlub, nama,DATE_FORMAT(tanggalMulai,'%d-%m-%Y') as tanggal_lahir");
		//	$this->db->where('fk_klub', $id);	
		//	$this->db->join('klub', 'klub.id = pemain.fk_klub', 'left');	
		//	$query = $this->db->get('pemain');
		//	return $query->result();
		}

		public function insertPemain($id)
		{
			$object = array('nama' => $this->input->post('nama'),'posisi'=>
				$this->input->post('posisi'),'tanggal_lahir'=>$this->input->post('tanggal_lahir'),'fk_klub'=> $id);
			$this->db->insert('pemain', $object);
		}
		
		/*public function insertPegawai()
		{
			$object  = array(
			'nama' => $this->input->post('nama'),
			'foto' => $this->upload->data('file_name')
			);
		
		$this->db->insert('pegawai',$object);
		}
*/
		public function getPemain($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('pemain',1);
			return $query->result();

		}

		public function updateById($id)
		{
			$data = array('nama' => $this->input->post('nama'));
			$this->db->where('id', $id);
			$this->db->update('pemain', $data);

		}
		//public function insertJabatan($idPegawai)
		//{
			//$object = array(
				//'namaJabatan' => $this->input->post('jabatan'),
				//'fk_pegawai' => $idPegawai);

			//$this->db->insert('jabatan_pegawai'$object);
		//}

		public function deletePemain($id)
		{
			$this->db->where('id', $id);	
			$this->db->delete('pemain');


	
		}



}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>