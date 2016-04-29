<!-- <?php $user_session = $this->session->all_userdata();?> -->
<!-- Logo -->
        <a href="<?php echo base_url(); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>P</b>H</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Pizza</b>Hot</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url()."assets/adminlte/"; ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= $this->session->userdata('username'); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url()."assets/adminlte/"; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                    <?= $this->session->userdata('group') == 1 ? 'Administrator' : 'Member' ?>
                      <small>Memiliki Akses ke Semua Modul.</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo base_url()."logout"; ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
             
            </ul>
          </div>
        </nav>