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
            <?php if( $this->session->userdata('success') ): ?>
              <div class="alert alert-success" role="alert"><?php echo $this->session->userdata('success'); ?></div>
            <?php endif; ?>
            <a href="<?php echo site_url('mahasiswa/add') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
            <table class="table table-striped table-bordered" id="table_mhs" width="100%">
              <thead>
                <tr>
                  <td class="text-center" width="2%">No.</td>
                  <td class="text-center" width="5%">NIP</td>
                  <td class="text-center" width="10%">Nama</td>
                  <td class="text-center" width="15%">Alamat</td>
                  <td class="text-center" width="5%">Aksi</td>
                </tr>
              </thead>
            </table>
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


<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table_mhs').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('mahasiswa/list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

});

</script>