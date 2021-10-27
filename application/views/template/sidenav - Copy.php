<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url(<?= base_url() ?>assets/material-pro/assets/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="<?= base_url() ?>assets/material-pro/assets/images/users/profile.png" alt="user" /> </div>
            <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe</a>
                <div class="dropdown-menu animated flipInY">
                    <a href="<?php echo base_url('login/member_logout'); ?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav no-margin">
            <ul id="sidebarnav">
                <li class="nav-small-cap">MENUS</li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/dashboard') ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/manage_menu') ?>" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Atur Menu </span></a>
                </li>
                <li class=""> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Pengguna</span></a>
                    <ul aria-expanded="false" class="collapse" style="height: 10px;">
                        <li><a href="<?= base_url() ?>user/users">Daftar Pengguan</a></li>
                        <li><a href="<?= base_url()?>pengguna/">Tambah Pengguna</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/annual_target') ?>" aria-expanded="false"><i class="fas fa-chart-line"></i><span class="hide-menu">Target Tahunan</span></a>
                </li>
                <li class=""> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Lead</span></a>
                    <ul aria-expanded="false" class="collapse" style="height: 10px;">
                        <li><a href="<?= base_url() ?>user/leads">Daftar Lead</a></li>
                        <li><a href="<?= base_url()?>lead/">Tambah Lead</a></li>
                    </ul>
                </li>
                <li class=""> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Opportunities</span></a>
                    <ul aria-expanded="false" class="collapse" style="height: 10px;">
                        <li><a href="<?= base_url() ?>user/opportunity">Daftar Opportunity</a></li>
                        <li><a href="map-vector.html">Tambah Opportunity</a></li>
                    </ul>
                </li>
                <li class=""> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Agreements</span></a>
                    <ul aria-expanded="false" class="collapse" style="height: 10px;">
                        <li><a href="<?= base_url() ?>user/agreements">Daftar Agreement</a></li>
                        <li><a href="<?= base_url()?>lead/">Tambah Agreement</a></li>
                    </ul>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/services') ?>" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Services </span></a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/sbu') ?>" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">SBU </span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>