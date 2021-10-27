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
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Daftar Produk</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->

                <div class="card">
                    <div class="card-body table-responsive">
                        <a href="<?= base_url('produk/tambah') ?>" class="btn btn-secondary float-right"> <i class="mdi mdi-plus"></i> Tambah Produk</a>
                        <h2>Daftar Produk</h2>
                        <hr>
                        <table class="table striped">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Sekali Pakai</th>
                                <th>Awal Penggunaan</th>
                                <th>Akhir Penggunaan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                            <?php $i = 1 ?>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td> <a href="<?= base_url('produk/edit/' . $product->ID_PRODUCT) ?>"> <?= $product->NAMA_PRODUCT ?></a></td>
                                    <?php if ($product->SEKALI_PAKAI == 'on') : ?>
                                        <td><i class="mdi mdi-check"></i></td>
                                    <?php else : ?>
                                        <td><i class="mdi mdi-close"></i></td>
                                    <?php endif ?>
                                    <?php if ($product->AWAL_PENGGUNAAN != '0000-00-00') : ?>
                                        <td><?= $product->AWAL_PENGGUNAAN ?></i></td>
                                    <?php else : ?>
                                        <td>-</i></td>
                                    <?php endif ?>
                                    <?php if ($product->AKHIR_PENGGUNAAN != '0000-00-00') : ?>
                                        <td><?= $product->AKHIR_PENGGUNAAN ?></td>
                                    <?php else : ?>
                                        <td>-</td>
                                    <?php endif ?>
                                    <td>Rp. <?= number_format($product->HARGA_DEFAULT, 2, ",", ".") ?></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal<?=$i?>">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal<?=$i?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Peringatan!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Data produk yang dihapus bersifat permanen dan tidak bisa dikembalikan.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('produk/delete/' . $product->ID_PRODUCT) ?>" class="btn btn-danger">Hapus</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>

                <!-- End Content -->
            </div>
            <footer class="footer">
                © 2019 Material Pro Admin by wrappixel.com
            </footer>
        </div>
        <?php $this->load->view('template/jquery'); ?>
        <script>

        </script>
</body>

</html>