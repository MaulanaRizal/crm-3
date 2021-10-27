<?php $this->load->view('template/head', $title); ?>

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
                <div class="col-md-7 col-4  float-right">
                    <div class="form-group justify-content-end">
                        <h4 class='text-themecolor d-flex justify-content-end m-t-10'>Periode</h4>
                        <div class="btn-group float-right">
                            <button type="button" class="btn btn-info dropdown-toggle m-l-10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='ti-settings'></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusTahun" href="#">Tambah</a>
                                <a class="dropdown-item" data-toggle="modal" data-target="#tambahTahun" href="#">Hapus</a>
                            </div>
                        </div>
                        <!-- <button class='btn btn-info float-right m-l-10' data-toggle="modal" data-target="#tambahTahun"><i class='fa fa-plus'></i></button> -->
                        <select class='form-control col-md-2 float-right' onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" name="periode" id="">
                            <?php foreach ($list as $periode) : ?>
                                <?php if ($period == $periode->PERIODE) : ?>
                                    <option selected value="#"><?= $periode->PERIODE ?></option>
                                <?php else : ?>
                                    <option value="<?= base_url('target_tahunan_pusat/periode/' . $periode->PERIODE) ?>"><?= $periode->PERIODE ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>

                <!-- Modal Hapus Tahun - -->
                <div class="modal" tabindex="-1" role="dialog" id='tambahTahun'>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Hapus Periode Target Tahunan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('target_tahunan_pusat/delete') ?>" method="post">
                                <div class="modal-body">
                                    <p>Penghapusan ini akanbersifat permanen dan tidak bisa dikembalikan. Apakah anda yakin?</p>
                                    <?php if ($this->uri->segment(3) == null) : ?>
                                        <input type="hidden" name="tahun" value="<?= date('Y') ?>">
                                    <?php else : ?>
                                        <input type="hidden" name="tahun" value="<?= $this->uri->segment(3) ?>">
                                    <?php endif ?>

                                </div>
                                <div class="modal-footer">
                                    <!-- <a href="#" class='btn btn-danger'>Hapus</a> -->
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end modal -->


                <!-- Modal Tambah Tahun - -->
                <div class="modal" tabindex="-1" role="dialog" id='hapusTahun'>
                    <div class="modal-dialog" role="document">
                        <form action="<?= base_url('target_tahunan_pusat/addPeriode/') ?>" method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Periode Target Tahunan</h5>
                                    <button type="button" class="rupiah close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="yearPicker">Tahun Periode</label>
                                    <input required class='form-control' type="number" value="<?= date('Y') ?>" name="tahun_periode" id="yearPicker">
                                    <hr>
                                    <p>Penambahan periode target tahunan ini akan disesuaikan dengan kondisi SBU saat ini. Apakah anda yakin akan menambahkanp periode baru saat ini?</p>
                                    <input required type="checkbox" class='form-control check' name="check" id="check">
                                    <label for="check">Ya, saya yakin.</label><br>
                                    <small id=alert style="color: red;" class="form-control-feedback"></small>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" onclick="cek()" class="btn btn-primary">Tambah</button>
                                </div>
                        </form>
                    </div>
                </div>
                <!-- end modal -->
            </div>
            <div class=" page-titles">
                <div class="col-md-5 col-8 align-self-center">
                    <h3 class="text-themecolor">Target SBU Pusat</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item">Target Tahunan</li>
                        <li class="breadcrumb-item active">Target SBU Pusat</li>
                    </ol>
                </div>

            </div>

            <!-- Start Content -->
            <?php if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>

            <div class="row">
                <div class="col-lg-7 col-md-7">

                    <?php if ($target[0]->NOMINAL == 0) : ?>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap">
                                        <div>
                                            <h3 class="card-title">SBU Overview</h3>
                                        </div>
                                        <div class="ml-auto">
                                            <ul class="list-inline">
                                                <?php foreach ($sbus as $sbu) : ?>
                                                    <li>
                                                        <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i> <?= $sbu->SBU_REGION ?></h6>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>

                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap">
                                        <div>
                                            <h3 class="card-title">SBU Overview</h3>
                                        </div>
                                        <div class="ml-auto">
                                            <ul class="list-inline">
                                                <?php foreach ($sbus as $sbu) : ?>
                                                    <li>
                                                        <h6 class="text-muted text-success"><i class="fa fa-circle font-10 m-r-10 "></i> <?= $sbu->SBU_REGION ?></h6>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 m-0">
                                    <div class="amp-pxl" id=chat style="height: 360px;"></div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>

                    <div class="card">
                        <div class="card-body">
                            <h3>Performa SBU</h3>
                            <hr>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>#</th>
                                        <th>SBU Region</th>
                                        <th>Total Sales</th>
                                        <th>Pemasukan</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php $num = 1 ?>
                                    <?php foreach ($saleses as $sales) : ?>
                                        <tr>
                                            <td><?= $num++ ?></td>
                                            <td><?= $sales->SBU_REGION ?></td>
                                            <td><?= $sales->sales ?> orang</td>
                                            <td>
                                                Rp. <?= number_format($sales->ANNUAL_TARGET, 2, ",", ".") ?>
                                                <div class="progress m-0">
                                                    <div class="progress-bar bg-warning" style="width: 80%; height:6px;" role="progressbar"> <span class="sr-only">60% Complete</span> </div>
                                                </div>
                                            </td>
                                            <td><span class='label label-info'>On going</span></label></td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <?php if ($target[0]->NOMINAL == 0) : ?>
                        <?php $target_periode = 0 ?>

                        <div class="card">
                            <div class="card-body">
                                <h4>Target Periode Periode Ini</h4>
                                <hr class=m-t-0>
                                <div>
                                    <label for="input-target">Masukan Nominal Target <span class=require>*</span>:</label>
                                    <input required class="rupiah form-control m-b-10" name='target' id="input-target" type="text" data-a-dec="," data-a-sep="." data-a-sign="Rp. ">
                                    <small class='require' id="input-target-alert"></small>
                                    <p id='input-terbilang' class=m-0></p>
                                    <button class='btn btn-info btn-xs float-right' id='submit-target'>Submit</button>
                                </div>

                                <!-- modal -->
                                <div class="modal fade" id="modal-target" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Pemberitahuan !</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('target_tahunan_pusat/add_periode') ?>" method="post">
                                                <div class="modal-body">
                                                    <p>Nominal yang sudah diinputkan akan bersifat permanen dan tidak bisa diubah maupun dihapus. Pastikan Nominal Tartget sudah benar dan sesuai.</p>
                                                    <label for="target">Nominal :</label>
                                                    <input class="rupiah form-control" name='target' id="target" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." readonly>
                                                    <label for="terbilang">Terbilang :</label>
                                                    <input required type="text" class='form-control' name=terbilang id="terbilang" readonly>
                                                    <!-- <input type="checkbox"' name="check-target" id="check-target"> -->
                                                    <br><br>
                                                    <input required type="checkbox" id="check-target" name="check-target">
                                                    <label for="check-target">Nominal target sudah benar.</label><br>
                                                    <small class='require' id="check-target-alert"></small>
                                                    <?php if (empty($this->uri->segment(3))) : ?>
                                                        <input type="hidden" name="periode" value="<?= date('Y') ?>">
                                                    <?php else : ?>
                                                        <input type="hidden" name="periode" value="<?= $this->uri->segment(3) ?>">
                                                    <?php endif ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id='modal-submit-target' class="btn btn-info">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal -->

                            </div>
                        </div>
                    <?php else : ?>
                        <?php $target_periode = $target[0]->NOMINAL ?>
                        <div class="card">
                            <div class="card-body">
                                <h4>Target Periode Periode Ini</h4>
                                <hr class=m-0>
                                <h2 class='text-primary text-center m-t-10'>Rp. <?= number_format($target[0]->NOMINAL, 2, ",", ".") ?></h2>
                                <p class='text-center'>( <?= $target[0]->TERBILANG ?> )</p>
                            </div>
                        </div>
                    <?php endif ?>

                    <?php if (!($target[0]->NOMINAL == 0)) : ?>
                        <div class="card">
                            <div class="card-body">
                                <h4>Daftar SBU</h4>
                                <hr class='m-0'>
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <tr>
                                            <th width=50>#</th>
                                            <th>SBU</th>
                                            <th>Target</th>
                                            <th width=50>Aksi</th>
                                        </tr>
                                        <?php $num = 0;
                                        $sum = 0;
                                        foreach ($sbus as $sbu) : ?>
                                            <tr>
                                                <td><?= ++$num; ?></td>

                                                <td><?= $sbu->SBU_REGION ?></td>
                                                <td>
                                                    Rp. <?= number_format($sbu->ANNUAL_TARGET, 2, ",", ".") ?>
                                                    <?php $sum = $sum + $sbu->ANNUAL_TARGET ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-info btn-xs" data-toggle="modal" data-target="#editTarget<?= $num ?>"><i class="fas fa-edit fa-sm"></i></button>
                                                </td>
                                            </tr>

                                            <!-- Start Model -->

                                            <div class="modal fade" id="editTarget<?= $num ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="exampleModalLabel1">Edit Target <?= $sbu->SBU_REGION ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form action="<?= base_url('target_tahunan_pusat/insert') ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="">Akumulasi Target</label>
                                                                    <h3 class='text-center akumulasi' data-decimal="," id='akumulasi'></h3>
                                                                    <label for="nominal" class="control-label">Nominal Target:</label>
                                                                    <input required oninvalid="this.setCustomValidity('Form nominal tidak boleh kosong')" class="rupiah form-control nominal" name='nominal' id="nominal" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep=".">
                                                                    <!-- <input required type="text" class="form-control nominal" name='nominal' id="nominal"> -->
                                                                    <input type="hidden" name="sbu" value="<?= $sbu->SBU_REGION ?>">
                                                                    <input type="hidden" name="id_annual" value="<?= $sbu->ID_ANNUAL ?>">
                                                                    <input type="hidden" name="periode" value="<?= $this->uri->segment(3); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-info">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End Model -->

                                        <?php endforeach ?>
                                        <?php $aku = $sum - $target_periode ?>
                                        <tr>
                                            <td>#</td>
                                            <?php if ($aku < 0) : ?>
                                                <td><strong> Jumlah <br> Kekurangan</strong></td>
                                            <?php else : ?>
                                                <td><strong> Jumlah </strong></td>
                                            <?php endif ?>
                                            <td>
                                                <strong> Rp. <?= number_format($sum, 2, ",", ".") ?> </strong><br>
                                                <?php if ($aku < 0) : ?>
                                                    <strong class='require'>Rp. <?= number_format($aku, 2, ",", ".") ?></strong>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <!-- Start Modal -->

                <!-- end modal -->
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
    <script src="<?= base_url('assets/crm-js/annual_pusat.js') ?>"></script>
    <script src="<?= base_url('assets/crm-js/autoNumeric.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 15,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        var chart2 = new Chartist.Bar('.amp-pxl', {
            labels: ['2016', '2017', '2018'],
            series: [
                [9, 5, 3, 7],
                [6, 3, 9, 5],
                [8, 7, 6, 3]
            ]
        }, {
            axisX: {
                // On the x-axis start means top and end means bottom
                position: 'end',
                showGrid: false
            },
            axisY: {
                // On the y-axis start means left and end means right
                position: 'start'
            },
            high: '12',
            low: '0',
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });
        $(document).ready(function() {
            $('.rupiah').autoNumeric('init');
        });

        function cek() {
            var val = document.getElementById('check').checked;
            // console.log(val);
            if (val == false) {
                document.getElementById('alert').innerHTML = 'checkbox tidak boleh kosong.'
            }
        }

        $('.nominal').keypress(function() {
            val = $(this).val();
            $(this).fromatNominal(val);
        });

        $('.akumulasi').text('Rp. ' + akumulasi(<?= $aku ?>));

        function akumulasi(num) {
            var aku = (num).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&:');
            aku = aku.replace('.', ',');
            aku = aku.replace(/:/g, '.');
            console.log(aku);
            return aku;
            // $('#akumulasi').text(aku);            
        }
        $('.nominal').keyup(function() {
            nom = parseInt(<?= $aku ?>);
            val = $(this).val();
            val = val.replace('Rp. ', '');
            val = val.replace(',00', '');
            val = val.replaceAll('.', '');
            aku = parseInt(val) + nom;
            // console.log(aku);
            $('.akumulasi').text('Rp. ' + akumulasi(aku));
        });
    </script>
</body>


<!-- Mirrored from www.wrappixel.com/demos/admin-templates/material-pro/minisidebar/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Feb 2019 11:12:10 GMT -->

</html>