<?php $user_session = $this->session->all_userdata();?>
<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header text-center">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#/">
                <i class="fa fa-shopping-bag"></i>
                <span>Products</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul style="display: none;" class="treeview-menu">
                <li>
                  <?= anchor('dashboard/products', '<i class="fa fa-list"></i> <span>Daftar Produk</span>') ?>
                </li> 
                <li>
                  <?= anchor('dashboard/products/add', '<i class="fa fa-plus-circle"></i> <span>Tambah Produk</span>') ?>
                </li>                    
              </ul>
            </li>   
            <li>
              <?= anchor('dashboard/invoices', '<i class="fa fa-list"></i> <span>Invoices</span>') ?>
            </li>           
            <li>
              <?= anchor('/', '<i class="fa fa-circle-o text-aqua"></i> <span>Back to Home</span>') ?>
            </li>                
                <!-- <li class="treeview">
                  <a href="#/">
                    <i class="fa fa-user"></i>
                    <span>Pejabat</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul style="display: none;" class="treeview-menu">
                    <li><a href="<?php echo base_url()."pejabat"; ?>"><i class="fa fa-circle-o"></i>Data Pejabat</a></li>                    
                    <li><a href="<?php echo base_url()."pejabat/pekerjaan"; ?>"><i class="fa fa-circle-o"></i>Riwayat Pekerjaan</a></li>
                    <li><a href="<?php echo base_url()."pejabat/pendidikan"; ?>"><i class="fa fa-circle-o"></i>Riwayat Pendidikan</a></li>                      
                  </ul>
                </li>  -->                 
          </ul>
        </section>
        <!-- /.sidebar -->