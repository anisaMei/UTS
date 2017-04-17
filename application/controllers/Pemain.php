<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemain extends CI_Controller {

	public function index()
	{
		$this->load->model('pemain_model');
		$data["pemain_list"] = $this->pemain_model->getDataPemain();
		$this->load->view('pemain_datatable',$data);	
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('posisi', 'Posisi', 'trim|required|min_length[3]|max_length[100]');
		$this->load->model('pemain_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_pemain');

		}
			else
			{
				$this->pemain_model->insertPemain();
				$this->load->model('pemain_model');
				$data["pemain_list"] = $this->pemain_model->getDataPemain();
				redirect('pemain/datatable',$data);	

			}

		}

			//$this->pegawai_model->insertPegawai();
			//redirect('pegawai');
			//}
 
	//method update butuh parameter id berapa yang akan di update
	public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[100]');
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('pemain_model');	
		$data['pemain']=$this->pemain_model->getPemain($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('edit_pemain',$data);

		}else{
			$this->pemain_model->updateById($id);
			redirect('pemain/datatable',$data);
			}

		}

	public function delete($id)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('pemain_model');
		$this->pemain_model->deletepemain($id);	
		if($this->form_validation->run()==FALSE){
				redirect('pemain/datatable');
			}
	
	}
public function datatable()
	{
		$this->load->model('pemain_model');
		$data["pemain_list"] = $this->pemain_model->getDataPemain();
		$this->load->view('pemain_datatable', $data);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>