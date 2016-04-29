<div class="login">
   <div class="wrap">
     <ul class="breadcrumb breadcrumb__t"><a class="home" href="<?= base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a> / Konfirmasi</ul>
  
     <h4 class="title">Konfirmasi Pembayaran</h4>
              <div style="background-color: #f3f3f3; width: auto; float: left; margin-top: 10px 0">
            <p style="padding: 10px 0 10px 17px;">Nominal Transfer : <span style="background-color: #414a45; color: #fff; padding: 10px 15px;">Rp. <?= number_format($history->row()->total, 0, ',', '.'); ?> </span></p>
         </div>
        <div class="clear"></div> 
     <?= form_open('customer/payment_confirmation/'); ?>    
        
        <?php $error = form_error("invoice_id", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
        <div class="to">
          <label for="inputInvoiceId" class="col-sm-2 control-label">Invoice ID</label>
          <div>
            <input type="text" class="text" id="inputInvoiceId" name="invoice_id" placeholder="Masukkan Invoice ID" value="<?= ($invoice_id != 0 ? $invoice_id : '') ?>">
          </div>          
        </div>
        <div class="clear"></div> 
        <?php echo $error; ?>      


        <?php $error = form_error("amount", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
        <div class="to">
          <label for="inputAmount" class="col-sm-2 control-label">Jumlah Transfer</label>
          <div>
            <input type="text" class="text" id="inputAmount" name="amount" placeholder="Masukkan nominal transfer">
          </div>
        </div>
        <div class="clear"></div>
        <?php echo $error; ?> 

        <div class="clear"></div> 
        
        <div class="submit">
          <input type="submit" value="Konfirmasi">
        </div>

      </form>     
   </div>
</div>