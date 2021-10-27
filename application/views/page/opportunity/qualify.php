<?php $this->load->view('template/head');?>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="main-wrapper">
        <?php $this->load->view('template/navbar');?>
        <?php $this->load->view('template/sidenav');?>


        <!-- content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">Tambah Opportunity</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">Opportunity</li>
                            <li class="breadcrumb-item active"> Tambah Opportunity</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <div class="row d-flex justify-content-center">
                        <div class="card col-md-10">
                            <div class="card-body">
                                <form class="itemOpportunity" novalidate method="post">
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
                                                <select class="form-control" name="kategori">
                                                    <option>Jaringan</option>
                                                    <option>Aplikasi</option>
                                                    <option>Administrasi</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="status">
                                                    <option>Sedang Berlangsung</option>
                                                    <option>Tertahan</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input readonly type="text" name="SBU" class="form-control" value="<?= $_SESSION['SBU_REGION'] ?>">
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
                                            <input readonly type="text" name="no_opportunity" value="OPT/<?php echo $no_opportunity;?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row <?=form_error('topic') ? 'has-error' : null?>">
                                        <label for="example-text-input" class="col-2 col-form-label">Topic *</label>
                                        <div class="col-10">
                                            <input name="topic" class="form-control" type="text" value="<?=$lead->TOPIC?>">
                                            <span id="topic_error" class="text-danger"><?=form_error('topic')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row <?=form_error('nama_pelanggan') ? 'has-error' : null?>">
                                        <label for="example-text-input" class="col-2 col-form-label">Nama Pelanggan *</label>
                                        <div class="col-10">
                                            <input name="nama_pelanggan" class="form-control" type="text" value="<?=$lead->NAMA?>">
                                            <span id="nama_pelanggan_error" class="text-danger"><?=form_error('nama_pelanggan')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row <?=form_error('tanggal') ? 'has-error' : null?>">
                                        <label for="example-date-input" class="col-2 col-form-label">Tanggal Opportunity *</label>
                                        <div class="col-10">
                                            <input name="tanggal" class="form-control" type="date">
                                            <span id="tanggal_error" class="text-danger"><?=form_error('tanggal')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row <?=form_error('tanggal_target') ? 'has-error' : null?>">
                                        <label for="example-date-input" class="col-2 col-form-label">Tanggal Target Penjualan *</label>
                                        <div class="col-10">
                                            <input name="tanggal_target" class="form-control" type="date">
                                            <span id="tanggal_target_error" class="text-danger"><?=form_error('tanggal_target')?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Tipe Survey</label>
                                        <div class="col-10">
                                            <select name="tipe_survey" class="col-12 form-control">
                                                <option selected="">Choose...</option>
                                                <option>Detail Survei</option>
                                                <option>On Desk</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-month-input" class="col-2 col-form-label">Jangka Waktu Pembelian</label>
                                        <div class="col-10">
                                            <select name="waktu_pemesanan" class="form-control col-12">
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
                                            <input class="form-control" id="rupiah1" name="rupiah1" type="text">
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
                                            <select name="proses_pemesanan" class="form-control col-12" id="inlineFormCustomSelect">
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
                                            <textarea name="deskripsi" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Situasi Saat Ini</label>
                                        <div class="col-10">
                                            <textarea name="situasi_sekarang" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Kebutuhan Pelanggan</label>
                                        <div class="col-10">
                                            <textarea name="kebutuhan_pelanggan" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input" class="col-2 col-form-label">Solusi Yang Diusulkan</label>
                                        <div class="col-10">
                                            <textarea name="solusi" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" id="tambahOpportunity" class="save-button waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-save"></i></button>
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
        $(document).ready(function(){
            $("#tambahOpportunity").click(function(e){
                e.preventDefault();
                var data = $('.itemOpportunity').serialize();
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: "<?= base_url('opportunity/simpan') ?>",
                    data: data,
                    success: function(data){
                        if($.isEmptyObject(data.error)){
                            location.href = "<?= base_url('opportunity') ?>";
                        }
                        else{
                            $("#topic_error").html(data.error.topic_error);
                            $("#nama_pelanggan_error").html(data.error.nama_pelanggan_error);
                            $("#tanggal_error").html(data.error.tanggal_error);
                            $('#tanggal_target_error').html(data.error.tanggal_target_error);
                        }
                    }
                });
            });
        });
    </script>
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
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        </script>
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
    </script>
</body>

</html>