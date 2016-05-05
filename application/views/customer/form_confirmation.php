<div class="register_account">
   <div class="wrap">
     <ul class="breadcrumb breadcrumb__t"><a class="home" href="<?= base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a> / Konfirmasi</ul>
  
     <h4 class="title">Konfirmasi Pembayaran</h4>
              
        <?= form_open('customer/payment_confirmation/' . $invoice_id); ?>    
        
        <div class="col_1_of_2 span_1_of_2">
          <?php $error = form_error("invoice_id", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="to">
            <label for="inputInvoiceId" class="col-sm-2 control-label">Faktur ID</label>
            <div>
              <input type="text" class="text" id="inputInvoiceId" name="invoice_id" placeholder="Masukkan Invoice ID" value="<?= ($invoice_id != 0) ? $invoice_id : '' ?>" disabled="disabled">
            </div>          
          </div>
          <div class="clear"></div> 
          <?php echo $error; ?> 
          
          <?php $error = form_error("bank_name", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="to">
            <label for="inputBankName" class="col-sm-2 control-label">Nama Bank</label>
            <div>
              <input type="text" class="text" id="inputBankName" name="bank_name" placeholder="Masukkan Nama Bank" value="<?= set_value('bank_name') ?>">
            </div>          
          </div>
          <div class="clear"></div> 
          <?php echo $error; ?> 
            
          <?php $error = form_error("account_name", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="to">
            <label for="inputAkun" class="col-sm-2 control-label">Nama Akun</label>
            <div>
              <input type="text" class="text" id="inputAkun" name="account_name" placeholder="Masukkan Nama Akun" value="<?= set_value('account_name') ?>">
            </div>          
          </div>
          <div class="clear"></div> 
          <?php echo $error; ?> 

        </div>

        <div class="col_1_of_2 span_1_of_2">
          <div class="to">
            <label for="nominal" class="col-sm-2 control-label">Nominal Transfer</label>
            <div>
              <input type="text" class="text" id="nominal" value="Rp. <?= number_format($history->row()->total, 0, ',', '.'); ?>" disabled="disabled">
            </div>          
          </div>
          <div class="clear"></div> 

          <?php $error = form_error("bank_destination", "<p class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="to">
            <label class="col-sm-2 control-label">Bank Tujuan</label>
            <div>
              <select name="bank_destination" class="frm-field required">
                <option value="">pilih bank:</option>         
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
                <option value="MANDIRI">MANDIRI</option>
                <option value="MUAMALAT">MUAMALAT</option>
              </select>
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
        </div>     

        <div class="clear"></div> 
        
        <div class="submit">        
          <input type="submit" value="Konfirmasi">
        </div>

      </form>     
   </div>
</div>