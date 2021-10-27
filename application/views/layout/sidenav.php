<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile" style="background: url(<?= base_url() ?>assets/material-pro/assets/images/background/user-info.jpg) no-repeat;">
            <!-- User profile image -->
            <div class="profile-img"> <img src="<?= base_url() ?>assets/material-pro/assets/images/users/profile.png" alt="user" /> </div>
            <!-- User profile text-->
            <div class="profile-text">
                <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Markarn Doe</a>
                <div class="dropdown-menu animated flipInY">

                    <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item"><i class="fa fa-power-off"> </i> Logout</a>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav no-margin">
            <ul id="sidebarnav">
                <li class="nav-small-cap">MENUS</li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/dashboard') ?>" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/manage_menu') ?>" aria-expanded="false"><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Manage Menu </span></a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/users') ?>" aria-expanded="false"><i class="mdi mdi-account"></i><span class="hide-menu">Users</span></a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="<?= base_url('user/annual_target') ?>" aria-expanded="false"><i class="fas fa-chart-line"></i><span class="hide-menu">Annual Target</span></a>
                </li>
                <li class=""> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-map-marker"></i><span class="hide-menu">Maps</span></a>
                            <ul aria-expanded="false" class="collapse" style="height: 10px;">
                                <li><a href="map-google.html">Google Maps</a></li>
                                <li><a href="map-vector.html">Vector Maps</a></li>
                            </ul>
                        </li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>