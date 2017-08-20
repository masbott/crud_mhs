<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="dashboard_graph">

      <div class="row x_title">
        <div class="col-md-6">
          <h3>Mahasiswa</h3>
        </div>
        <div class="col-md-6">
          
        </div>
      </div>

      <div class="col-md-9 col-sm-9 col-xs-12">
        <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
        <div style="width: 100%;">
          <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;">
            <form class="form-horizontal" id="form-mahasiswa" method="POST">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">NIM</label>
                <div class="col-sm-10">
                  <input type="text" name="nim" class="form-control validate" data-deskripsi="NIM" id="inputEmail3" placeholder="NIM" value="<?php if( isset( $getone->row()->nim ) ): echo  $getone->row()->nim; else : ''; endif; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" class="form-control validate" data-deskripsi="Nama" id="inputPassword3" placeholder="Nama" value="<?php if( isset( $getone->row()->nama ) ): echo  $getone->row()->nama; else : ''; endif; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea name="alamat" class="form-control validate" data-deskripsi="Alamat" cols="30" rows="10" placeholder="Alamat"><?php if( isset( $getone->row()->alamat ) ): echo  $getone->row()->alamat; else : ''; endif; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-default" name="edit" value="Tambah">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>
    </div>
  </div>
</div>
<br />

<div class="row">
</div>
<script type="text/javascript" src="<?php echo base_url('assets/jquery/js/jquery.min.js'); ?>"></script>

<script type="text/javascript">
// $(document).ready(function(){
  $('#form-mahasiswa').submit(function(e){
      var form = $(this), test = $('.validate'),submit=true;
        $('.validate').each(function(){
          var deskripsi = $(this).data('deskripsi');
          if($(this).val()=='') {
            submit=false;
            alert('Kolom ' + deskripsi + ' harus diisi.');
            return false;
          } else {
            submit=true;
          }
        });
        return submit;
      });
</script>