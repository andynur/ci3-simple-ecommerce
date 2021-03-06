<div class="row">
	<div class="col-xs-12">
	  <div class="box">                
	    <div class="box-header">	      
			<div style="float: left">
				<h3 class="box-title" style="margin-top: 10px;"><?= $judul; ?></h3>
			</div>
			<div style="float: right;">	      
	    		<?= anchor($link . '/add', '<span class="glyphicon glyphicon-plus" area-hidden="true"></span>&nbsp; Tambah', ['class' => 'btn btn-sm btn-success']) ?> 	
	    	</div>
	    </div><!-- /.box-header -->
	    <div class="box-body table-responsive no-padding">
	      <table class="table table-hover" id="myTable">
			<thead>
				<tr>
					<th>#</th>
					<th>Nama Produk</th>
					<th>Foto Produk</th>
					<th>Deskripsi</th>
					<th>Harga</th>
					<th>Stok</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
	        <?php 
				$status = '<span class="glyphicon glyphicon-ok" area-hidden="true" style="color: green"></span>';      	
	        ?>
			<?php 
				$no = 1;
				foreach ($query as $product) : 
				?>
				<tr>
					<td style="vertical-align: middle;"><?= $no; ?></td>
					<td style="vertical-align: middle;"><?= $product->name; ?></td>
					<td style="vertical-align: middle;"><?php
						$product_image = ['src' => 'uploads/' . $product->image, 'width' => '100']; 
						echo img($product_image); ?>
					</td>
					<td style="vertical-align: middle;"><?= $product->description; ?></td>
					<td style="vertical-align: middle;">Rp. <?= number_format($product->price, 0, ',', '.'); ?></td>
					<td style="vertical-align: middle;"><?= $product->stock; ?></td>
					<td style="vertical-align: middle;">
						<?= anchor($link . '/edit/' . $product->id, '<i class="fa fa-edit" aria-hidden="true"></i>', ['class' => 'btn btn-primary btn-sm', 'style' => 'margin-top: 5px;']); ?>
						<?= anchor($link . '/delete/' . $product->id, '<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm top-btn', 'style' => 'margin-top: 5px;', 'id' => 'boxalert']); ?>
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