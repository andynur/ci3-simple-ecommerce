<div class="row">
	<div class="col-xs-12">
	  <div class="box">                
	    <div class="box-header">	      
			<div style="float: left">
				<h3 class="box-title" style="margin-top: 10px;"><?= $judul; ?></h3>
			</div>
			<div style="float: right;">	      
	    		<?= anchor($link, '<span class="glyphicon glyphicon-chevron-left" area-hidden="true"></span>&nbsp; Kembali', ['class' => 'btn btn-sm btn-primary']) ?> 	
	    	</div>
	    </div><!-- /.box-header -->
	    <div class="box-body table-responsive no-padding">
	      <table class="table table-hover" id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Kode Produk</th>
					<th>Nama Produk</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$no = 1;
				$total = 0;
				foreach ($orders as $order) {
					$subtotal = $order->qty * $order->price;
					$total += $subtotal;
				?>
				<tr>
					<td><?= $no; ?></td>
					<td><?= $order->product_id; ?></td>
					<td><?= $order->product_name; ?></td>
					<td><?= $order->qty; ?></td>
					<td><?= $order->price; ?></td>
					<td><?= $subtotal; ?></td>
<!-- 					<td>
						<?= anchor($link . '/detail/' . $invoices->id, '<i class="fa fa-eye" aria-hidden="true"></i>', ['class' => 'btn btn-primary btn-sm']); ?>
						<?= anchor($link . '/delete/' . $invoices->id, '<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'id' => 'boxalert']); ?>
					</td> -->
				</tr>
				<?php 
				$no++;
				}; 
				?>      
			</tbody>     
			<tfoot>
				<tr>
					<td colspan="5" align="right">Total</td>
					<td><?= $total; ?></td>
				</tr>
			</tfoot>                        
	      </table>
	    </div><!-- /.box-body -->
	  </div><!-- /.box -->
	</div>
</div><!-- /.row (main row) -->