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
                        <h3 class="text-themecolor">Edit Menu</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item">Manajemen Menu</li>
                            <li class="breadcrumb-item active">Edit Menu</li>
                        </ol>
                    </div>

                </div>
                <!-- Start Content -->
                <div class="d-flex justify-content-center">
                    <div class="card col-6 ">
                        <div class="card-body">
                            <h3 align=center>Edit Menu</h3>
                            <hr>
                            <form action="<?= base_url('menu/update/' . $data[0]->ID_MENU) ?>" method="post">
                                <div class="form-group">
                                    <label for="icon" class="control-label">Nama Menu <span class="require">*</span>:</label>
                                    <div class="from-group">
                                        <select name="icon" name=icon id="icon" class="col-md-2 form-control " onchange="showIcon()">
                                            <option value =''>icon</option>
                                            <option value="<i class='mdi mdi-clipboard-text'>">Dokumen</option>
                                            <option value="<i class='mdi mdi-account'>">Akun</option>
                                            <option value="<i class='mdi mdi-chart-bar'>">Diagram</option>
                                            <option value="<i class='mdi mdi-settings'>">Gear</option>
                                        </select>
                                        <input type="text" value="<?= $data[0]->NAMA_MENU ?>" class="form-control col-md-9 float-right" onkeyup="showMenu()" name=menu id="menu" required>
                                    </div>
                                    <br>
                                    <div class="row form-group justify-content-center">
                                        <div class="col-md-1 " id="showIcon"></div>
                                        <p id="showMenu"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="link" class="control-label">Link<span class="require">*</span>:</label>
                                    <input type="text" value="<?= $data[0]->LINK ?>" class="form-control" id="link" name="link" onkeyup="showLink()" required>
                                    <br>
                                    <br>
                                    <div class="row form-group justify-content-center">
                                        <p class="col-md-12" id="showLink"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Parent Menu <span class="require">*</span>:</label>
                                    <?php if ($data[0]->MEN_ID_MENU == null) : ?>
                                        <select name="parent" required class="form-control" disabled id="">
                                        <?php else : ?>
                                            <select name="parent" required class="form-control" id="">
                                            <?php endif ?>
                                            <option value="">Pilih parent menu...</option>
                                            <?php foreach ($menu as $select) { ?>
                                                <?php if ($select->ID_MENU == $data[0]->MEN_ID_MENU) : ?>
                                                    <option selected value="<?= $select->ID_MENU ?>"><?= $select->NAMA_MENU ?></option>
                                                <?php else : ?>
                                                    <?php if ($data[0]->ID_MENU != $select->ID_MENU) : ?>
                                                        <option value="<?= $select->ID_MENU ?>"><?= $select->NAMA_MENU ?></option>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php } ?>
                                            </select>
                                </div>
                                <div class="float-right">
                                    <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Submit</button>
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
        <script>
            function showIcon() {
                var value = document.getElementById('icon').value;

                document.getElementById('showIcon').innerHTML = value;
            }

            function showMenu() {
                var value = document.getElementById('menu').value;

                document.getElementById('showMenu').innerHTML = value;
            }

            function showLink() {
                document.getElementById('showLink').innerHTML = '<?= base_url() ?>' + document.getElementById('link').value;
            }


        </script>
</body>

</html>