<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign | crud mahasiswa </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/fontawesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/custome/custom.css" rel="stylesheet">
  </head>

  <body style="background:#F7F7F7;">
    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">
            <form method="POST" action="<?php echo site_url('sign/check_sign') ?>">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="uname" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="upass" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default  pull-left rata-kiri" value="Log In" style="margin-left: 0px;">
                <!-- <a class="btn btn-default submit pull-left" href="">Log in</a> -->
              </div>
              <div class="clearfix">
                
              </div>
              <div class="separator">
                <?php if( $this->session->userdata('failed') ): ?>
                  <div class="alert alert-danger" role="alert"><?php echo $this->session->userdata('failed') ?></div>
                <?php endif; ?>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>