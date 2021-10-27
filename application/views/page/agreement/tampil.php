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
                        <h3 class="text-themecolor"> Agreement</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"> Agreement</li>
                        </ol>
                    </div>
                </div>
                <!-- Start Content -->
                <?php 
                if (!empty($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                } 
                ?>
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-6 float-right">
                            <div class="input-group">
                                <input type="text" class="form-control" id="exampleInputuname3">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="<?= base_url() ?>agreement/tambah" class="btn btn-secondary "> <i class="mdi mdi-account-plus"></i> Tambah</a>
                                    <!-- <a href="<?= base_url() ?>pengguna/tambah" class="btn btn-secondary "> <i class="fa fa-trash"></i> hapus</a> -->
                                </div>
                            </div>
                        </div>
                        <h3>Tabel DaftarAgreement </h3>
                        <hr>
                        <div class="table-responsive m-t-40">
                            <table class="table striped m-b-20">
                                <thead>
                                    <tr>
                                        <th width=50>#</th>
                                        <th>Nomor Agreement</th>
                                        <th>Pelanggan</th>
                                        <th>Tipe Periode</th>
                                        <th>Status</th>
                                        <th>Tanggal Agreement</th>
                                        <th>Jenis Pembayaran</th>
                                        <th>Rekening</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 0 ?>
                                    <?php foreach ($agreement as $agr) : ?>
                                        <tr>
                                            <td><?= ++$num ?></td>
                                            <td><a href=<?= base_url('agreement/edit/'.$agr->NO_AGREEMENT) ?>><?= $agr->NO_AGREEMENT ?></td>
                                            <td><?= $agr->NAMA_PELANGGAN ?></td>
                                            <td><?= $agr->TIPE_PERIODE ?></td>
                                            <td><?= $agr->CRM_STATUS ?></td>
                                            <td><?= $agr->TANGGAL_AGREEMENT ?></td>
                                            <td><?= $agr->JENIS_TAGIHAN ?></td>
                                            <td><?= $agr->REKENING ?> - <?= $agr->AKUN_BANK ?></td>
                                        </tr>
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