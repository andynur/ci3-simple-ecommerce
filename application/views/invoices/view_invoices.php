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
					<th>User</th>
					<th>Tanggal Pesan</th>
					<th>Tanggal Tempo</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
	        <?php 
				$status = '<span class="glyphicon glyphicon-ok" area-hidden="true" style="color: green"></span>';      	
	        ?>
			<?php 
				$no = 1;
				foreach ($query as $invoice) : 
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $invoice->id; ?></td>
					<td><?= $invoice->fullname; ?></td>
					<td><?= $invoice->date; ?></td>
					<td><?= $invoice->due_date; ?></td>
					<td><?= $invoice->status; ?></td>
					<td>
						<?= anchor($link . '/detail/' . $invoice->id, '<i class="fa fa-eye" aria-hidden="true"></i>', ['class' => 'btn btn-primary btn-sm']); ?>
						<?php if ($invoice->status == 'confirmed'): ?>
						<?= anchor($link . '/approve/' . $invoice->id, '<i class="fa fa-check" aria-hidden="true"></i>', ['class' => 'btn btn-success btn-sm']); ?>
						<?php endif ?>
						<?= anchor($link . '/delete/' . $invoice->id, '<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'id' => 'boxalert']); ?>
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