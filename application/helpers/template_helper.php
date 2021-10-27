<?php
function generateTree($data, $parent)
{
    foreach ($data as $node) {
        if ($node->MEN_ID_MENU == $parent) {
            $tree[] = array(
                'id'    => $node->ID_MENU,
                'nama'  => $node->NAMA_MENU,
                'icon'  => $node->ICON,
                'link'  => base_url($node->LINK),
                'child' => generateTree($data, $node->ID_MENU)
            );
        }
    }
    if (isset($tree)) {
        return $tree;
    }
}

function generateMenu($child,$acs)
{
    echo "<ul aria-expanded='false' class='collapse'>";
    foreach ($child as $node) {
        foreach($acs as $i){
            if (isset($node['child']) and $i==$node['id']) {
                echo $acs .'-'.$node['id'];
                echo "<li><a class='has-arrow'  href=" . $node['link'] . " aria-expanded='false' >" . $node['nama'] . "</a>";
                generateMenu($node['child'],$acs);
                echo "</li>";
            } elseif($i==$node['id']) {
                echo "<li ><a href=" . $node['link'] . " aria-expanded='false' >" . $node['nama'] . "</a></li>";
            }
        }
        // var_dump($node);
    }
    echo '</ul>';
}

function sideNav()
{
    $CI = get_instance();
    $CI->load->model('m_menu', 'menu');
    $trees = $CI->menu->getTable('Menus')->result();
    $where = array(
        'ID_ROLE' => $_SESSION['ID_ROLE']
    );
    $access = $CI->menu->getData('role_menu', $where)->result();
    $tree = generateTree($trees, null);
    foreach ($access as $i) {
        // echo $i->ID_MENU.'<br>';
        $show[] = $i->ID_MENU;
    }

    echo '<li>' . "<a class='waves-effect waves-dark' href=" . $tree[0]['link'] . " aria-expanded='false'>" . $tree[0]['icon'] . "<span class='hide-menu'>" . $tree[0]['nama'] . "</span></a>" . '</li>';
    if ($tree[0]['child'] != null) {
        foreach ($show as $i) {
            foreach ($tree[0]['child'] as $node) {
                if ($node['id'] == $i) {
                    if ($node['child'] != null) {
                        echo "<li> <a class='has-arrow waves-effect waves-dark' href='" . $node['link'] . "' aria-expanded='false'>" . $node['icon'] . "</i><span class='hide-menu'>" . $node['nama'] . "</span></a>";
                        generateMenu($node['child'],$show);
                    } else {
                        echo "<li> <a class='waves-effect waves-dark' href='" . $node['link'] . "' aria-expanded='false'>" . $node['icon'] . "</i><span class='hide-menu'>" . $node['nama'] . "</span></a>";
                    }
                }
            }
        }
    }
}

function pagination($link, $rows, $page)
{
    $config['base_url']     = $link;
    $config['total_rows']   = $rows;
    $config['per_page']     = $page;
    $config['num_links']    = 1;

    // Styling Paginatition
    // tag open and close
    $config['full_tag_open']    = "<nav><ul class='pagination justify-content-center'>";
    $config['full_tag_close']   = '</ul></nav>';

    // First Link
    // $config['first_link']       = true;
    $config['first_link']        = "pertama"; // edit text first
    $config['first_tag_open']    = "<li class='page-item'>";
    $config['first_tag_close']   = "</li>";

    // Last Link
    // $config['last_link']         = FALSE;
    $config['last_link']         = "last"; // edit text last
    $config['last_tag_open']     = "<li class='page-item'>";
    $config['last_tag_close']    = "</li>";

    // Next Link
    $config['next_link']        = "selanjutnya"; // edit text last
    $config['next_tag_open']    = "<li class='page-item'>";
    $config['next_tag_close']   = "</li>";
    

    // Previous Link
    $config['prev_link']        = "sebelumnya"; // edit text last
    $config['prev_tag_open']    = "<li class='page-item'>";
    $config['prev_tag_close']   = "</li>";
    
    // Current Page
    $config['cur_tag_open']     = "<li class='page-item active'><a class='page-link' href='#'>";
    $config['cur_tag_close']    = "</a></li>";

    $config['attributes'] = array('class' => 'page-link');

    return $config;
}

