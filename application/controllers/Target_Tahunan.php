<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Target_Tahunan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('m_Target_Tahunan', 'model');
	}

	public function index()
	{
		// load needed databases		
		$saleses = $this->model->getData('users',array ('ID_ROLE' => 2,'ID_SBU'=> $_SESSION['ID_SBU']));
		$target = $this->model->getData('annual_target_sbu', array('ID_SBU' => $_SESSION['ID_SBU']));
		$per = $this->model->getPeriode();

		// var_dump($target->num_rows());
		if ($target->num_rows() == 0) {
		// 	echo 'kosong';
			foreach ($saleses->result() as $sales) {
				$data = array(
					'ID_SALES' => $sales->ID_USER,
					'ID_SBU'  => $sales->ID_SBU,
					'PERIODE' => date('Y')
				);
				$this->model->insert('annual_target_sbu', $data);
			}
			redirect('target_tahunan');
		} elseif(!in_array(date('Y'),$per)){
			$where = array(
				'SBU' 		=> $_SESSION['ID_SBU'],
				'PERIODE'	=> $per[0]
			);
			$data['target']	 = $this->model->getData('annual_target',$where)->result();
			$data['period']	 = $this->model->getPeriode();
			$data['tahun']	 = $per[0];
			$data['title']	 = 'Target Tahunan';
			$data['saleses'] = $this->model->tampilSalesSBUTarget(array('PERIODE'=> $per[0]))->result();
			$this->load->view('page/target tahunan/annual', $data);
		}else {
			// $data['sbu']	= $this->model->;
			$where = array(
				'SBU' 		=> $_SESSION['ID_SBU'],
				'PERIODE'	=> date('Y')
			);
			$data['target']	 = $this->model->getData('annual_target',$where)->result();
			$data['period'] = $this->model->getPeriode();
			$data['tahun'] = date('Y');
			$data['title']	 = 'Target Tahunan';
			$data['saleses'] = $this->model->tampilSalesSBUTarget(array('PERIODE'=> date('Y')))->result();

			$this->load->view('page/target tahunan/annual', $data);
			// var_dump($saleses->result());
		}

		// 	$data['title'] = "Target Tahunan Pusat";
		// 	$data['saleses']= $sales->result();
		// 	$this->load->view('page/target tahunan/annual',$data);
	}

	public function edit_target()
	{
		$this->form_validation->set_rules('nominal', 'Nominal', 'required');
		$this->form_validation->set_rules('tahun', 'Tahun Periode', 'required');
		$this->form_validation->set_rules('annual', 'Annual', 'required');
		$this->form_validation->set_rules('uri', 'URI', 'required');

		var_dump($_POST);
		var_dump($this->form_validation->run());
		echo validation_errors();
		if ($this->form_validation->run() == true) {
			// echo 'tidak masalah';
			$nominal = str_replace('Rp. ', '', $_POST['nominal']);
			$nominal = str_replace('.', '', $nominal);
			$nominal = str_replace(',00', '', $nominal);
			$int_nominal = (int)$nominal;
			$where = array(
				'PERIODE' => $_POST['tahun'],
				'ID_ANNUAL' => $_POST['annual']
			);
			// var_dump($where);
			$this->model->update('annual_target_sbu', array('ANNUAL_TARGET' => $int_nominal), $where);
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Target sales berhasil diubah.</div>");
			if($_POST['uri']==false){
				redirect('target_tahunan');
			}else{
				redirect('target_tahunan/periode/'.$_POST['tahun']);
			}
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>Terjadi kesalahan coba lagi.</div>");
			// echo 'masalah';
			redirect('target_tahunan');
		}
	}

	public function periode($tahun)
	{
		// form vallidation
		$this->form_validation->set_rules('tahun','Periode Tahun','required');
		$this->form_validation->set_rules('check','Check','required');
		
		// proses tambah periode  dan target setiap sales
		$per = $this->model->getPeriode();
		$where = array(
			'PERIODE' => $tahun
		);
		$data['target']	 = $this->model->getData('annual_target',$where)->result();
		if($tahun=='tambah'){
			var_dump($this->form_validation->run()==true and !in_array($_POST['tahun'],$per));
			if($this->form_validation->run()==true and !in_array($_POST['tahun'],$per)){
				// load database
				$sales = $this->model->getData('users',array ('ID_ROLE' => 2,'ID_SBU' => $_SESSION['ID_SBU']))->result();
				foreach($sales as $s){
					$data = array (
						'PERIODE' => $_POST['tahun'],
						'ID_SALES'=> $s->ID_USER,
						'ID_SBU'  => $s->ID_SBU
					);
					var_dump($s);
					$this->session->set_flashdata('message', "<div class='alert alert-success'><strong>Berhasil !</strong> Berhasil menambahkan periode target.</div>");
					$this->model->insert('annual_target_sbu',$data);
				}
				redirect('target_tahunan/periode/'.$_POST['tahun']);
			}elseif(in_array($_POST['tahun'],$per)){
				// echo 'Periode Tahun Tersedia.';
				$this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>Gagal !</strong> Periode Tahun Tersedia.</div>");
				redirect('target_tahunan');
			}else{
				// echo 'Terjadi kesalahan coba lagi.';
				$this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>Gagal !</strong> Terjadi kesalahan coba lagi.</div>");
				redirect('target_tahunan');
			}
		}elseif(in_array($tahun,$per)){
			// echo 'masuk target tahunan '.$tahun;
			$data['period']  = $per;
			$data['tahun'] = $tahun;
			$data['title']	 = 'Target Tahunan';
			$data['saleses'] = $this->model->tampilSalesSBUTarget(array('PERIODE'=> $tahun))->result();
			$this->load->view('page/target tahunan/annual', $data);
		}else{
			$data['period']  = $this->model->getPeriode()->result();
			$data['periode'] = $tahun;
			$data['title']	 = 'Target Tahunan';
			$data['saleses'] = $this->model->tampilSalesSBUTarget(array('PERIODE'=> $tahun))->result();
			// $data['saleses'] = $this->model->tampilSalesSBUTarget(array('annual_target_sbu.ID_SBU' => $_SESSION['ID_SBU']))->result();
			$this->load->view('page/target tahunan/annual', $data);
		}
	}
	public function delete()
	{
		$this->form_validation->set_rules('check','Check','required');
		$this->form_validation->set_rules('tahun','Tahun Periode','required');
		if($this->form_validation->run()==true){
			var_dump($_POST);
			// echo 'masok';
			$this->model->delete('annual_target_sbu',array('PERIODE'=>$_POST['tahun']));
			$this->session->set_flashdata('message', "<div class='alert alert-success'><strong>Berhasil !</strong> Tahun Periode berhasil dihapus.</div>");
			redirect('target_tahunan');
		}else{
			$this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>Gagal !</strong> Terjadi kesalahan coba lagi.</div>");
			redirect('target_tahunan');
			// echo 'tidak masok';
		}
		// $this->model->delete();
	}

}
