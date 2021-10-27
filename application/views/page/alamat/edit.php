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
                        <h3 class="text-themecolor">Edit Alamat</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Alamat</li>
                            <li class="breadcrumb-item active">Edit Alamat</li>
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
                                <h3> Form Tambah Alamat Baru</h3>
                                <span>Masukan data alamat baru.</span>
                            </div>
                            <hr>
                            <form action="<?= base_url('alamat/update/' . $this->uri->segment(3)) ?> " method="post">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 text-right control-label col-form-label">Nama Lengkap<span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <input value="<?= $alamat[0]->NAMA ?>" type="text" class="form-control" required name=nama id="nama" placeholder="Nama lengkap...">
                                        <small style="color: red;" id=nama-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pelanggan" class="col-sm-3 text-right control-label col-form-label">Pelanggan <span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <select class="select2" style="width: 100%" id=pelanggan name=pelanggan required>
                                            <option value="" disabled selected>Select</option>
                                            <?php foreach ($pelanggan as $p) : ?>
                                                <?php if ($alamat[0]->ID_OPPORTUNITY == $p->ID_OPPORTUNITY) : ?>
                                                    <option selected value="<?= $p->ID_OPPORTUNITY ?>"><?= $p->TOPIC ?> - <?= $p->PELANGGAN ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $p->ID_OPPORTUNITY ?>"><?= $p->TOPIC ?> - <?= $p->PELANGGAN ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                        <small style="color: red;" id=pelanggan-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-3 text-right control-label col-form-label">Kategori<span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <?php $kategories = ['Billing', 'Shipping', 'Link'] ?>
                                        <select required id="kategori" class="form-control" name='kategori'>
                                            <option value="" disabled selected>Select</option>
                                            <?php foreach ($kategories as $kategori) : ?>
                                                <?php if ($kategori == $alamat[0]->KATEGORI) : ?>
                                                    <option selected value="<?= $kategori ?>"><?= $kategori ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $kategori ?>"><?= $kategori ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                        <small style="color: red;" id=kategori-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tipe" class="col-sm-3 text-right control-label col-form-label">Tipe<span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <?php if ($alamat[0]->TIPE == 'Terminating') : ?>
                                            <div class="demo-radio-button">
                                                <input required checked name="tipe" name=tipe value="Terminating" type="radio" id="terminating" />
                                                <label for="terminating">Termnating</label>
                                                <input required name="tipe" name="tipe" value="Originating" type="radio" id="originating" />
                                                <label for="originating">Origninating</label>
                                            </div>
                                        <?php else : ?>
                                            <div class="demo-radio-button">
                                                <input required name="tipe" name=tipe value="Terminating" type="radio" id="terminating" />
                                                <label for="terminating">Termnating</label>
                                                <input required checked name="tipe" name="tipe" value="Originating" type="radio" id="originating" />
                                                <label for="originating">Origninating</label>
                                            </div>
                                        <?php endif ?>
                                        <small style="color: red;" id=tipe-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="koordinat" class="col-sm-3 text-right control-label col-form-label">Koordinat</label>
                                    <div class="col-sm-7">
                                        <input value="<?= $alamat[0]->KORDINAT ?>" type="text" id=koordinat class="form-control" name=koordinat id="koordinat" placeholder="Koordinat alamat...">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sbu" class="col-sm-3 text-right control-label col-form-label">SBU<span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <select required select class='select2' style="width: 100%" name="sbu" id="sbu" class="form-control" required>
                                            <option value="" disabled selected>Select</option>
                                            <?php foreach ($sbus as $sbu) : ?>
                                                <?php if ($sbu->ID_SBU == $alamat[0]->CABANG_SBU) : ?>
                                                    <option selected value="<?= $sbu->ID_SBU ?>"><?= $sbu->SBU_REGION ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $sbu->ID_SBU ?>"><?= $sbu->SBU_REGION ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                        <small style="color: red;" id=sbu-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="provinsi" class="col-sm-3 text-right control-label col-form-label">Provinsi<span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <select disabled class='select2' style="width: 100%" name="provinsi" id="provinsi" class="form-control">
                                            <option value="" disabled selected>Select</option>
                                            <?php foreach ($prov as $provinsi) : ?>
                                                <?php if ($alamat[0]->PROVINSI == $provinsi->name) : ?>
                                                    <option selected value="<?= $provinsi->name ?>"><?= $provinsi->name ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $provinsi->name ?>"><?= $provinsi->name ?></option>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </select>
                                        <small style="color: red;" id=provinsi-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kabupaten" class="col-sm-3 text-right control-label col-form-label">Kabupaten<span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <select disabled class='select2' style="width: 100%" name="kabupaten" id="kabupaten" class="form-control">
                                            <option value="" disabled>Select</option>
                                            <option value="<?= $alamat[0]->KABUPATEN ?>" selected><?= $alamat[0]->KABUPATEN ?></option>
                                        </select>
                                        <small style="color: red;" id=kabupaten-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kecamatan" class="col-sm-3 text-right control-label col-form-label">Kecamatan<span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <select disabled class='select2' style="width: 100%" name="kecamatan" id="kecamatan" onclick="" class="form-control">
                                            <option value="" disabled selected>Select</option>
                                            <option value="<?= $alamat[0]->KECAMATAN ?>" selected><?= $alamat[0]->KECAMATAN ?></option>
                                        </select>
                                        <small style="color: red;" id=kecamatan-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jalan" class="col-sm-3 text-right control-label col-form-label">Jalan<span class='require'>*</span></label>
                                    <div class="col-sm-7">
                                        <input disabled required value="<?= $alamat[0]->JALAN ?>" type="text" class="form-control" required name=jalan id="jalan" placeholder="Jalan...">
                                        <small style="color: red;" id=jalan-alert></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kode" class="col-sm-3 text-right control-label col-form-label">Kode Pos</label>
                                    <div class="col-sm-7">
                                        <input  value="<?= $alamat[0]->KODE_POST ?>" type="text" onkeypress="numberInput(event)" class="form-control" name=kode id="kode" placeholder="Kode pos...">
                                    </div>
                                </div>
                                <div class="form-group row offset-md-3">
                                    <?php if ($alamat[0]->CRM_STATUS == 'Active') : ?>
                                        <input checked id="status_alamat" name="status_alamat" type="checkbox">
                                    <?php else : ?>
                                        <input id="status_alamat" name="status_alamat" type="checkbox">
                                    <?php endif ?>
                                    <label for="status_alamat" class="col-md-6 control-label">Status Aktif</label>
                                </div>
                                <button type="submit" class="save-button waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-save"></i></button>
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
        <script src="<?= base_url() ?>database/wilayah.json"></script>
        <script src="<?= base_url('assets/crm-js/alamat.js') ?>"></script>

        <script>
            $(".select2").select2();

            function numberInput(evt) {
                var char = String.fromCharCode(evt.which);
                if (!/[0-9]/.test(char)) {
                    evt.preventDefault();
                }
            }

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
            document.addEventListener('invalid', (function() {
                return function(e) {
                    e.preventDefault();
                };
            })(), true);
        </script>

</body>

</html>