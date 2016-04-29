<div class="register_account">
   <div class="wrap">
     <ul class="breadcrumb breadcrumb__t"><a class="home" href="<?= base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a> &nbsp;/&nbsp; <a href="<?= base_url() ?>customer/shopping_history"><i class="fa fa-history" aria-hidden="true"></i> Riwayat</a> &nbsp;/&nbsp; Detail</ul>

     <h4 class="title">Detail Kode Faktur #<?= $invoice_id ?></h4>
	      <table class="responstable" style="width: 65%; margin: 30px auto;">
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
					<td style="width: auto;"><?= $no; ?></td>
					<td style="width: auto;"><?= $order->product_id; ?></td>
					<td><?= $order->product_name; ?></td>
					<td style="width: auto;"><?= $order->qty; ?></td>
					<td style="width: auto;">Rp. <?= number_format($order->price, 0, ',', '.'); ?></td>
					<td style="width: auto;">Rp. <?= number_format($subtotal, 0, ',', '.'); ?></td>
				</tr>
				<?php 
				$no++;
				}; 
				?>      
			</tbody>     
			<tfoot style="font-weight: bold;">
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Total</td>
					<td>Rp. <?= number_format($total, 0, ',', '.'); ?></td>
				</tr>
			</tfoot>                        
	      </table>                                 
   </div>
</div>