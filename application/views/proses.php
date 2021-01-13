<div class="row">
	<div class="col-12">
		<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-users"></i> Data Alternatif</h6>
            </div>
            <div class="card-body">
                <a href="<?php echo base_url('proses/update_result') ?>" class="btn btn-primary btn-sm" onclick="add()"><i class="fa fa-history"></i> Update Hasil</a><p></p>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="text-center bg-light">
                            <th>Rank</th>
                            <th>Nama Alternatif</th>
                            <th>NIM</th>
                            <th>Jurusan</th>
                            <th>Hasil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($alternatif as $data) { ?>
                            <tr class="text-center bg-info text-white">
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $data->nama ?></td>
                                <td><?php echo $data->nim ?></td>
                                <td><?php echo $data->jurusan ?></td>
                                <td style="font-weight: bold;"><?php echo number_format($data->total,2) ?></td>
                            </tr>
                            <tr class="bg-light">
                                <td></td>
                                <td colspan="4">
                                    <table class="table table-sm" style="font-size: 13px;">
                                        <thead>
                                            <tr>
                                                <th>Kriteria</th>
                                                <th>Nilai</th>
                                                <th>Bobot</th>
                                                <th>Cmax-Couti (a)</th>
                                                <th>Cmax-Cmin (b)</th>
                                                <th>a/b</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data->nilaihasil as $datanilai) { ?>
                                            <tr>
                                                <td><?php echo $datanilai->nama_kriteria ?></td>
                                                <td><?php echo $datanilai->nilai_bulat ?></td>
                                                <td><?php echo $datanilai->bobot_wj ?></td>
                                                <td><?php echo $datanilai->param_a ?></td>
                                                <td><?php echo $datanilai->param_b ?></td>
                                                <td><?php echo number_format($datanilai->result,2) ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </td>                                
                            </tr>
                        <?php } ?>
                    </tbody>                    
                </table>
            </div>
          </div>
	</div>
</div>