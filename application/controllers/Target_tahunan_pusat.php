<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Target_tahunan_pusat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_target_tahunan_pusat', 'model');
    }
    public function index()
    {
        $periode = date('Y');
        $target = $this->model->getData('target_periode', array('PERIODE' => $periode));
        // var_dump($target->num_rows());
        if($target->num_rows()==0){
            $this->model->insert('target_periode',array('PERIODE'=>$periode));
        }
        $this->set_SBU($periode);
        // echo 'sudah jadi';
        $data['saleses'] = $this->model->getSalesSBU($periode)->result();
        $data['sbus']    = $this->model->sbuannual($periode)->result();
        $data['target']  = $this->model->getData('target_periode', array('PERIODE' => $periode))->result();
        $data['annual']  = $this->model->getPeriode()->result();
        $data['title']   = 'Target Tahunan SB Pusat Periode' . $periode;
        $data['period']  = $periode;
        $data['list']    = $this->model->getTable('target_periode')->result();
        $this->load->view('page/target tahunan/annual_pusat', $data);
    }

    public function insert()
    {
        var_dump($_POST);
        $this->form_validation->set_rules('nominal', 'Nominal', 'required', array(
            'required' => 'Input yang dimasukan tidak dapat diubah menjadi angka'
        ));
        $nominal = str_replace('Rp. ', '', $_POST['nominal']);
        $nominal = str_replace('.', '', $nominal);
        $nominal = str_replace(',00', '', $nominal);
        $int_nominal = (int)$nominal;
        // echo $_POST['nominal'];
        // echo is_int($int_nominal);
        if ($int_nominal == 0 or $_POST['nominal'] == 'Rp. 0,00') {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>Gagal!</strong> Input yang dimasukan tidak valid.</div>");
            $this->index();
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>Berhasil!</strong>Target tahunan untuk SBU " . $_POST['sbu'] . ", berhasil diubah</div>");
            $this->model->update('annual_target', array('ANNUAL_TARGET' => $int_nominal), array('ID_ANNUAL' => $_POST['id_annual']));
            if ($_POST['tahun_periode'] == null) {
                // echo 'masuk index';
                redirect('target_tahunan_pusat');
            } else {
                // echo 'tidak masuk index';
                redirect('target_tahunan_pusat/periode/' . $_POST['periode']);
            }
        }
    }

    public function set_SBU($periode)
    {
        $SBU      = $this->model->getTable('sbu');
        $ANNUAL   = $this->model->getData('annual_target', array('PERIODE' => $periode));
        $tables         = $this->model->sbuannual($periode)->result();
        if ($ANNUAL->num_rows() == 0) {
            foreach ($tables as $table) {
                $data = array(
                    'PERIODE' => $periode,
                    'SBU'    => $table->ID_SBU
                );
                $this->model->insert('annual_target', $data);
            }
        } else {
            // echo json_encode($tables);
            foreach ($tables as $table) {
                if (!isset($table->PERIODE)) { // bila colom periode kosong maka true 
                    $data = array(
                        'PERIODE' => $periode,
                        'SBU'    => $table->ID_SBU
                    );
                    $this->model->insert('annual_target', $data);
                }
            }
        }
    }

    public function periode($periode)
    {
        $target = $this->model->getData('target_periode', array('PERIODE' => $periode));
        // var_dump($target->num_rows());
        if($target->num_rows()==0){
            $this->model->insert('target_periode',array('PERIODE'=>$periode));
        }
        $this->set_SBU($periode);
        // echo 'tidak masuk';
        $data['saleses'] = $this->model->getSalesSBU($periode)->result();
        $data['sbus']    = $this->model->sbuannual($periode)->result();
        $data['target']  = $this->model->getData('target_periode', array('PERIODE' => $periode))->result();
        $data['annual']  = $this->model->getPeriode()->result();
        $data['title']   = 'Target Tahunan SB Pusat Periode' . $periode;
        $data['period'] = $periode;
        $data['list']    = $this->model->getTable('target_periode')->result();
        $this->load->view('page/target tahunan/annual_pusat', $data);
    }

    public function addPeriode()
    {
        // form valiation
        $this->form_validation->set_rules('tahun_periode','Tahun Periode','required|is_unique[target_periode.PERIODE]');
        $this->form_validation->set_rules('check','Check','required');
        if($this->form_validation->run()){
            var_dump($_POST);
            $this->model->insert('target_periode',array('PERIODE'=>$_POST['tahun_periode']));
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Periode tahun " . $_POST['tahun_periode'] . " berhasil ditambahkan</div>");
            redirect('target_tahunan_pusat/periode/'.$_POST['tahun_periode']);
        }else{
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Terjadi kesalahan, silahkan coba input kembali.</div>");
            redirect('target_tahunan_pusat');
        }
    }

    public function delete()
    {
        var_dump($_POST);
        // form validation
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', array('required' => 'terjadi kesalahan'));

        // process delete
        if ($_POST['tahun'] == date('Y')) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'><strong>Gagal!</strong>Periode sedangberlangsung</div>");
            redirect('target_tahunan_pusat');
        } else {
            // $this->model->delete('annual_target', array('PERIODE' => $_POST['tahun']));
            $this->model->delete('target_periode', array('PERIODE' => $_POST['tahun']));
            $this->session->set_flashdata('message', "<div class='alert alert-success'><strong>Berhasil!</strong>Periode tahun " . $_POST['tahun'] . " berhasil di hapus</div>");
            redirect('target_tahunan_pusat');
        }
    }

    public function add_periode()
    {
        # code...
        var_dump($_POST);
        // form_validation
        $this->form_validation->set_rules('target', 'Nominal Target', 'required');
        $this->form_validation->set_rules('terbilang', 'Terbilang ', 'required');
        $this->form_validation->set_rules('check-target', 'Check Nominal Sudah Benar', 'required');
        if ($this->form_validation->run()) {
            $nom = $_POST['target'];
            echo '<br><br><br>';
            $nom = str_replace('Rp. ', '', $nom);
            $nom = str_replace(',00', '', $nom);
            $nom = str_replace('.', '', $nom);
            var_dump(intval($nom));
            $data = array(
                'NOMINAL'   => $nom,
                'TERBILANG' => $_POST['terbilang'],
                'PERIODE'   => $_POST['periode']
            );
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Target berhasil ditetapkan.</div>");
            $this->model->update('target_periode', $data,array ('PERIODE'=>$_POST['periode']));
            redirect('target_tahunan_pusat/periode/' . $_POST['periode']);
            // echo ' Berhasil Masuk';
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Terjadi kesalahan, silahkan coba input kembali.</div>");
            redirect('target_tahunan_pusat');
        }
    }
}
