<div class="row">
	<div class="col-xs-12">
	  <div class="box">                
	    <div class="box-header">	      
			<div style="float: left">
				<h3 class="box-title" style="margin-top: 10px;"><?= $judul; ?></h3>
			</div>
<!-- 			<div style="float: right;">	      
	    		<?= anchor($link . '/add', '<span class="glyphicon glyphicon-plus" area-hidden="true"></span>&nbsp; Tambah', ['class' => 'btn btn-sm btn-success']) ?> 	
	    	</div> -->
	    </div><!-- /.box-header -->
	    <div class="box-body table-responsive no-padding">
	      <table class="table table-hover" id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Faktur ID</th>
					<th>Nama Bank</th>
					<th>Nama Akun</th>
					<th>Bank Tujuan</th>
					<th>Nominal Transfer</th>
					<th>Tanggal Kirim</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				foreach ($query as $row) : 
		        	if ($row->check == 1) {
						$status = '<span class="glyphicon glyphicon-ok" area-hidden="true" style="color: green"></span>';      		
		        	} else {
		        		$status = '<span class="glyphicon glyphicon-remove" area-hidden="true" style="color: red"></span>';      		
		        	}
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $row->invoice_id; ?></td>
					<td><?= $row->bank_name; ?></td>
					<td><?= $row->account_name; ?></td>
					<td><?= $row->bank_destination; ?></td>
					<td style="text-align: right">Rp. <?= number_format($row->amount, 0, ',', '.'); ?></td>
					<td style="text-align: center"><?= $row->date; ?></td>
					<td style="text-align: center"><?= $status; ?></td>
					<td style="text-align: center">
						<?= anchor($link . '/delete/' . $row->id, '<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'id' => 'boxalert']); ?>
					</td>
				</tr>
				<?php 
				$no++;
				endforeach; 
				?>      
			</tbody>                             
	      </table>
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
</div><!-- /.row (main row) -->