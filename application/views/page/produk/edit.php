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
                        <h3 class="text-themecolor">Edit Data Produk</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                            <li class="breadcrumb-item active">Edit Produk</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <div class="row d-flex justify-content-center">

                    <div class="card card-body col-9">
                        <h2>Tambah Data Produk</h2>
                        <hr>
                        <form action="<?= base_url('produk/update/'.$product[0]->ID_PRODUCT) ?>" method="post">
                            <div class="form-group row">
                                <label for="nama_produk" class="col-4 text-right">Nama Produk <span style="color: red;">*</span></label>
                                <input id=nama_produk type="text" class="form-control col-6" name='nama_produk' value="<?= $product[0]->NAMA_PRODUCT ?>" required>
                            </div>

                            <div class="form-group row offset-md-3">
                                <?php if ($product[0]->SEKALI_PAKAI=='on') : ?>
                                    <input id="sekali_pakai" name="sekali_pakai" type="checkbox" checked>
                                <?php else : ?>
                                    <input id="sekali_pakai" name="sekali_pakai" type="checkbox">
                                <?php endif ?>
                                <label for="sekali_pakai" class="col-md-6 control-label">Sekali Pakai</label>
                            </div>
                            <div class="form-group row">
                                <label for="awal_penggunaan" class="col-4 text-right">Awal Penggunaan</label>
                                <input id=awal_penggunaan type="date" class="form-control col-3" name='awal_penggunaan' value="<?= $product[0]->AWAL_PENGGUNAAN ?>">
                                <input type="button" value="Reset" class="btn btn-success" id=resetAwalPenggunaan>
                            </div>
                            <div class="form-group row">
                                <label for="akhir_penggunaan" class="col-4 text-right">Akhir Penggunaan</label>
                                <input id=akhir_penggunaan type="date" class="form-control col-3" name='akhir_penggunaan' value="<?= $product[0]->AKHIR_PENGGUNAAN ?>">
                                <input type="button" value="Reset" class="btn btn-success" id=resetAkhirPenggunaan>
                            </div>
                            <div class="form-group row">
                                <label for="inputNominalProduk" class="col-4 text-right">Harga<span style="color: red;">*</span></label>
                                <input type="number" class="form-control col-6 money" id="inputNominalProduk" name='harga_produk' required value="<?= $product[0]->HARGA_DEFAULT ?>">
                            </div>
                            <div class="form-group row">
                                <span class="col-4 text-right"></span>
                                <p calss id="nominalProduk"></p>
                            </div>
                            <button type="submit" class="save-button waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-save"></i></button>
                        </form>
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
            $('#inputNominalProduk').keypress(function() {
                let val = $('#inputNominalProduk').val();
                $('#nominalProduk').text(nominal(val, 'Rp. '));
            });

            function nominal(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, "").toString(),
                    split = number_string.split(","),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? "." : "";
                    rupiah += separator + ribuan.join(".");
                }

                rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
                return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
            }
            $('#resetAwalPenggunaan').click(function(){
                $('#awal_penggunaan').val('');
            });
            $('#resetAkhirPenggunaan').click(function(){
                $('#akhir_penggunaan').val('');
            });
        </script>
</body>

</html>