<div class="register_account">
   <div class="wrap">
     <ul class="breadcrumb breadcrumb__t"><a class="home" href="<?= base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a> &nbsp;/&nbsp; Riwayat</ul>

     <h4 class="title">Riwayat Belanja</h4>
     <?php if ($history != false) { ?>	
     <table class="responstable" style="width: 100%;">
		<thead>
			<tr>
				<th>#</th>
				<th>No Faktur</th>
				<th>Tanggal Faktur</th>
				<th>Tanggal Akhir Faktur</th>
				<th>Total</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$no = 1;
			foreach ($history as $row) : 				
			?>
			<tr>
				<td style="width: auto;"><?= $no; ?></td>
				<td style="width: auto;"><?= $row->id; ?></td>
				<td style="width: auto;"><?= $row->date; ?></td>
				<td style="width: auto;"><?= $row->due_date; ?></td>
				<td style="width: auto;">Rp. <?= number_format($row->total, 0, ',', '.'); ?></td>
				<td style="width: auto;">
					<?php 
					$now = date('Y-m-d H:i:s');

					if ($row->status != 'confirmed' || $row->status != 'paid' || $row->status != 'unpaid' || $row->status != 'canceled' AND  $now > $row->due_date) {
						$row->status = "expired";
					}
					echo $row->status;
					?>
				</td>	
					<td>
						<?= anchor('customer/detail/' . $row->id, '<i class="fa fa-eye" aria-hidden="true"></i> Lihat', ['class' => 'btn btn-primary top-btn']); ?>
						<?php 
							if ($row->status == 'unpaid') {								
								echo anchor('customer/payment_confirmation/' . $row->id, '<i class="fa fa-usd" aria-hidden="true"></i> Konfirmasi ', ['class' => 'btn btn-info top-btn']); 
							} else if ($row->status == 'paid') {
								echo anchor('#', '<i class="fa fa-check-square" aria-hidden="true"></i> Berhasil', ['class' => 'btn btn-success top-btn']); 
							} else if ($row->status == 'canceled') {
								echo anchor('customer/payment_confirmation/' . $row->id, '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Konfirmasi Ulang ', ['class' => 'btn btn-warning top-btn']);
							} else if ($row->status == 'expired') {
								echo anchor('menu', '<i class="fa fa-history" aria-hidden="true"></i> Belanja Ulang', ['class' => 'btn btn-info top-btn']); 
							}

							if ($row->status != 'expired' AND $row->status != 'canceled') {
								echo anchor('customer/cancel/' . $row->id, '<i class="fa fa-ban" aria-hidden="true"></i> Batal', ['class' => 'btn btn-warning top-btn']);
							}						
						?>
						<?= anchor('customer/delete/' . $row->id, '<i class="fa fa-trash" aria-hidden="true"></i> Hapus', ['class' => 'btn btn-danger top-btn']); ?>
					</td>					
			</tr>
			<?php 
			$no++;
			endforeach; 
			?>      
		</tbody>                             
        </table>

        <div align="center">
		<?php } else { ?>
			<p>Tidak ada riwayat belanja. Silahkan <?= anchor('/', 'berbelanja :)'); ?></p>
		<?php } ?>	
        </div>
   </div>
</div>