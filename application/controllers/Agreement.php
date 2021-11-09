<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Agreement extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_agreement', 'model');
		check_not_login();	

	}
	public function index()
	{
		$data['title'] = 'Agreement';
		$data['agreement'] = $this->model->getAgreementUsers()->result();
		$this->load->view('page/agreement/tampil', $data);
	}
	public function tambah()
	{
		$data['title'] = 'Tambah Agreement';
		$data['npwp']  = $this->model->getTable('npwp')->result();
		$data['addr']  = $this->model->getTable('addreess')->result();
		$data['pelanggan'] = $this->model->getTable('opportunities')->result();
		$this->load->view('page/agreement/tambah', $data);
	}
	public function updateAgreement()
	{
		$this->load->view('page/agreemnet/update');
	}
	public function insert()
	{
		// form validation
		$this->form_validation->set_rules('agr_date', 'Tanggal Agreement', 'required');
		$this->form_validation->set_rules('agr_pelanggan', 'Pelanggan', 'required|integer');
		$this->form_validation->set_rules('agr_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('agr_selesai', 'Tanggal Selesai', 'required');
		$this->form_validation->set_rules('agr_bill', 'Tipe Billing Agreement', 'required');
		$this->form_validation->set_rules('agr_cut', 'Tanggal Pemutusan', 'required');
		$this->form_validation->set_rules('agr_bill_type', 'Jenis Pembayaran', 'required');
		$this->form_validation->set_rules('agr_period', 'Tipe Periode', 'required');
		$this->form_validation->set_rules('agr-period-jml', 'Jumlah Periode', 'required');
		$this->form_validation->set_rules('agr_faktur', 'Tipe Faktur', 'required');
		$this->form_validation->set_rules('agr_waktu', 'Jangka Waktu Pembayaran', 'required');
		$this->form_validation->set_rules('agr_isi', 'Isi Agreement', 'required');
		$this->form_validation->set_rules('rekening', 'Rekening Bank', 'required');
		$this->form_validation->set_rules('no_rekening', 'Nomor Rekening Bank', 'required');
		$this->form_validation->set_rules('npwp', 'NPWP', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Penagihan', 'required');
		// $this->form_validation->set_rules('','','required'); 

		if ($this->form_validation->run() == true) {

			$jmlh_col = $this->model->getLastID()->result();
			$no = $_SESSION['ID_USER'] * 10000000 + $jmlh_col[0]->id;
			$no_agrt = "AGR-" . $no;
			echo $no_agrt;
			$data = array(
				'NO_AGREEMENT' 		=> $no_agrt,
				'TANGGAL_AGREEMENT' => $_POST['agr_date'],
				'ID_OPPORTUNITY '	=> $_POST['agr_pelanggan'],
				'TANGGAL_MULAI' 	=> $_POST['agr_mulai'],
				'TANGGAL_BERAKHIR'	=> $_POST['agr_selesai'],
				'IS_RENEWAL' 		=> $_POST['isRenewal'],
				'JENIS_TAGIHAN' 	=> $_POST['agr_bill'],
				'TANGGAL_POTONG' 	=> $_POST['agr_cut'],
				'JENIS_PEMBAYARAN'	=> $_POST['agr_bill_type'],
				'TIPE_PERIODE' 		=> $_POST['agr_period'],
				'PERIODE' 			=> $_POST['agr-period-jml'],
				'TIPE_FAKTUR'		=> $_POST['agr_faktur'],
				'PER_PERIODE' 		=> $_POST['agr_period'],
				'JANGKA_WAKTU' 		=> $_POST['agr_waktu'],
				'AGREEMENT_TEKS' 	=> $_POST['agr_isi'],
				'HUKUMAN' 			=> $_POST['agr_hukuman'],
				'AKUN_BANK' 		=> $_POST['rekening'],
				'REKENING' 			=> $_POST['no_rekening'],
				'NPWP'				=> $_POST['npwp'],
				'ALAMAT'			=> $_POST['alamat'],
				'CRM_STATUS' 		=> $_POST['crm_status'],
				'SBU_OWNER'			=> $_POST['crm_sbu'],
				'ID_USER '			=> $_POST['crm_owner'],
				'DESKRIPSI'			=> $_POST['crm_deskrip'],
			);
			// var_dump($data);
			$this->model->insert('agreements', $data);
			$this->session->set_flashdata('message', "<div class='alert alert-success'>Agreement berhasil diubah</div>");
			redirect('agreement/edit/' . $no_agrt);
		} else {
			$this->session->set_flashdata('message', "<div class='alert alert-danger'>" . validation_errors() . "</div>");
			redirect('agreement/tambah');
		}
	}
	public function npwp()
	{
		// echo  json_encode($_POST);
		echo "<script>console.log(" . json_encode($_POST) . ")</script>";
		$npwp = $this->model->getData('npwp', array('ID_NPWP' => $_POST['id']))->result();
		echo "
		<label class='col-sm-4 text-right control-label'>Alamat NPWP</label>
		<div class='col-sm-6 p-0'>
			<strong>" . $npwp[0]->ALAMAT . "</strong>
		</div>
		";
	}
	public function address()
	{
		$address = $this->model->getData('addreess', array('ID_ADDRESS' => $_POST['id']))->result();
		echo "
		<div class='form-group row m-b-5'>
		<label class='col-sm-4 text-right control-label'>ID Alamat</label>
			<div class='col-sm-6 p-0'>
			<strong>" . $address[0]->NO_ADDRESS . "</strong>
			</div>
		</div>
		<div class='form-group row m-b-5'>
		<label class='col-sm-4 text-right control-label'>Alamat</label>
			<div class='col-sm-6 p-0'>
			<strong>" . $address[0]->ALAMAT . "</strong>
			</div>
		</div>
		";
	}
	public function tryApi()
	{
		$data = $this->model->getTable('users')->result();
		header('Content-Type: application/json');
		echo json_encode($data);
	}
	public function edit($id)
	{
		$data['agreement'] = $this->model->getData('agreements', array('NO_AGREEMENT' => $id))->result();
		$data['title'] = 'Edit Agreement';
		$data['npwp']  = $this->model->getTable('npwp')->result();
		$data['addr']  = $this->model->getTable('addreess')->result();
		$data['pelanggan'] = $this->model->getTable('opportunities')->result();
		$this->load->view('page/agreement/edit', $data);
	}
	public function kode()
	{
		$jmlh_col = $this->model->getLastID()->result();
		$no = $_SESSION['ID_USER'] * 10000000 + $jmlh_col[0]->id;
		$no_agrt = "AGR-" . $no;
		echo $no_agrt;
		return json_encode($no_agrt);
	}
	public function addActivity($id)
	{
		if($_POST['aktifitas']=='Instruksi'){
			$this->form_validation->set_rules('subjek', 'Subjek', 'required');
			$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		}elseif($_POST['aktifitas']=='Telepon'){
			$this->form_validation->set_rules('penerima', 'Tujuan', 'required');
			$this->form_validation->set_rules('waktu', 'Waktu', 'required');
		}

		if ($this->form_validation->run()) {
			// echo 'Berhasil : ';
			$agr = $this->model->getData('agreements', array('NO_AGREEMENT' => $id))->result();
			$data = json_decode($agr[0]->AGR_AKTIVITAS, true);
			if (empty($data)) {
				$arr[0] = $_POST;
				$data = json_encode($arr);
				$this->model->update('agreements', array('AGR_AKTIVITAS' => $data), array('NO_AGREEMENT' => $id));
			} else {
				// echo 'berisi ';
				$data[count($data)] = $_POST;
				header('Content-type: application/json');
				echo json_encode($data);
				$this->model->update('agreements', array('AGR_AKTIVITAS' => json_encode($data)), array('NO_AGREEMENT' => $id));
			}
			// var_dump($data);
		} else {
			echo 'salah';
		}
	}

	public function getActivity($id)
	{
		$agr = $this->model->getData('agreements', array('NO_AGREEMENT' => $id))->result();
		$data = json_decode($agr[0]->AGR_AKTIVITAS, true);
			// var_dump($data);
			if(empty($data)){
				// echo "<small class='text-secondary'>masih belum ada aktivitas</small>";
				echo "  
				<tr>
				<td></td>
				<td class='text-secondary'><small>masih belum ada aktivitas</small></td>
				</tr>";
			}else{
				var_dump($data[0]['icon']);
				for ($i=count($data)-1; $i >= 0 ; $i--) { 
					$link = $id.'/'.$i;
					if($data[$i]['aktifitas']=='Instruksi'){
						echo "
							<tr>
							<td class='text-center'>
								<br>".$data[$i]['icon']."
							</td>
							<td>
								<!-- <span class='float-right'><small>Tinggi </small></span> -->
								<a href='".base_url("agreement/delete_activity/$link")."' class='float-right'><i class='ti-trash text-dark'></i></a>
								<p class='m-0'><small class='activity'>Subjek :</small></p>
								<p class='m-0'><small> ".$data[$i]['subjek']."</small></p>
								<p class='m-0'>".date('Y-m-d H:i', strtotime($data[$i]['waktu']))."</p>
								<a href='#' style='color: black;'><i class='ti-angle-down float-right show-deskripsi'></i></a>
								<small class='float-left'><span class='activity'>Prioritas :</span>".$data[$i]['prioritas']."</small>
								<small class='table-deskripsi'>
									<p class='activity m-t-20'>Deskripsi :</p>
									<p class='text-justify'>".$data[$i]['deskripsi']."</p>
								</small>
							</td>
						</tr>";
					}elseif($data[$i]['aktifitas']=='Telepon'){
						var_dump($data[$i]);
						echo "                                            
						<tr>
						<td class='text-center'><br>
							".$data[$i]['icon']."</i>
						</td>
						<td>
							<a href='".base_url("agreement/delete_activity/$link")."' class='float-right'><i class='ti-trash text-dark' id='delete-activity'></i></a>
							<p class='m-0'><small class='activity'>Penerima :</small></p>
							<p class='m-0'><small> ".$data[$i]['penerima']."</small></p>
							<p class='m-0'>".date('Y-m-d H:i', strtotime($data[$i]['waktu']))."</p>
							<a href='#' style='color: black;'><i class='ti-angle-down float-right show-deskripsi'></i></a>
							<small class='float-left'><span class='activity'>Tujuan :</span>".$data[$i]['tujuan']."</small>
							<small class='table-deskripsi'>
								<p class='activity m-t-20'>Deskripsi :</p>
								<p class='text-justify'>".$data[$i]['deskripsi']."</p>
							</small>
						</td>
					</tr>";
					}
				}
			}
				
	}
	public function delete_activity($id,$index)
	{
		// echo $id.'<br>'.$index;
		$agr = $this->model->getData('agreements', array('NO_AGREEMENT' => $id))->result();
		$data = json_decode($agr[0]->AGR_AKTIVITAS, true);
		unset($data[$index]);
		$data = array_values($data);	
		$this->model->update('agreements', array('AGR_AKTIVITAS' => json_encode($data)), array('NO_AGREEMENT' => $id));
		redirect("agreement/edit/$id");
	}
}
