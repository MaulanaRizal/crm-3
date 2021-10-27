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
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Update Opportunity</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">Opportunity</li>
                            <li class="breadcrumb-item active"> Update Opportunity</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <div class="row d-flex justify-content-center">
                        <div class="card col-md-9">
                            <div class="card-body">
                                <form class="itemLead" method="post" action="<?= base_url('opportunity/update/'.$opportunities[0]->ID_OPPORTUNITY) ?>">
                                <div class="float-right col-lg-9">
                                    <table>
                                        <tr>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th>SBU</th>
                                            <th>Pemilik</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="kategori" id=kategori>
                                                    <option>Jaringan</option>
                                                    <option>Aplikasi</option>
                                                    <option>Administrasi</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="status" id=status>
                                                    <option>Sedang Berlangsung</option>
                                                    <option>Tertahan</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input readonly type="text" name="SBU" class="form-control" value="<?= $_SESSION['SBU_REGION'] ?>">
                                                <input type="hidden" name="id_sbu" value="<?= $_SESSION['ID_SBU'] ?>">
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="ti-user"></i>
                                                        </span>
                                                    </div>
                                                    <input readonly type="text" class="form-control" name="pemilik" value="<?= $_SESSION['NAMA_LENGKAP'] ?>">
                                                    <input type="hidden" name="crm_owner" value="<?= $_SESSION['ID_USER'] ?>">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h6 class="card-subtitle">OPPORTUNITY : ICON+ OPPORTUNITY</h6>
                                        <h4 class="card-title">Tambah Opportunity</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h4 class="card-title">Summary</h4>
                                    </div>
                                </div>
                                    <div class="form-group m-t-40 row">
                                        <label for="example-text-input" class="col-2 col-form-label">No Opportunity</label>
                                        <div class="col-10">
                                            <input readonly type="text" name="no_opportunity" class="form-control" value="<?= $opportunities[0]->NO_OPPORTUNITY ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row <?=form_error('topic') ? 'has-error' : null?>">
                                        <label for="example-text-input" class="col-2 col-form-label">Topic <span style="color: red">*</span></label>
                                        <div class="col-10">
                                            <input name="topic" class="form-control" type="text" value="<?= $opportunities[0]->TOPIC ?>">
                                            <span id="topic_error" class="text-danger"><?=form_error('topic')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row <?=form_error('nama_pelanggan') ? 'has-error' : null?>">
                                        <label for="example-text-input" class="col-2 col-form-label">Nama Pelanggan <span style="color: red">*</span></label>
                                        <div class="col-10">
                                            <input name="nama_pelanggan" class="form-control" type="text" value="<?= $opportunities[0]->NAMA_PELANGGAN ?>">
                                            <span id="nama_pelanggan_error" class="text-danger"><?=form_error('nama_pelanggan')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row <?=form_error('tanggal') ? 'has-error' : null?>">
                                        <label for="example-date-input" class="col-2 col-form-label">Tanggal Opportunity <span style="color: red">*</span></label>
                                        <div class="col-10">
                                            <input name="tanggal" class="form-control" type="date" value="<?= $opportunities[0]->TANGGAL ?>">
                                            <span id="tanggal_error" class="text-danger"><?=form_error('tanggal')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row <?=form_error('tanggal_target') ? 'has-error' : null?>">
                                        <label for="example-date-input" class="col-2 col-form-label">Tanggal Target Penjualan <span style="color: red">*</span></label>
                                        <div class="col-10">
                                            <input name="tanggal_target" class="form-control" type="date" value="<?= $opportunities[0]->TANGGAL_TARGET ?>">
                                            <span id="tanggal_target_error" class="text-danger"><?=form_error('tanggal_target')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Tipe Survey</label>
                                        <div class="col-10">
                                            <select name="tipe_survey" class="col-12 form-control" id=tipeSurvey>
                                                <option selected="">Choose...</option>
                                                <option>Detail Survei</option>
                                                <option>On Desk</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Jangka Waktu Pembelian</label>
                                        <div class="col-10">
                                            <select name="waktu_pemesanan" class="form-control col-12" id="waktuPemesanan">
                                                <option selected="">Choose...</option>
                                                <option>Segera</option>
                                                <option>Kuartal Ini</option>
                                                <option>Kuartal Berikutnya</option>
                                                <option>Tahun Ini</option>
                                                <option>Tidak Diketahui</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Perkiraan Pendapatan</label>
                                        <div class="col-10">
                                            <input class="form-control" id="rupiah1" name="rupiah1" type="text" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-number-input" class="col-2 col-form-label">Jumlah Anggaran</label>
                                        <div class="col-10">
                                            <input class="form-control" id="rupiah2" name="rupiah2" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Proses Pembelian</label>
                                        <div class="col-10">
                                            <select name="proses_pemesanan" class="form-control col-12" id=prosesPemesanan>
                                                <option selected="">Choose...</option>
                                                <option>Individu</option>
                                                <option>komersial</option>
                                                <option>Tidak Diketahui</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Deskripsi</label>
                                        <div class="col-10">
                                            <textarea name="deskripsi" class="form-control"><?= $opportunities[0]->DESKRIPSI ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Situasi Saat Ini</label>
                                        <div class="col-10">
                                            <textarea name="situasi_sekarang" class="form-control"><?= $opportunities[0]->SITUASI_SEKARANG ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Kebutuhan Pelanggan</label>
                                        <div class="col-10">
                                            <textarea name="kebutuhan_pelanggan" class="form-control"><?= $opportunities[0]->KEBUTUHAN_PELANGGAN ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Solusi Yang Diusulkan</label>
                                        <div class="col-10">
                                            <textarea name="solusi" class="form-control"><?= $opportunities[0]->SOLUSI ?></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" id="tambahOpportunity" class="save-button waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-save"></i></button>
                                </form>
                            </div>
                        </div>
                </div>
                <!-- End Content -->
            </div>
            <!-- footer -->
            <footer class="footer">
                © 2019 Material Pro Admin by wrappixel.com
            </footer>
            <!-- End footer -->
        </div>
    </div>
    <!-- /content -->
    <?php $this->load->view('template/jquery'); ?>
    <script type="text/javascript">


        var dengan_rupiah1 = document.getElementById('rupiah1');
        dengan_rupiah1.addEventListener('keyup', function(e) {
            dengan_rupiah1.value = formatRupiah(this.value, 'Rp. ');
        });

        var dengan_rupiah2 = document.getElementById('rupiah2');
        dengan_rupiah2.addEventListener('keyup', function(e) {
            dengan_rupiah2.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        $('#kategori').val('<?= $opportunities[0]->KATEGORI ?>');
        $('#status').val('<?= $opportunities[0]->CRM_STATUS ?>');
        $('#tipeSurvey').val('<?= $opportunities[0]->TIPE_SURVEY ?>');
        $('#waktuPemesanan').val('<?= $opportunities[0]->WAKTU_PEMESANAN ?>');
        $('#rupiah1').val(formatRupiah('<?= $opportunities[0]->PENDAPATAN ?>', 'Rp. '));
        $('#rupiah2').val(formatRupiah('<?= $opportunities[0]->ANGGARAN ?>', 'Rp. '));
        $('#prosesPemesanan').val('<?= $opportunities[0]->PROSES_PEMESANAN ?>');

    </script>
</body>

</html>