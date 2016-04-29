<div class="register_account">
   <div class="wrap">
     <ul class="breadcrumb breadcrumb__t"><a class="home" href="<?= base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a> / Keranjang</ul>

     <h4 class="title">DAFTAR ISI KERANJANG</h4>
     <?php if ($this->cart->total_items() == 0) { ?>
            <div style="line-height: 50px;">
                <p>Isi keranjang kosong, silahkan pesan terlebih dahulu :)</p>
                <?= anchor('menu', '<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp; Kembali Belanja', ['class' => 'btn btn-primary']) ?>
            </div>
     <?php 
     } else {
        // echo "<pre>" . print_r($this->cart->contents(), 1) . "</pre>";
     ?>
     <form action="<?= base_url('home/update_cart'); ?>" method="post">
     <table class="responstable">
            <thead>
                <tr>
                    <th>#</th>
                    <th data-th="Detail">Menu </th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>            
                <?php 
                $i = 0;
                foreach ($this->cart->contents() as $items): 
                $i++;
                ?>                
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <div>
                            <?= img([
                                    'src' => 'uploads/' . $items['image'],
                                    'alt' => $items['name'],
                                    'style' => 'width: 100px; padding: 5px; background-color: #fff; float: left;'
                                 ]); 
                            ?>
                            <div style="float: left; margin-left: 10px; text-align: center;">
                                <?= $items['name']; ?>
                            </div>
                        </div>
                    </td>
                    <td>                        
                        <input type="text" name="qty" value="<?= $items['qty']; ?>" style="width: 50px; text-align: center ">
                        <input type="hidden" name="rowid" value="<?= $items['rowid']; ?>">
                    </td>
                    <td>Rp. <?= number_format($items['price'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
                    <td>
                        <?= anchor('home/remove_cart/' . $items['rowid'], '<i class="fa fa-times" aria-hidden="true"></i> Hapus', ['class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot style="font-weight: bold;">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>Total</td>                    
                    <td align="right">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
                </tr>
            </tfoot>
        </table>

        <div align="center" style="margin-bottom: 20px;">
            <?= anchor('home/clear_cart', '<i class="fa fa-trash" aria-hidden="true"></i>&nbsp; Bersihkan keranjang', ['class' => 'btn btn-danger top-btn']) ?>
            <?= anchor('menu', '<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>&nbsp; Lanjut belanja', ['class' => 'btn btn-primary top-btn']) ?>
            <button type="submit" class="btn btn-info top-btn"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Ubah Jumlah</button>
            <?= anchor('order/success', '<i class="fa fa-usd" aria-hidden="true"></i>&nbsp; Belanja selesai', ['class' => 'btn btn-success top-btn']) ?>                        
        </div>        
        </form>
        <?php } ?>
   </div>
</div>