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
                        <h3 class="text-themecolor">Tambah NPWP</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">NPWP</li>
                            <li class="breadcrumb-item active">Tambah NPWP</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->

                <div class="row d-flex justify-content-center">
                    <?php if (!empty($_SESSION['message'])) { ?>
                        <div class="alert alert-danger">
                            <strong>Gagal!</strong><?= $_SESSION['message'] ?>
                        </div>
                    <?php }
                    unset($_SESSION['message']); ?>
                    <div class="card col-lg-8 ">
                        <div class="card-body">
                            <div class="text-center">
                                <h3> Form Tambah NPWP Baru</h3>
                                <span>Masukan data NPWP baru.</span>
                            </div>
                            <hr>
                            <form action="<?= base_url('npwp/insert') ?> " method="post">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama NPWP</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name=nama id="nama" placeholder="Nama NPWP">
                                        <small style="color: red;" id='nama-alert'></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_pajak" class="col-sm-3 text-right control-label col-form-label">Nomor Pajak <span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" required name=no_pajak id="no_pajak" placeholder="Nomor pajak">
                                        <small style="color: red;" id='no_pajak-alert'></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pemilik" class="col-sm-3 text-right control-label col-form-label">Pemilik <span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <select required name="pemilik" class='select2' style="width:100%;" id="pemilik">
                                            <option value="" selected>Pilih...</option>
                                            <?php foreach($opportunity as $o): ?>
                                            <option value="<?= $o->ID_OPPORTUNITY  ?>"><?= $o->TOPIC ?> - <?= $o->NAMA_PELANGGAN ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <small style="color: red;" id='pemilik-alert'></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="npwp_terkait" class="col-sm-3 text-right control-label col-form-label">NPWP Terkait</label>
                                    <div class="col-sm-7">
                                        <select name="npwp_terkait" class='select2' style="width:100%;" id="npwp_terkait">
                                            <option value="" selected>Pilih...</option>
                                            <?php foreach ($npwp as $n) : ?>
                                                <option value="<?= $n->ID_NPWP ?>"><?= $n->NAMA_NPWP ?> - <?= $n->NO_PAJAK ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <small style="color: red;" id='npwp_terkait-alert'></small>
                                    </div>
                                </div>
                                <div class="form-group row offset-sm-3">
                                    <input id="isPrimary" value="yes" name="isPrimary" type="checkbox">
                                    <label for="isPrimary" class="col-md-7 control-label">NPWP Utama</label>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="offset-sm-3 col-sm-7">
                                        <button type="submit" class="save-button waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"> <i class='fa fa-save'></i></button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="alamat" class="col-sm-3 text-right control-label">Alamat <span class=require>*</span></label>
                                    <div class="col-sm-7 ">
                                        <textarea maxlength="1000" required name="alamat" class="form-control" id="alamat" cols="70" rows="4"></textarea>
                                        <small>Sisa karakter : <span id="char-alamat">1000</span></small><br>
                                        <small style="color: red;" id='alamat-alert'></small>
                                    </div>
                                </div>
                            </form>
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
        <script src="<?= base_url('assets/crm-js/npwp.js') ?>"></script>

        <script>
            $(".select2").select2();

            function numberInput(evt) {
                var char = String.fromCharCode(evt.which);
                if (!/[0-9]/.test(char)) {
                    evt.preventDefault();
                }
            }
            document.addEventListener('invalid', (function() {
                return function(e) {
                    e.preventDefault();
                };
            })(), true);
            $(function() {
                $.ajaxSetup({
                    type: "POST",
                    url: "<?php echo base_url('alamat/ambil_data') ?>",
                    cache: false,
                });

                $("#provinsi").change(function() {
                    var value = $(this).val();
                    $.ajax({
                        data: {
                            table: 'regencies',
                            column: 'province_id',
                            id: value
                        },
                        success: function(respond) {
                            $("#kabupaten").html(respond);
                            // console.log(respond);
                        }
                    })
                });

                $("#kabupaten").change(function() {
                    var value = $(this).val();
                    $.ajax({
                        data: {
                            table: 'districts',
                            column: 'regency_id',
                            id: value
                        },
                        success: function(respond) {
                            $("#kecamatan").html(respond);
                        }
                    })
                });

            });
        </script>

</body>

</html>