<?php $this->load->view('template/head'); ?>
<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
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
                        <h3 class="text-themecolor">Tambah Lead</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item">Lead</li>
                            <li class="breadcrumb-item active"> Tambah Lead</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <div class="row d-flex justify-content-center">
                    <div class="card col-md-9">
                        <div class="card-body">
                            <form novalidate class="itemLead" method="post">
                                <div class="float-right col-lg-9">
                                    <table>
                                        <tr>
                                            <th>Sumber Lead</th>
                                            <th>Peringkat</th>
                                            <th>Status</th>
                                            <th>Pemilik</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="sumber_lead" style="width: 100%">
                                                    <option selected></option>
                                                    <option>Iklan</option>
                                                    <option>Rujukan Karyawan</option>
                                                    <option>Rujukan Eksternal</option>
                                                    <option>Partner</option>
                                                    <option>Hubungan Masyarakat</option>
                                                    <option>Seminar</option>
                                                    <option>Pameran Dagang</option>
                                                    <option>Web</option>
                                                    <option>Dari Mulut ke Mulut</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="rating" style="width: 100%">
                                                    <option selected></option>
                                                    <option>Hot</option>
                                                    <option>Warm</option>
                                                    <option>Cold</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="form-control" name="status">
                                                    <option selected>Baru</option>
                                                    <option>Dihubungi</option>
                                                </select>
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
                                        <h6 class="card-subtitle">LEAD : ICON+ LEAD</h6>
                                        <h4 class="card-title">Tambah Lead</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-8 offset-sm-2 text-center">
                                        <div class="form-group row <?=form_error('topic') ? 'has-error' : null?>">
                                            <label class="control-label text-left col-md-3">Topic*</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Topic" name="topic">
                                                <span id="topic_error" class="text-danger"><?=form_error('topic')?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row <?=form_error('nama') ? 'has-error' : null?>">
                                            <label class="control-label text-left col-md-3">Nama*</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Nama" name="nama">
                                                <span id="nama_error" class="text-danger"><?=form_error('nama')?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3">Pekerjaan</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3">Telepon</label>
                                            <div class="col-md-9">
                                                <input type="number" class="form-control" placeholder="Telepon" name="telepon">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3">Coordinat</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Coordinat" name="coordinat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3">Alamat</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" placeholder="Tulis Alamat Lengkap" name="alamat"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3">Penawaran</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" placeholder="Penawaran" name="penawaran">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="control-label text-left col-md-3">Penawaran Kembali</label>
                                            <div class="col-md-9">
                                                <input type="date" class="form-control" placeholder="Penawaran Kembali" name="penawaran_kembali">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="tambahLead" class="save-button waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-save"></i></button>
                            </form>
                        </div>
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
        $('#daftarAktivitasLead').ready(function(){
            // daftar = document.getElementById('activityContent');
            $('#tableActivityLead').show();
            $('#form-tambah-panggilan-telepon').hide();
            $('#form-tambah-tugas').hide();
        });
        $('#tambah-panggilan-telepon').click(function() {
            console.log('tambah-panggilan-telepon');
            // $('#activityContent').html(show);
            $('#tableActivityLead').hide();
            $('#form-tambah-panggilan-telepon').show();
            $('#form-tambah-tugas').hide();
            return false;
        });
        $('#daftarActivitasLead').click(function() {
            console.log('daftarActivitasLead');
            // $('#activityContent').html(show);
            $('#tableActivityLead').show();
            $('#form-tambah-panggilan-telepon').hide();
            $('#form-tambah-tugas').hide();
            return false;
        });
        $('#tambah-tugas').click(function() {
            console.log('tambah-tugas');
            // $('#activityContent').html(show);
            $('#tableActivityLead').hide();
            $('#form-tambah-panggilan-telepon').hide();
            $('#form-tambah-tugas').show();
            return false;
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#tambahLead").click(function(e){
                e.preventDefault();
                var data = $('.itemLead').serialize();
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: "<?= base_url('lead/simpan'); ?>",
                    data: data,
                    success: function(data){
                        if ($.isEmptyObject(data.error)) {
                            location.href = "<?= base_url('lead'); ?>";
                        }
                        else{
                            $("#topic_error").html(data.error.topic_error);
                            $("#nama_error").html(data.error.nama_error);
                            $("#telepon_error").html(data.error.telepon_error);
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
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        </script>
</body>

</html>