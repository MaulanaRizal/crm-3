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
                        <h3 class="text-themecolor">Pengguna</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <?php if (!empty($_SESSION['message'])) { ?>
                    <div class="alert alert-success">
                        <strong> Berhasil! </strong><?= $_SESSION['message'] ?>.
                    </div>
                <?php unset($_SESSION['message']);
                } ?>
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-6 float-right">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputuname3">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="<?= base_url() ?>pengguna/tambah" class="btn btn-secondary "> <i class="mdi mdi-account-plus"></i> Tambah</a>
                                    <!-- <a href="<?= base_url() ?>pengguna/tambah" class="btn btn-secondary "> <i class="fa fa-trash"></i> hapus</a> -->
                                </div>
                            </div>
                        </div>
                        <h3>Table User </h3>
                        <span>Table kelola user crm icon+</span>

                        <hr>
                        <div class="table-responsive m-t-40">
                            <table class="table striped m-b-20">
                                <thead>
                                    <tr>
                                        <th width=50>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>SBU</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num ?>
                                    <?php foreach ($user as $data) { ?>
                                        <tr>
                                            <td><?= ++$start ?></a></td>
                                            <td><a href="<?= base_url() ?>pengguna/edit/<?= $data->ID_USER ?>"><?= $data->NAMA_LENGKAP ?></a></td>
                                            <td><?= $data->CRM_EMAIL ?></td>
                                            <td><?= $data->SBU_REGION ?></td>
                                            <td><?= $data->CRM_ROLE ?></td>
                                            <td><?php if ($data->CRM_STATUS == 1) { ?>
                                                    <label class="label label-success">active</label>
                                                <?php } else { ?>
                                                    <label class="label label-danger">non-active</label>

                                                <?php } ?>
                                            </td>

                                            <td>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#hapus<?= $start ?>">
                                                <i class="fa fa-trash"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="hapus<?= $start ?>">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Peringatan!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Tindakan penghapusan bersifat permanen atau data yang sudah dihapus tidak akan bisa kembali, apakah anda yakin ingin menghapus Pengguna <u><?= $data->NAMA_LENGKAP ?></u> ?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <a href="<?= base_url() ?>pengguna/delete/<?= $data->ID_USER ?>" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
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