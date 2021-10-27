<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Npwp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_npwp', 'model');
    }
    public function index()
    {
        $npwp = $this->model->getTable('npwp');
        $config = pagination('http://localhost/crm/npwp/index/',$npwp->num_rows(),10);
        $this->pagination->initialize($config);
        $data['start']	= $this->uri->segment(3);
        $data['title'] = 'NPWP';
        $data['npwp'] 	= $this->model->daftarNpwp($config['per_page'],$data['start'])->result();
        // $data['npwp'] = $this->model->daftarNpwp()->result();
        $this->load->view('page/npwp/tampil', $data);
    }
    public function tambah()
    {
        $data['opportunity'] = $this->model->getTable('opportunities')->result();
        $data['npwp'] = $this->model->getTable('npwp')->result();
        $data['title'] = 'Tambah NPWP';
        $this->load->view('page/npwp/tambah', $data);
    }
    public function insert()
    {
        var_dump($_POST);
        // form validation
        $this->form_validation->set_rules('no_pajak', 'Nomor Pajak', 'required');
        $this->form_validation->set_rules('pemilik', 'Pemilik NPWP', 'required|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'max_length[1000]');
        if ($this->form_validation->run() == true) {
            if (empty($_POST['isPrimary'])) {
                $check = 'no';
            } else {
                $check = 'yes';
            }
            if ($_POST['npwp_terkait'] == '') {
                $npwp_terkait = null;
            } else {
                $npwp_terkait = $_POST['npwp_terkait'];
            }
            $data = array(
                'NO_PAJAK'      =>  $_POST['no_pajak'],
                'ID_OPPORTUNITY' =>  $_POST['pemilik'],
                'NAMA_NPWP'     =>  $_POST['nama'],
                'NPWP_TERKAIT'  =>  $npwp_terkait,
                'IS_PRIMARY'    =>  $check,
                'ALAMAT'        =>  $_POST['alamat'],
            );
            $this->model->insert('npwp', $data);
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Berhasil Menambahkan data NPWP baru.</div>");
            redirect('npwp');
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Terjadi masalah coba lagi</div>");
            redirect('npwp');
        }
    }
    public function delete($id)
    {
        $this->session->set_flashdata('message', "<div clas  ='alert alert-danger'>Data NPWP berhasil dihapus</div>");
        $data = $this->model->getData('npwp', array('ID_NPWP' => $id))->result();
        log_message('info', json_encode($data));
        // echo "<script>console.log(".json_encode($data).");</script>";
        $this->model->delete('npwp', array('ID_NPWP' => $id));
        redirect('npwp');
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('no_pajak', 'Nomor Pajak', 'required');
        $this->form_validation->set_rules('pemilik', 'Pemilik NPWP', 'required|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'max_length[1000]');
        // $data['title'] = 'Edit Data NPWP';
        // $data['npwp'] = $this->model->getTable('npwp')->result();
        
        $data['data'] = $this->model->getData('npwp',array ('ID_NPWP' => $id))->result();
        $data['opportunity'] = $this->model->getTable('opportunities')->result();
        $data['npwp'] = $this->model->getTable('npwp')->result();
        $data['title'] = 'Tambah NPWP';
        $this->load->view('page/npwp/edit',$data);
    }
    public function update($id)
    {
        // form validation
        $this->form_validation->set_rules('no_pajak', 'Nomor Pajak', 'required');
        $this->form_validation->set_rules('pemilik', 'Pemilik NPWP', 'required|integer');
        $this->form_validation->set_rules('alamat', 'Alamat', 'max_length[1000]');
        if ($this->form_validation->run() == true) {
            if (empty($_POST['isPrimary'])) {
                $check = 'no';
            } else {
                $check = 'yes';
            }
            if ($_POST['npwp_terkait'] == '') {
                $npwp_terkait = null;
            } else {
                $npwp_terkait = $_POST['npwp_terkait'];
            }
            $data = array(
                'NO_PAJAK'      =>  $_POST['no_pajak'],
                'ID_OPPORTUNITY' =>  $_POST['pemilik'],
                'NAMA_NPWP'     =>  $_POST['nama'],
                'NPWP_TERKAIT'  =>  $npwp_terkait,
                'IS_PRIMARY'    =>  $check,
                'ALAMAT'        =>  $_POST['alamat'],
            );
            $this->model->update('npwp', $data,array ('ID_NPWP' => $id));
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Berhasil Menambahkan data NPWP baru.</div>");
            redirect('npwp');
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Terjadi masalah coba lagi</div>");
            redirect('npwp');
        }
        
    }
}
