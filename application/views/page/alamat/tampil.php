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
                        <h3 class="text-themecolor">Alamat</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active">Alamat</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <?php if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>

                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-6 float-right">
                            <div class="input-group">
                                <input type="text" class="form-control" id="table-tampil">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <a href="<?= base_url() ?>alamat/tambah" class="btn btn-secondary "> <i class="mdi mdi-account-plus"></i> Tambah</a>
                                    <!-- <a href="<?= base_url() ?>pengguna/tambah" class="btn btn-secondary "> <i class="fa fa-trash"></i> hapus</a> -->
                                </div>
                            </div>
                        </div>
                        <h3>Table Alamat </h3>
                        <span>Table kelola alamat crm icon+</span>
                        <hr>
                        <div class="table-responsive m-t-40">
                            <table class="table striped m-b-20">
                                <thead>
                                    <tr>
                                        <th width=50>#</th>
                                        <th>Kode Alamat</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Tipe</th>
                                        <th>Provinsi</th>
                                        <th>Kabupaten</th>
                                        <th>Kecamatan</th>
                                        <th>Status</th>
                                        <th width=100>Action</th>
                                    </tr>
                                </thead>
                                <tbody id='table-content'>
                                    <?php $num = 1 ?>
                                    <?php foreach ($alamats as $alamat) : ?>
                                        <tr>
                                            <td><?= ++$start ?></td>
                                            <td> <a href="<?= base_url('alamat/edit/' . $alamat->ID_ADDRESS) ?>"><?= $alamat->NO_ADDRESS ?></a> </td>
                                            <td><?= $alamat->NAMA ?></td>
                                            <td><?= $alamat->KATEGORI ?></td>
                                            <td>
                                                <?php if ($alamat->TIPE == 'Terminating') : ?>
                                                    <label class="label label-danger">Terminating</label><br>
                                                <?php elseif ($alamat->TIPE == 'Originating') : ?>
                                                    <label class="label label-info">Originating</label>
                                                <?php endif ?>
                                            </td>
                                            <td><?= $alamat->PROVINSI; ?></td>
                                            <td><?= $alamat->KABUPATEN; ?></td>
                                            <td><?= $alamat->KECAMATAN; ?></td>
                                            <td>
                                                <?php if ($alamat->CRM_STATUS == 'Active') : ?>
                                                    <label class="label label-primary">Active</label><br>
                                                <?php else : ?>
                                                    <label class="label label-inverse">Inactive</label><br>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-<?= $alamat->ID_ADDRESS ?>"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>

                                        <!-- modalhapus -->
                                        <div class="modal fade" id="hapus-<?= $alamat->ID_ADDRESS ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="exampleModalLabel1">Peringatan!</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin ingin menghapus alamat <strong><?= $alamat->NO_ADDRESS ?></strong> dari daftar alamat? <br></p>
                                                        <span>Penghapusan ini bersifat permanent dan tidak bisa dikembalikan lagi.</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('alamat/delete/' . $alamat->ID_ADDRESS) ?>" class='btn btn-danger'> Delete</a>

                                                        <!-- <button type="button" class="btn btn-primary">Send message</button> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end modalhapus -->
                                        <?php $num++ ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php echo $this->pagination->create_links(); ?>

                        </div>
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
            $('#table-tampil').keyup(function() {
                $.ajax({
                    url: '<?= base_url('alamat/search') ?>',
                    type: 'POST',
                    cache: false,
                    data: {
                        input: $(this).val(),
                    },
                    success: function(show) {
                        $('#table-content').html(show);
                    }
                });
            });
        </script>
</body>

</html>