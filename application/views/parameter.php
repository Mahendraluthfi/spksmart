<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="float-left">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-key"></i> Data Parameter - Kriteria <?php echo $kriteria->nama_kriteria ?></h6>                    
                </div>
                <div class="float-right">
                    <a href="<?php echo base_url('kriteria') ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-left"></i> Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-plus"></i> Tambah Parameter</button><p></p>
            	<table class="table table-sm table-striped table-bordered table-hover" id="example">
            		<thead>
            			<tr class="text-center">
            				<th width="1%">No</th>
            				<th>Parameter</th>
            				<th>Nilai</th>
            				<th width="10%">#</th>
            			</tr>
            		</thead>
            		<tbody>
            			<?php $no=1; foreach ($get as $data) { ?>
            				<tr class="text-center">
            					<td><?php echo $no++; ?></td>
            					<td><?php echo $data->nama_parameter ?></td>
            					<td><?php echo $data->nilai ?></td>
            					<td>
            						<button type="button" class="btn btn-sm btn-info" onclick="edit('<?php echo $data->id_param ?>')">Edit</button>
            						<a href="<?php echo base_url('kriteria/parameter_hapus/'.$data->id_param.'/'.$data->id_kriteria) ?>" onclick="return confirm('Hapus Parameter ?')" class="btn btn-sm btn-danger">Hapus</a>
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
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="#" id="form" class="form-horizontal">
                <div class="form-body">                  
                  <div class="form-group row">
                      <label class="control-label col-md-3">Parameter</label>
                      <div class="col-md-9">
                        <input name="nama_parameter" placeholder="Nama Parameter" class="form-control" type="text">
                      </div>
                  </div>                                          
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" onclick="save()">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
	</form>
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
        $('.modal-title').text('Tambah Parameter'); // Set Title to Bootstrap modal title
    }


    function edit(id)
    {
      save_method = 'update';
      gid = id;
      $('#form')[0].reset(); // reset form on modals
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('index.php/kriteria/parameter_get')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="nama_parameter"]').val(data.nama_parameter);
            $('[name="nilai"]').val(data.nilai);
            $('.modal-title').text('Edit Parameter'); // Set title to Bootstrap modal title
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
      var id_kriteria = '<?php echo $this->uri->segment(3) ?>';      
      if(save_method == 'add'){
          url = "<?php echo site_url('index.php/kriteria/parameter_simpan/')?>"+ id_kriteria;          
      }else{          
          url = "<?php echo site_url('index.php/kriteria/parameter_edit/')?>" + gid;         
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
</script>
