<?php $this->load->view('template/head'); ?>

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
                        <h3 class="text-themecolor">NPWP</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">NPWP</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <?php if (!empty($_SESSION['message'])) { ?>
                    <?= $_SESSION['message'] ?>
                <?php unset($_SESSION['message']);
                } ?>
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-6 float-right">
                            <div class="input-group">
                                <div class="input-group-append">
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputuname3">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="<?= base_url() ?>npwp/tambah" class="btn btn-secondary "> <i class="fa fa-plus"></i> Tambah</a>
                                    <!-- <a href="<?= base_url() ?>pengguna/tambah" class="btn btn-secondary "> <i class="fa fa-trash"></i> hapus</a> -->
                                </div>
                            </div>
                        </div>
                        <h3>Daftar NPWP</h3>
                        <span>Daftar NPWP pelanggan </span>
                        <hr>
                        <div class="table-responsive ">
                            <table class="table striped">
                                <thead>
                                    <tr>
                                        <th width=50>#</th>
                                        <th>Nama NPWP</th>
                                        <th width=130>No Pajak</th>
                                        <th>Topic</th>
                                        <th>Pelanggan</th>
                                        <th width=50>NPWP Utama</th>
                                        <th style="width: 30%;">Alamat</th>
                                        <th width=100>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 0 ?>
                                    <?php foreach ($npwp as $n) : ?>
                                        <tr>
                                            <td><?= ++$num ?></td>
                                            <td><a href="<?= base_url('npwp/edit/'.$n->ID_NPWP) ?>"><?= $n->NAMA_NPWP ?></a></td>
                                            <td><?= $n->NO_PAJAK ?></td>
                                            <td><?= $n->TOPIC ?></td>
                                            <td><?= $n->NAMA_PELANGGAN ?></td>
                                            <td class='text-center'>
                                                <?php if ($n->IS_PRIMARY == 'yes') : ?>
                                                    <i class='fa fa-check'></i>
                                                <?php else : ?>
                                                    <b>-</b>
                                                <?php endif ?>
                                            </td>
                                            <td><?= $n->ALAMAT ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $num ?>"><i class='fa fa-trash fa-sm'></i></button>
                                            </td>
                                        </tr>

                                        <!-- Modal Hapus -->
                                        <div class="modal fade" id="hapus<?= $num ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan !</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                        Apakah anda yakin ingin menghapus <?= $n->NAMA_NPWP ?>dari daftar daftar NPWP?
                                                        </p>
                                                        <p>
                                                        Penghapusan ini bersifat permanent dan tidak bisa dikembalikan lagi.
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="<?= base_url('npwp/delete/'.$n->ID_NPWP) ?>" class='btn btn-danger'>Hapus</a>
                                                        <!-- <button type="button" class="btn btn-danger">Hapus</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>

                </div>
            </div>
            <footer class="footer">
                © 2019 Material Pro Admin by wrappixel.com
            </footer>
        </div>
        <!-- /content -->
        <?php $this->load->view('template/jquery'); ?>

</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:12:10 GMT -->

</html>