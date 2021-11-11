<?php $this->load->view('template/head'); ?>

<body class="fix-header fix-sidebar card-no-border">
    <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div> -->
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
                        <h3 class="text-themecolor">Kelola SBU</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kelola SBU</li>
                        </ol>
                    </div>

                </div>

                <?php if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                }?>

                <!-- Start Content -->


                <div class="row d-flex justify-content-center">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-6 float-right">
                                    <div class="input-group">
                                        <div class="input-group-append p-b-10">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="exampleInputuname3">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#tambahMenu"> <i class="mdi mdi-account-plus"></i> Tambah</a>
                                        </div>
                                    </div>
                                </div>
                                <h3>Table SBU</h3>
                                <span>Table kelola sbu crm icon+</span>
                                <hr>
                                <div class="table-responsive m-t-40">
                                    <table class="table striped m-b-20">
                                        <thead>
                                            <tr>
                                                <th width=50>#</th>
                                                <th>No SBU</th>
                                                <th>Wilayah SBU</th>
                                                <th width=500>Deskripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $num = 1;
                                            foreach ($sbu as $data) { ?>
                                                <tr>
                                                    <td><?= $num ?></td>
                                                    <td><?= $data->NO_SBU ?></td>
                                                    <td><?= $data->SBU_REGION ?></td>
                                                    <td><?= $data->DESKRIPSI ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $data->ID_SBU; ?>"><i class="fa fa-trash"></i></a>
                                                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal_edit<?= $data->ID_SBU ?>"><i class="fa fa-info"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $num++;
                                            } ?>
                                        </tbody>
                                    </table>
                                    <?php echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Content -->
            </div>
            <!-- End Container fluid  -->

            <!-- footer -->
            <footer class="footer">
                © 2019 Material Pro Admin by wrappixel.com
            </footer>
            <!-- End footer -->
        </div>
        <!-- /content -->

        <!-- Modal Tambah-->
        <div class="modal fade" id="tambahMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Tambah Data SBU</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form class="item" method="post" action="<?= base_url('sbu/tambah') ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">No SBU:</label>
                                <input type="text" class="form-control" id="no_sbu" name="no_sbu" value="<?php echo 'SBU-', $num ?>" readonly>
                            </div>
                            <div class="form-group <?= form_error('sbu_region') ? 'has-error' : null ?>">
                                <label for="recipient-name" class="control-label">Wilayah SBU <span class="require">*</span>:</label>
                                <input type="text" class="form-control" name="sbu_region" required >
                                <span id="sbu_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Deskripsi:</label>
                                <textarea class="form-control" rows=6 name="deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="tambah" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal tambah -->
    </div>
    <!-- modal edit -->
    <?php foreach ($sbu as $data) { ?>
        <div class="modal fade" id="modal_edit<?= $data->ID_SBU; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel1">Edit Data SBU</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="<?= base_url('sbu/ubah') ?>" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label">No SBU:</label>
                                <input type="text" class="form-control" name="sbu_region" value="<?= $data->NO_SBU ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Wilayah SBU:</label>
                                <input type="text" class="form-control" id="updateWilayah" name="sbu_region" value="<?= $data->SBU_REGION ?>" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Deskripsi:</label>
                                <textarea class="form-control" rows=6 name="deskripsi"><?= $data->DESKRIPSI ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sbu" value="<?php echo $data->ID_SBU ?>">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="edit" id="updateSBU">Simpan&nbsp;</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- end modal edit -->

    <!-- modal hapus -->
    <?php foreach ($sbu as $data) { ?>
        <div class="modal fade" id="modal_hapus<?= $data->ID_SBU; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Peringatan!</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url('sbu/hapus') ?>">
                        <div class="modal-body">
                            <p>Tidakan penghapusan bersifat permanen dan tidak dapat dikembalikan, apakah yakin ingin menghapus SBU Region <u><?= $data->SBU_REGION ?></u> ?</p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sbu" value="<?php echo $data->ID_SBU ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- end modal hapus -->

    <?php $this->load->view('template/jquery'); ?>
    <script type="text/javascript">
        $('#updateSBU').click(function() {
            console.log($('#updateWilayah'));
            console.log('ada');
        });
    </script>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:12:10 GMT -->

</html>