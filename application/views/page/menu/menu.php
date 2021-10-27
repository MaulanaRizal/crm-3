<?php $this->load->view('template/head', $title); ?>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <?php $this->load->view('template/navbar'); ?>
        <?php $this->load->view('template/sidenav'); ?>

        <!-- content -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Manajemen Menu</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-home"></i>Dashboard</a></li>
                            <li class="breadcrumb-item active">Manajemen Menu</li>
                        </ol>
                    </div>
                </div>

                <!-- START content -->
                <?php if (!empty($_SESSION['success'])) : ?>
                    <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                <?php endif ?>
                <?php if (!empty($_SESSION['failed'])) : ?>
                    <div class="alert alert-danger"><?= $_SESSION['failed'] ?></div>
                <?php endif ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h3>Navigation</h3>
                                <hr>
                                <div id='navigation'></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-info float-right" data-toggle="modal" data-target="#tambahMenu"><i class="fa fa-plus"></i> Tambah</button>

                                <div class="modal fade " id="tambahMenu" tabindex="-1" role="dialog"">
                                    <div class=" modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Menu</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url() ?>menu/tambah" method="post">
                                                <div class="form-group">
                                                    <label for="icon" class="control-label">Nama Menu <span class="require">*</span>: </label>
                                                    <div class="from-group">
                                                        <select name="icon" name=icon id="icon" class="col-md-3 form-control " onchange="showIcon()">
                                                            <option value="">icon</option>
                                                            <option value="<i class='mdi mdi-clipboard-text'></i>">Dokumen</option>
                                                            <option value="<i class='mdi mdi-account'></i>">Akun</option>
                                                            <option value="<i class='mdi mdi-chart-bar'></i>">Grafik</option>
                                                            <option value="<i class='mdi mdi-settings'></i>">Gear</option>
                                                            <option value="<i class='fas fa-building'></i>">Building</option>
                                                        </select>
                                                        &nbsp;
                                                        <input type="text" class="form-control col-md-8" onkeyup="showMenu()" name=menu id="menu" required>
                                                    </div>
                                                    <br>
                                                    <div class="row form-group justify-content-center">
                                                        <div class="col-md-1 " id="showIcon"></div>
                                                        <p id="showMenu"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="link" class="control-label">Link<span class="require">*</span>:</label>
                                                    <input type="text" class="form-control" id="link" name="link" onkeyup="showLink()" required>
                                                    <br>
                                                    <br>
                                                    <div class="row form-group justify-content-center">
                                                        <p class="col-md-12" id="showLink"></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="control-label">Parent Menu<span class="require">*</span>:</label>
                                                    <select name="parent" required class="form-control" id="">
                                                        <option value="">Pilih parent menu...</option>
                                                        <?php foreach ($menus as $select) { ?>
                                                            <option value="<?= $select->ID_MENU ?>">
                                                                <?= $select->NAMA_MENU ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <h3>Tabel Menu</h3>
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>Menu Name</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    $num = 1;
                                    foreach ($menus as $table) : ?>
                                        <tr>
                                            <td><?= $num ?></td>
                                            <td><a href="#"><?= $table->ICON . " " . $table->NAMA_MENU ?></a></td>
                                            <td>
                                                <?php if (empty($table->MEN_ID_MENU)) : ?>
                                                    <a href="<?= base_url('menu/edit/' . $table->ID_MENU) ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <?php else : ?>
                                                    <a href="<?= base_url('menu/edit/' . $table->ID_MENU) ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapusMenu-<?= $table->ID_MENU ?>"><i class="fa fa-trash"></i></button>
                                                <?php endif ?>
                                                <!-- Modal Hapus -->
                                                <div class="modal fade" id="hapusMenu-<?= $table->ID_MENU ?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>
                                                                    Apakah anda yakin ingin menghapus menu <strong><?= $table->NAMA_MENU ?></strong> dari sistem? penghapusan ini bersifat permanentdan tidak bisa di kembalikan.
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url('menu/deleteMenu/' . $table->ID_MENU) ?>" class="btn btn-danger">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal Hapus -->
                                            </td>
                                        </tr>
                                    <?php $num++;
                                    endforeach ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?= base_url('menu/updateAccess') ?>" method="post">

                                <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"></i> Submit</button>
                                <h3>Tabel Akses Pengguna</h3>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table ">
                                        <tr>
                                            <th>Menu</th>
                                            <?php foreach ($roles as $role) : ?>
                                                <th width=75px><?= $role->CRM_ROLE ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                        <?php foreach ($menus as $menu) : ?>
                                            <tr>
                                                <td><?= $menu->NAMA_MENU ?></td>
                                                <?php foreach ($roles as $role) : ?>
                                                    <td>
                                                        <?php foreach ($accesses as $access) {
                                                            if ($access->ID_ROLE == $role->ID_ROLE and $access->ID_MENU == $menu->ID_MENU) {
                                                                $check = true;
                                                            }
                                                        } ?>
                                                        <?php if (isset($check)) : ?>
                                                            <input type="checkbox" name="user[<?= $role->ID_ROLE ?>][]" id="<?= $menu->NAMA_MENU ?>_<?= $role->ID_ROLE ?>" value="<?= $menu->ID_MENU ?>" checked>
                                                            <label for="<?= $menu->NAMA_MENU ?>_<?= $role->ID_ROLE ?>"></label>
                                                        <?php else : ?>
                                                            <input type="checkbox" name="user[<?= $role->ID_ROLE ?>][]" id="<?= $menu->NAMA_MENU ?>_<?= $role->ID_ROLE ?>" value="<?= $menu->ID_MENU ?>">
                                                            <label for="<?= $menu->NAMA_MENU ?>_<?= $role->ID_ROLE ?>"></label>
                                                        <?php endif ?>
                                                    </td>
                                                <?php unset($check);
                                                endforeach ?>
                                            </tr>
                                        <?php endforeach ?>

                                    </table>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>

        <!-- footer -->
        <footer class="footer">
            © 2019 Material Pro Admin by wrappixel.com
        </footer>
        <!-- end footer -->
        <script src="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap-treeview-master/dist/bootstrap-treeview.min.js">
        </script>
        <script src="<?= base_url() ?>assets/material-pro/assets/plugins/bootstrap-treeview-master/dist/bootstrap-treeview-init.js">
        </script>

        <script>
            //  js for tambah Menu
            var toggler = document.getElementsByClassName("caret");
            var i;

            for (i = 0; i < toggler.length; i++) {
                toggler[i].addEventListener("click", function() {
                    this.parentElement.querySelector(".nested").classList.toggle("active");
                    this.classList.toggle("caret-down");
                });
            }

            function showIcon() {
                var value = document.getElementById('icon').value;

                document.getElementById('showIcon').innerHTML = value;
            }

            function showMenu() {
                var value = document.getElementById('menu').value;

                document.getElementById('showMenu').innerHTML = value;
            }

            function showLink() {
                var value = document.getElementById('link').value;

                document.getElementById('showLink').innerHTML = '<?= base_url() ?>' + value;
            }

            // JS for update menu

            // js fo navigation tree
            var tree = <?= $tree ?>;

            function viewTree(tree) {
                var show = '<ul>';
                var key;
                for (key in tree) {
                    show += '<li>' + tree[key]['nama'] + '</li>'
                    show += viewTree(tree[key]['child'])
                }
                show += '</ul>'
                return show;
            }
            document.getElementById('navigation').innerHTML = viewTree(tree);
            // document.getElementById('demo').innerHTML = tree['child'][0]['nama'];
        </script>
        <?php $this->load->view('template/jquery'); ?>