<?php  $this->load->view( 'layout/header' ); ?>
 <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><span></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <i class="fa fa-person"></i>
                <!-- <img src="#" class=""> -->
              </div>
              <!-- <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2>John Doe</h2>
              </div> -->
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <?php $this->load->view( 'layout/sidebar' ); ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- /menu footer buttons -->
          </div>
        </div>


        <!-- page content -->
        <div class="right_col" role="main">

        <?php (!empty($content) && isset($content)) ? $this->load->view($content) : ''; ?>
        </div>
        <!-- /page content -->

        <?php $this->load->view( 'layout/footer' ); ?>