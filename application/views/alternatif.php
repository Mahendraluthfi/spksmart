<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users"></i> Data Alternatif</h6>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah Alternatif</button><p></p>
                <table class="table table-sm table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr class="text-center">
                            <th width="1%">No</th>
                            <th>Nama Alternatif</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($get as $data) { ?>
                            <tr class="text-center">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->nim ?></td>
                                <td><?php echo $data->jurusan ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" onclick="input('<?php echo $data->id ?>')">Input Nilai</button>
                                    <button type="button" class="btn btn-sm btn-warning" onclick="detail('<?php echo $data->id ?>')">Lihat Nilai</button>
                                    <button type="button" class="btn btn-sm btn-info" onclick="edit('<?php echo $data->id ?>')">Edit</button>
                                    <a href="<?php echo base_url('alternatif/alternatif_hapus/'.$data->id) ?>" onclick="return confirm('Hapus Alternatif ?')" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>                    
                </table>
            </div>
          </div>
	</div>
</div>

<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Alternatif</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	 <form action="#" id="form" class="form-horizontal">
		  <div class="form-group row">
		    <label class="col-sm-4 col-form-label">Nama Alternatif</label>
		    <div class="col-sm-8">
		      <input type="text" class="form-control" name="nama" placeholder="Nama Alternatif">		      
		    </div>
		  </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">NIM</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa">              
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jurusan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="jurusan" placeholder="Jurusan">              
            </div>
          </div>
		  	 		  
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" onclick="save()">Simpan</button>
      </div>
	</form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_nilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm">            
            <tbody>
                <tr>
                    <td width="30%">Nama Alternatif</td>
                    <td class="text-primary cnama"></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td class="text-primary cnim"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td class="text-primary cjurusan"></td>
                </tr>
            </tbody>
        </table>
         <hr>
         <form action="#" id="form-nilai" class="form-horizontal" style="font-size: 13px;">
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">IPK</label>
            <div class="col-sm-8">
                <input type="hidden" name="id_alter">
                <select name="ipk" class="form-control">
                        <option value="0">--Pilih--</option>
                    <?php foreach ($ipk as $data) { ?>
                        <option value="<?php echo $data->id ?>"><?php echo $data->nama_parameter.' ('.$data->nilai.')' ?></option>

                    <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Penghasilan Orang Tua</label>
            <div class="col-sm-8">
                <select name="pot" class="form-control">
                    <option value="0">--Pilih--</option>                    
                    <?php foreach ($pot as $data) { ?>
                        <option value="<?php echo $data->id ?>"><?php echo $data->nama_parameter.' ('.$data->nilai.')' ?></option>

                    <?php } ?>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Tanggungan Orang Tua</label>
            <div class="col-sm-8">
                <select name="tot" class="form-control">
                    <option value="0">--Pilih--</option>                    
                    <?php foreach ($tot as $data) { ?>
                        <option value="<?php echo $data->id ?>"><?php echo $data->nama_parameter.' ('.$data->nilai.')' ?></option>

                    <?php } ?>
                </select>
            </div>
          </div>
                      
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" onclick="save_nilai()">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm">            
            <tbody>
                <tr>
                    <td width="30%">Nama Alternatif</td>
                    <td class="text-primary cnama"></td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td class="text-primary cnim"></td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td class="text-primary cjurusan"></td>
                </tr>
            </tbody>
        </table>
         <hr>
        <table class="table table-sm table-bordered">  
            <thead>
                <tr>
                    <th>Kriteria</th>
                    <th>Parameter</th>
                    <th>Nilai</th>
                </tr>
            </thead>          
            <tbody id="show-table">
                
            </tbody>
        </table>
    </div>
  </div>
</div>

<script>
    var save_method; //for save method string
    var table;
    var gid;

    function add(){
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal      
        $('.modal-title').text('Tambah Alternatif'); // Set Title to Bootstrap modal title
    }


    function edit(id)
    {
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/alternatif/alternatif_get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="nama"]').val(data.nama);
            $('[name="nim"]').val(data.nim);
            $('[name="jurusan"]').val(data.jurusan);
            $('.modal-title').text('Edit Alternatif'); // Set title to Bootstrap modal title
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
        });
    }

    function save(){
      var url;            
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/alternatif/alternatif_simpan')?>";          
      }else{          
          url = "<?php echo site_url('index.php/alternatif/alternatif_edit/')?>" + gid;         
      }    
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }

      function input(id) {
          $.ajax({
            url : "<?php echo site_url('index.php/alternatif/nilai_get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('[name="ipk"]').val(data.ipk_value);
                $('[name="pot"]').val(data.pot_value);
                $('[name="tot"]').val(data.tot_value);
                $('[name="ipk"]').trigger('change');
                $('[name="pot"]').trigger('change');
                $('[name="tot"]').trigger('change');
                $('#modal_nilai').modal('show'); // show bootstrap modal when complete loaded
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

           $.ajax({
            url : "<?php echo site_url('index.php/alternatif/alternatif_get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('.cnama').text(data.nama);         
                $('[name="id_alter"]').val(id);
                $('.cnim').text(data.nim);         
                $('.cjurusan').text(data.jurusan);         
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
      }

      function save_nilai() {
          $.ajax({
            url : "<?php echo site_url('index.php/alternatif/nilai_save')?>/",
            type: "POST",
            data: $('#form-nilai').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               // console.log(data);
               $('#modal_nilai').modal('hide');
              location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }

      function detail(id) {
          $.ajax({
            url : "<?php echo site_url('index.php/alternatif/alternatif_get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                $('.cnama').text(data.nama);         
                $('[name="id_alter"]').val(id);
                $('.cnim').text(data.nim);         
                $('.cjurusan').text(data.jurusan);         
                $('#modal_detail').modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

          $.ajax({
            url : "<?php echo site_url('index.php/alternatif/detailnilai_get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                var html = '';
                var i;                
                for(i=0; i<data.length; i++){   
                    html += '<tr>'+
                        '<td>'+data[i].nama_kriteria+'</td>'+
                        '<td>'+data[i].nama_parameter+'</td>'+
                        '<td>'+data[i].nilai+'</td>'+
                        '</tr>';                                    
                }
                $('#show-table').html(html);   
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
      }
</script>

