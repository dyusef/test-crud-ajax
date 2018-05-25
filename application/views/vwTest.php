<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- STYLE -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/style/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/style/css/bootstrap.min.css" type="text/css" />
  </head>
  <body style="padding-top: 50px">
    <div id="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-success">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-11">
                  <h2>Tambah Data</h2>
                </div>
                <div class="col-md-1" style="padding-top: 20px">
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#modal-create"><button class="btn btn-success" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></a>
                </div>
              </div>
            </div>
            <div class="panel-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td width="10">ID</td>
                    <td width="200">Nama</td>
                    <td>Alamat</td>
                    <td width="130px">Aksi</td>
                </tr>
                </thead>
                <tbody id="lihatdata">

                </tbody>
              </table>
            </div>            
          </div>
        </div>
      </div>
      <!-- modal add -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal-create" data-backdrop="static" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Tambahkan Data</h4>
            </div>
            <div class="modal-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <form id="form-tambah" name="form-tambah">
                    <label for="entry_nama" class="col-sm-2 control-label">Nama : </label>
                    <div class="col-sm-10">
                      <input type="text" name="entry_nama" class="form-control" id="entry_nama" placeholder="Masukan Nama" required">
                    </div>
                    <label for="entry_alamat" class="col-sm-2 control-label">Alamat : </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="entry_alamat" name="entry_alamat" placeholder="Masukan Alamat" required"></textarea>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" id='btn-simpan' name='simpan'>Simpan</button>
            </div>
            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

      <!-- modal update -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal-update" data-backdrop="static" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Ubah Data</h4>
            </div>
            <div class="modal-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <form id="form-ubah" name="form-ubah">
                    <input type="hidden" name="update_id" id="update_id" value="0">
                    <label for="update_nama" class="col-sm-2 control-label">Nama : </label>
                    <div class="col-sm-10">
                      <input type="text" name="update_nama" class="form-control" id="update_nama" placeholder="Masukan Nama" required">
                    </div>
                    <label for="update_alamat" class="col-sm-2 control-label">Alamat : </label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="update_alamat" name="update_alamat" placeholder="Masukan Alamat" required"></textarea>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" id='btn-ubah' name='ubah'>Ubah</button>
            </div>
            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

      <!-- modal hapus -->
      <div class="modal fade" tabindex="-1" role="dialog" id="modal-delete" data-backdrop="static" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Hapus Data</h4>
            </div>
            <div class="modal-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <h2 class="text-center">Yakin ingin menghapus entry ini?</h2>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" id='btn-hapus' name='ubah'>Hapus</button>
            </div>
            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

          </div>
        </body>
        <script src="<?php echo base_url();?>assets/style/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/style/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/style/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>assets/style/js/jquery.js" type="text/javascript"></script>
        <!-- ajax -->
        <script>
        $(document).ready(function(){
          // simpan data
          $('#btn-simpan').on('click',function(){
            /*alert("Test");*/
            $.ajax({
              // test/tambah_data berasal dari controller
              url: "<?php echo base_url(); ?>index.php/test/tambah_data",
              type: "POST",
              data: $('#form-tambah').serialize(),
              dataType: 'json',
              async:false,
              success: function(data){                
                  if (data.status)
                  {
                    $('#form-tambah')[0].reset();
                    alert('Data dibuat!');
                    //location.reload();
                    lihatEntry();
                  }
              },
              error: function(){
                alert('Error!!!');
              }
            });
          });


          //fungsi get data ubah
        $('#lihatdata').on('click','.klik-edit', function(){
          var id = $(this).attr('data');
          // alert(id);
          $('#modal-update').modal('show');
          $('#form-ubah').attr('action','<?php echo base_url(); ?>index.php/test/perbarui_data');
          $.ajax({
            type : 'ajax',
            method : 'get',
            url : '<?php echo base_url(); ?>index.php/test/ubah_data',
            data : {id: id},
            dataType : 'json',
            success : function(data)
            {
              $('input[name=update_nama]').val(data.nama);
              $('textarea[name=update_alamat]').val(data.alamat);
              $('input[name=update_id]').val(data.id);
            },
            error : function()
            {
              alert('Gagal mengubah data!!!');
            }
          });

          // ubah data
          $('#btn-ubah').on('click',function(){
            /*alert("Test");*/
            var id = $('#update_id').val();
            //alert(id);
            $.ajax({
              // test/perbarui_data berasal dari controller
              url: "<?php echo base_url(); ?>index.php/test/perbarui_data",
              type: "POST",
              data : $('#form-ubah').serialize(),
              dataType: 'json',
              success: function(data){ 
              //console.log(data);                                 
                  alert('Data diubah!');
                  //location.reload();
                  lihatEntry();
              },
              error: function(){
                alert('Error!!!');
              }
            });
          });
        });


        // fungsi hapus data
        $(document).ready(function(){
            $('#lihatdata').on('click','.klik-hapus', function(){
              var id = $(this).attr('data');
              //alert(id);
              $('#modal-delete').data('id',id).modal('show');
            });
          });

        $(document).ready(function(){
        });

        $('#btn-hapus').on('click', function(){
          var id = $('#modal-delete').data('id');
          //alert(id);
          $.ajax({
            url: "<?php echo base_url(); ?>index.php/test/hapus_data",
            type: "POST",
            data: {id:id},
            dataType: 'json',
            async: false,
            success: function(data){
              alert('Entry dihapus');
              $('#row-id-'+id).remove();
              $('#modal-delete').modal('hide');
              lihatEntry();
            },
            error: function(){
              alert('Error');
              $('#modal-delete').modal('hide');
            }
          });
        });


        lihatEntry();
          //fungsi lihat data entry
          function lihatEntry(){
            $.ajax({
              type : 'ajax',
              url : "<?php echo base_url(); ?>index.php/test/lihat_data",
              dataType : 'json',
              success : function(data)
              {
                // console.log(data);
                var html = '';
                var i;
                for (i=0;i<data.length;i++){
                  html += '<tr id="row-id-'+data[i].id+'">'+
                          '<td>'+data[i].id+'</td>'+
                          '<td>'+data[i].nama+'</td>'+
                          '<td>'+data[i].alamat+'</td>'+
                          '<td align="center">'+
                          '<button class="btn btn-warning klik-edit" type="button" id="btn_edit" data="'+data[i].id+'"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button> | '+
                          '<button class="btn btn-danger klik-hapus" type="button" id="btn_delete" data="'+data[i].id+'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>'+
                          '</td>'+
                          '</tr>';
                }
                $('#lihatdata').html(html);
              },
              error : function()
              {
                alert('Gagal mengambil data dari DB');
              }
            });
          }
        });
        </script>
      </html>