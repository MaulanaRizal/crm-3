<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_menu', 'model');
    }

    public function createTree($data,$parent)
		{
			foreach ($data as $node) {
				if ($node->MEN_ID_MENU == $parent) {
					$tree[] = array(
						'nama'  => $node->NAMA_MENU,
                        'icon'  => $node->ICON,
                        'link'  => base_url($node->LINK),
						'child' => $this->createTree($data, $node->ID_MENU)
					);
				}
			} if(isset($tree)){
				return $tree;
			}
		}

    public function index()
	{
		
		$nav = $this->model->getTable('Menus')->result();
		$tree = $this->createTree($nav,null);
		$data['tree']	    = json_encode($tree);
		$data['menus'] 	    = $this->model->getTable('Menus')->result();
		$data['roles'] 	    = $this->model->getTable('Roles')->result();
		$data['accesses']	= $this->model->getTable('role_menu')->result();
        $data['title']      = 'Manajemen Menu';
		$this->load->view('page/menu/menu',$data);
		// $this->load->view('awal',$data);
	}

    public function tambah()
    {
        if($_POST['parent'] and $_POST['menu'] and $_POST['link']){
            $data = array(
                'MEN_ID_MENU' => $_POST['parent'],
                'ICON'        => $_POST['icon'],
                'NAMA_MENU'   => $_POST['menu'],
                'LINK'        => $_POST['link']
            );
            $this->model->insert('menus', $data);
            $this->session->set_flashdata('success', 'Menu berhasil ditambah.');

        }else{
            $this->session->set_flashdata('failed', 'Terjadi kesalahan silahkan coba masukan data menu lagi.');
        }
        redirect('menu');
    }

    public function deleteMenu($id)
    {
        $this->model->delete($id);
        $this->session->set_flashdata('success', 'Menu berhasil dihapus dari sistem.');
        redirect('menu');
    }
    public function edit($id)
    {
        $where = array(
            'ID_MENU' => $id
        );
        $data['title'] = "Edit Menu";
        $data['data'] = $this->model->getData('Menus', $where)->result();
        $data['menu'] = $this->model->getTable('Menus')->result();
        $this->load->view('page/menu/edit', $data);
    }
    public function update($id)
    {
        $data = array(
            'MEN_ID_MENU' => $_POST['parent'],
            'ICON'        => $_POST['icon'],
            'NAMA_MENU'   => $_POST['menu'],
            'LINK'        => $_POST['link']
        );
        $this->model->update('menus', $data, $id);
        $this->session->set_flashdata('success', 'Data berhasil diubah');
        redirect('menu');
        // echo 'Tidak Tersedia';		
    }
    public function updateAccess()
    {
        var_dump($_POST);
        $this->model->deleteAll('role_menu');
        foreach ($_POST['user'] as $role => $menus) {
            // echo '<br>masuk ' . $role . '<br>';
            // var_dump($menus);
            foreach ($menus as $menu) {
                echo '<br>' . $menu;
                $data = array(
                    'ID_ROLE' => $role,
                    'ID_MENU' => $menu
                );
                // $result = $this->model->getData('role_menu',$data)->num_rows();
                $this->model->insert('role_menu', $data);
            }
        }
        $this->session->set_flashdata('success', 'Pengaturan menu berhasil disimpan.');
        redirect('menu');
    }
    public function sidenav()
    {
        $this->session->set_userdata('role','admin');
        $data['awal'] = 'awal';
        $data['tree'] = $this->createTree($this->model->getTable('Menus')->result(),null);
    
        $this->load->view('awal',$data);
    }
}
