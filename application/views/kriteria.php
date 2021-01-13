<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-key"></i> Data Kriteria</h6>
            </div>
            <div class="card-body">
            	<table class="table table-sm table-striped table-bordered table-hover" id="example">
            		<thead>
            			<tr>
            				<th width="1%">No</th>
            				<th>Kriteria</th>
            				<th>Bobot</th>
            				<th>Normalisasi</th>
            				<th>#</th>
            			</tr>
            		</thead>
            		<tbody>
            			<?php $no=1; foreach ($get as $data) { ?>
            				<tr>
            					<td><?php echo $no++; ?></td>
            					<td><?php echo $data->nama_kriteria ?></td>
            					<td class="text-right"><?php echo $data->bobot ?></td>
            					<td class="text-right"><?php echo number_format($data->normalisasi, 2) ?></td>
            					<td>
            						<a href="<?php echo base_url('kriteria/parameter/'.$data->id) ?>" class="btn btn-sm btn-success">Parameter</a>
            						<button type="button" class="btn btn-sm btn-info" onclick="edit('<?php echo $data->id ?>')">Edit</button>
            					</td>
            				</tr>
            			<?php } ?>
            		</tbody>
            		<tfoot>
            			<tr>
            				<td></td>
            				<td class="text-right"><b>&#931; Total</b></td>
            				<td class="text-right"><b><?php echo $sum->total; ?></b></td>
            				<td></td>
            				<td></td>

            			</tr>
            			
            		</tfoot>
            	</table>
            </div>
          </div>
	</div>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?php echo form_open('kriteria/edit'); ?>
		  <div class="form-group row">
		    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Kriteria</label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" id="inputEmail3" name="nama_kriteria" placeholder="Nama Kriteria">
		      <input type="hidden" name="id">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword3" class="col-sm-3 col-form-label">Bobot</label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" id="inputPassword3" name="bobot" placeholder="Bobot">
		    </div>
		  </div>		 		  
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
	</form>
    </div>
  </div>
</div>

<script>
	function edit(id) {
		$.ajax({
            url : "<?php echo site_url('index.php/kriteria/get')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data){
            	$('[name="nama_kriteria"]').val(data.nama_kriteria);
            	$('[name="bobot"]').val(data.bobot);
            	$('[name="id"]').val(data.id);
				$('#edit-modal').modal('show');

            },
                error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        }); 
	}

</script>