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
                        <h3 class="text-themecolor">Tambah Agreement</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">Agreement</li>
                            <li class="breadcrumb-item active">Tambah Agreement</li>
                        </ol>
                    </div>
                </div>
                <!-- Start Content -->

                <?php if (!empty($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
                <div class="">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?= base_url('agreement/insert') ?>" method="post">
                                    <div class="table-responsive float-right col-lg-6">
                                        <table>
                                            <tr>
                                            <th>Status <span class=require>*</span></th>
                                                <th>SBU Owner</th>
                                                <th>Owner <span class=require>*</span></th>
                                                <th>Deskrisi</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <select name="crm_status" style="width:100%">
                                                        <option>Draft</option>
                                                        <option>Ulasan Pelanggan</option>
                                                        <option>Tinjauan Hukum</option>
                                                        <option>Final</option>
                                                        <option>Kadaluarsa</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input style="width:100%" type="text" readonly value="<?= $_SESSION['SBU_REGION'] ?>">
                                                    <input type="hidden" name="crm_sbu" value="<?= $_SESSION['ID_SBU'] ?>">
                                                </td>
                                                <td>
                                                    <input style="width:100%" type="text" readonly value="<?= $_SESSION['NAMA_LENGKAP'] ?>">
                                                    <input type="hidden" name="crm_owner" value="<?= $_SESSION['ID_USER'] ?>">
                                                    <!-- <select name='crm_owner' id="">
                                                    <option value="<?= $_SESSION['ID_USER'] ?>"><?= $_SESSION['NAMA_LENGKAP'] ?></option>
                                                </select> -->
                                                </td>
                                                <td>
                                                    <input name='crm_deskrip' style="width:100%" type="text" value="">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div class="d-flex p-t-20 col-md-5 no-block align-items-center">
                                        <div>
                                            <h6 class="card-subtitle">OPPORTUNITY : ICON+ OPPORTUNITY</h6>
                                            <h4 class="card-title">Tambah Agreement Baru</h4>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h4 class="card-title">Summary</h4>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                        <label for="agreement_id" class="col-md-4 text-right control-label">Agreement ID</label>
                                        <input type="text" class="col-md-6 form-control" id="agreement_id" readonly>
                                    </div> -->
                                    <div class="form-group row">
                                        <label for="agreement_date" class="col-sm-4 text-right control-label">Tanggal Agreement <span style="color: red;">*</span></label>
                                        <div class='col-sm-6 p-0'>
                                            <input required name=agr_date type="date" data-date-format="MM/DD/YYYY" class="form-control" id="agreement_date" ')">
                                            <small style="color: red;" id=agreement_date-alert></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pelanggan" class="col-sm-4 text-right control-label">Pelanggan<span style="color: red;">*</span></label>
                                        <div class="col-sm-6 p-0">
                                            <select required name=' agr_pelanggan' class="select2" style="width: 100%" id=pelanggan name=pelanggan onvalid="this.setCustomValidity('Form Pelanggan belum diisi')">
                                            <option value="" disabled selected>Select</option>
                                            <?php foreach ($pelanggan as $pel) : ?>
                                                <option value="<?= $pel->ID_OPPORTUNITY ?>"><?= $pel->NO_OPPORTUNITY ?> - <?= $pel->TOPIC ?></option>
                                            <?php endforeach ?>
                                            </select>
                                            <small style="color: red;" id=pelanggan-alert></small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_mulai" class="col-sm-4 text-right control-label">Tanggal Mulai <span style="color: red;">*</span></label>
                                        <input required name='agr_mulai' type="date" class="col-sm-6 form-control" id="tanggal_mulai">
                                        <small style="color: red;" id=tanggal_mulai-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tanggal_selesai" class="col-sm-4 text-right control-label">Tanggal Selesai <span style="color: red;">*</span></label>
                                        <input required name='agr_selesai' type="date" class="col-sm-6 form-control" id="tanggal_selesai" onvalid="this.setCustomValidity('Form Agreement Date belum diisi')">
                                        <small style="color: red;" id=tanggal_selesai-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row offset-sm-3">
                                        <input id="isRenewal" name="isRenewal" type="checkbox">
                                        <label for="isRenewal" class="col-sm-6 control-label">Pebaruhan Otomatis</label>
                                    </div>
                                    <div class="form-group row">
                                        <label for="billing_agreement" class="col-sm-4 text-right control-label">Tipe Billing Agreement <span style="color: red;">*</span></label>
                                        <select required name='agr_bill' class="col-sm-6 form-control" id="billing_agreement" onvalid="this.setCustomValidity('Form Tipe Billing Agreement belum diisi')">
                                            <option value='' selected="">Choose...</option>
                                            <option value="Jumlah Penuh">Jumlah Penuh</option>
                                            <option value="Prorasi">Prorasi</option>
                                        </select>
                                        <small style="color: red;" id=billing_agreement-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cut_off" class="col-sm-4 text-right control-label">Tanggal Pemutusan</label>
                                        <input name='agr_cut' type="date" class="col-sm-6 form-control" id="cut_off" onvalid="this.setCustomValidity('Form Tanggal Pemutusan wajib diisi')">
                                    </div>
                                    <div class="form-group row">
                                        <!-- kosong -->
                                        <label for="billing_type" class="col-sm-4 text-right control-label">Jenis Pembayaran <span style="color: red;">*</span></label>
                                        <select required name='agr_bill_type' class="col-sm-6 form-control" id="billing_type">
                                            <option selected value="">Choose...</option>
                                            <option value="Prabayar">Prabayar</option>
                                            <option value="Pascabayar">Pascabayar</option>
                                        </select>
                                        <small style="color: red;" id=billing_type-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="periode_type" class="col-sm-4 text-right control-label">Tipe Periode <span style="color: red;">*</span></label>
                                        <select name='agr_period' class="col-sm-6 form-control" id="periode_type">
                                            <option selected value="">Choose...</option>
                                            <option value="Bulanan">Bulanan</option>
                                            <option value="Tahunan">Tahunan</option>
                                        </select>
                                        <small style="color: red;" id=periode_type-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jumlah_perode" class="col-sm-4 text-right control-label">Jumlah Periode <span style="color: red;">*</span></label>
                                        <input required name='agr-period-jml' type="number" min="1" class="col-sm-3 form-control" id="jumlah_perode">
                                        <small style="color: red;" id=jumlah_perode-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Faktur" class="col-sm-4 text-right control-label">Tipe Faktur <span style="color: red;">*</span></label>
                                        <select required name='agr_faktur' class="col-sm-3 form-control" id="Faktur">
                                            <option selected value="">Choose...</option>
                                            <option value="Standar">Standar</option>
                                            <option value="Dipersemakan">Dipersemakan</option>
                                        </select>
                                        <small style="color: red;" id=Faktur-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jangka_waktu" class="col-sm-4 text-right control-label">Jangka Waktu Pembayaran <span style="color: red;">*</span></label>
                                        <div class="col-sm-3 p-0">
                                            <select required class='form-control' style="width: 100%" id=jangka_waktu name=agr_waktu>
                                                <option value="" disabled selected>Select</option>
                                                <option value="5 Hari">5 Hari</option>
                                                <option value="7 Hari">7 Hari</option>
                                                <option value="10 Hari">10 Hari</option>
                                                <option value="30 Hari">30 Hari</option>
                                            </select>
                                        </div>
                                        <small style="color: red;" id=jangka_waktu-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="task_agreement" class="col-sm-4 text-right control-label">Isi Agreement <span style="color: red;">*</span></label>
                                        <input required type="text" name='agr_isi' class="col-sm-6 form-control" id="task_agreement">
                                        <small style="color: red;" id=task_agreement-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="hukuman" class="col-sm-4 text-right control-label">Hukuman</label>
                                        <textarea maxlength="1000" name="agr_hukuman" class="col-sm-6 form-control" id='hukuman' cols="70" rows="10"></textarea>
                                        <small class='offset-sm-4'>Sisa karakter : <span id=char-hukuman>1000</small>
                                    </div>
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h4 class="card-title">Detail Penagihan</h4>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right control-label">Rekening Bank <span style="color: red;">*</span></label>
                                        <input required type="text" name='rekening' class="col-sm-6 form-control" id="rekening">
                                        <small style="color: red;" id='rekening-alert' class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-right control-label">Nomor Rekening Bank <span style="color: red;">*</span></label>
                                        <input required type="text" name='no_rekening' class="col-sm-6 form-control" id="no_rekening">
                                        <small style="color: red;" id="no_rekening-alert" class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row m-b-5">
                                        <label for="" class="col-sm-4 text-right control-label">NPWP<span style="color: red;">*</span></label>
                                        <div class="col-sm-6 p-0">
                                            <select required class="select2" style="width: 100%" id='npwp' name='npwp'>
                                                <option value="" disabled selected>pilih...</option>
                                                <?php foreach ($npwp as $np) : ?>
                                                    <option value="<?= $np->ID_NPWP ?>"><?= $np->NO_PAJAK ?> - <?= $np->NAMA_NPWP ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <small style="color: red;" id=npwp-alert class='offset-sm-4'></small>
                                    </div>
                                    <div class="form-group row" id="input-npwp"></div>
                                    <div class="form-group row m-b-5">
                                        <label for="" class="col-sm-4 text-right control-label">Alamat Penagihan<span style="color: red;">*</span></label>
                                        <div class="col-sm-6 p-0">
                                            <select required class="select2" style="width: 100%" id='alamat' name='alamat'>
                                                <option value="" disabled selected>pilih...</option>
                                                <?php foreach ($addr as $ad) : ?>
                                                    <option value="<?= $ad->ID_ADDRESS ?>"><?= $ad->NO_ADDRESS ?> - <?= $ad->NAMA ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <small style="color: red;" id=alamat-alert class='offset-sm-4'></small>
                                    </div>
                                    <div id="input-address">
                                    </div>
                                    <button type="submit" class="save-button waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-save"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Content -->
                </div>
            </div>

        </div>
    </div>
    <!-- End Container fluid  -->

    <!-- footer -->
    <footer class="footer">
        © 2019 Material Pro Admin by wrappixel.com
    </footer>
    <!-- End footer -->
    <!-- /content -->


    <?php $this->load->view('template/jquery'); ?>
    <script src="<?= base_url('assets/crm-js/activity.js') ?>"></script>
    <script src="<?= base_url('assets/crm-js/agreement.js') ?>"></script>

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
                cache: false,
            });

            $('#npwp').change(function() {
                var val = $(this).val();
                console.log(val);
                $.ajax({
                    url: "<?php echo base_url('agreement/npwp') ?>",
                    data: {
                        id: val,
                    },
                    success: function(respond) {
                        // $('#input-npwp').html(respond)
                        $('#input-npwp').html(respond);
                    }
                })
            });

            $('#alamat').change(function() {
                var val = $(this).val();
                console.log(val);
                $.ajax({
                    url: "<?php echo base_url('agreement/address') ?>",
                    data: {
                        id: val,
                    },
                    success: function(respond) {
                        // $('#input-npwp').html(respond)
                        $('#input-address').html(respond);
                    }
                })
            });


        });
    </script>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:12:10 GMT -->

</html>