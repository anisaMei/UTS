<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		$this->load->model('pegawai_model');
		$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();
		$this->load->view('pegawai',$data);	
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('nip', 'Nip', 'trim|required|min_length[3]|max_length[15]|numeric');
		$this->form_validation->set_rules('tanggalLahir', 'tanggalLahir', 'trim|required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required|min_length[3]|max_length[100]');
		$this->load->model('pegawai_model');	
		if($this->form_validation->run()==FALSE){

			$this->load->view('tambah_pegawai_view');

		}else{
			$config['upload_path']	= './assets/uploads/';
			$config['allowed_types']= 'gif|jpg|png';
			$config['max_size']		= 1000000000;
			$config['max_width']	= 10240;
			$config['max_height']	= 7680;

			$this->load->library('upload',$config);

			if ( ! $this->upload->do_upload('userfile'))
		 	{
		 		$error =array('error' => $this->upload->display_errors());
		 		$this->load->view('tambah_pegawai_view',$error);
				
			}
			else
			{
				$this->pegawai_model->insertPegawai();
				$this->load->model('pegawai_model');
				$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();
				$this->load->view('pegawai',$data);	

			}

		}}

			//$this->pegawai_model->insertPegawai();
			//redirect('pegawai');
			//}
 
	//method update butuh parameter id berapa yang akan di update
	public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'Nip', 'trim|required|min_length[3]|max_length[15]|numeric');
		$this->form_validation->set_rules('tanggalLahir', 'tanggalLahir', 'trim|required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required|min_length[3]|max_length[100]');

		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('pegawai_model');
		$data['pegawai']=$this->pegawai_model->getPegawai($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('edit_pegawai_view',$data);

		}else{
			$this->pegawai_model->updateById($id);
			redirect('pegawai');
			}

		}

	public function delete($id)
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->load->model('pegawai_Model');
		$this->pegawai_Model->deletePegawai($id);	
		if($this->form_validation->run()==FALSE){
				redirect('pegawai');
			}
	
	}
public function datatable()
	{
		$this->load->model('pegawai_model');
		$data["pegawai_list"] = $this->pegawai_model->getDataPegawai();
		$this->load->view('pegawai_datatable', $data);
	}

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>