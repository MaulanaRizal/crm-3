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
                        <h3 class="text-themecolor">Opportunity</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)"> <i class="fa fa-home"></i> Dashboard</a></li>
                            <li class="breadcrumb-item active">Opportunity</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-6 float-right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="exampleInputuname3">
                                        <div class="input-group-append">
                                            <button class="btn btn-secondary" name="button">
                                                <i class="fa fa search"></i>
                                            </button>
                                            <a href="<?= base_url() ?>opportunity/tambahOpportunity" class="btn waves-effect waves-light btn-primary float-right"><i class="mdi mdi-account-plus"></i> Tambah</a>
                                        </div>
                                    </div>
                                </div>
                                <h3>Table Opportunity</h3>
                                <span>Table kelola opportunity crm icon+</span>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table striped m-b-20">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Topic</th>
                                                <th>No Opportunity</th>
                                                <th>Tipe Survey</th>
                                                <th>Pendapatan</th>
                                                <th>Anggaran</th>
                                                <th>Proses Pemesanan</th>
                                                <th>Kategori</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $num = 1;
                                            foreach ($opportunities as $data) { ?>
                                                <tr style="text-align: left">
                                                    <td><?= $num ?></td>
                                                    <td><?= $data->TOPIC ?></td>
                                                    <td><a href="<?= base_url('opportunity/edit/'.$data->ID_OPPORTUNITY) ?>"><?= $data->NO_OPPORTUNITY ?></a></td>
                                                    <td><?= $data->TIPE_SURVEY ?></td>
                                                    <td>Rp. <?= number_format($data->PENDAPATAN , 2, ",", ".") ?></td>
                                                    <td>Rp. <?= number_format($data->ANGGARAN , 2, ",", ".") ?></td>
                                                    <td><?= $data->PROSES_PEMESANAN ?></td>
                                                    <td><?= $data->KATEGORI ?></td>
                                                    <td style="width: 400px;"><?= $data->DESKRIPSI ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash"></i></a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="hapus" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Data yang terhapus tidak akan bisa dikembalikan lagi, apakah anda yakin?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                        <button type="button" class="btn btn-danger">Hapus</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            <?php $num++;
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


        <?php $this->load->view('template/jquery'); ?>




        </script>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:12:10 GMT -->

</html>