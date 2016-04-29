 <div class="box box-default">
    <div class="box-header with-border">
      <div style="float: left">
        <h3 class="box-title" style="margin-top: 10px;"><?= $judul; ?></h3>
      </div>
      <div style="float: right;">       
          <?= anchor($link, '<span class="glyphicon glyphicon-chevron-left" area-hidden="true"></span>&nbsp; Kembali', ['class' => 'btn btn-sm btn-primary']) ?>           
        </div>
    </div><!-- /.box-header -->
    <div class="box-body">
      <div>
        <form action="<?php echo base_url(); ?><?php echo $aksi; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
     
		  <?php $error = form_error("name", "<p style='margin-left: 130px;' class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label for="inputName" class="col-sm-2 control-label">Nama Produk</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputName" name="name" placeholder="Masukkan nama produk" value="<?= (isset($query) && !empty($query->name)) ? $query->name : set_value('name'); ?>">
            </div>
          </div>
          <?php echo $error; ?>      

		  <?php $error = form_error("description", "<p style='margin-left: 130px;' class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label for="inputDesc" class="col-sm-2 control-label">Deskripsi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputDesc" name="description" placeholder="Masukkan deskripsi produk" value="<?= (isset($query) && !empty($query->description)) ? $query->description : set_value('description'); ?>">
            </div>
          </div>
          <?php echo $error; ?>  

		  <?php $error = form_error("price", "<p style='margin-left: 130px;' class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label for="inputHarga" class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputHarga" name="price" placeholder="Masukkan harga produk" value="<?= (isset($query) && !empty($query->price)) ? $query->price : set_value('price'); ?>">
            </div>
          </div>
          <?php echo $error; ?>    

		  <?php $error = form_error("stock", "<p style='margin-left: 130px;' class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label for="inputStock" class="col-sm-2 control-label">Stok</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputStock" name="stock" placeholder="Masukkan stock yang tersedia" value="<?= (isset($query) && !empty($query->stock)) ? $query->stock : set_value('stock'); ?>">
            </div>
          </div>
          <?php echo $error; ?>  

		  <?php $error = form_error("userfile", "<p style='margin-left: 130px;' class='text-danger'><i class='fa fa-times-circle'></i> ", '</p>'); ?>
          <div class="form-group <?php echo $error ? 'has-error' : '' ?>">
            <label for="inputGambar" class="col-sm-2 control-label">Gambar</label>
            <div class="col-sm-10">
              <?php if (isset($query) && !empty($query->image)) : ?>
              	<img src="<?= base_url() ?>/uploads/<?= $query->image ?>" alt="<?= $query->name ?>" style="width: 200px">
              <?php endif ?>
              <input type="file" class="form-control" id="inputGambar" name="userfile">
            </div>
          </div>
          <?php echo $error; ?>  

          <div class="form-group">
          	<div class="col-sm-offset-2 col-sm-10">
	            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-save" area-hidden="true"></span>&nbsp; <?= $btn; ?></button>
           </div>
          </div><!-- /.form-group -->                  

        </form>              
      </div><!-- /.row -->
    </div><!-- /.box-body -->            
</div><!-- /.box -->