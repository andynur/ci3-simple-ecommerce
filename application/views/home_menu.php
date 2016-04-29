<div class="mens">    
  <div class="main">
     <div class="wrap">
        <ul class="breadcrumb breadcrumb__t"><a class="home" href="<?= base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Beranda</a> / Menu</ul>
        <div class="cont span_2_of_3">
            <h2 class="head">DAFTAR MENU</h2>
                <div class="top-box">
                    <?php foreach ($products as $product) : ?>
                    <div class="col_1_of_3 span_1_of_3"> 
                        <a href="<?= base_url(); ?>/home/add_to_cart/<?= $product->id; ?>">
                            <div class="inner_content clearfix">
                                <div class="product_image">
                                <?php 
                                echo img([
                                        'src'   => 'uploads/' . $product->image,
                                        'alt' => $product->name
                                     ]); 
                                ?>
                                </div>
                                <!-- <div class="sale-box"><span class="on_sale title_shop">New</span></div>  -->
                                <!-- <div class="sale-box1"><span class="on_sale title_shop">Sale</span></div>   -->
                                <div class="price">
                                    <div class="cart-left">
                                        <p class="title"><?= $product->name; ?></p>
                                        <div class="price1">
                                          <span class="actual">Rp. <?= $product->price; ?></span>
                                        </div>
                                    </div>
                                    <div class="cart-right"> </div>
                                    <div class="clear"></div>
                                </div>              
                            </div>
                        </a>                        
                    </div>                    
                    <?php endforeach; ?>                   
                    <div class="clear"></div>
                </div>                                                      
            </div>
			<div class="rsidebar span_1_of_left">
				<h5 class="m_1">Kategori</h5>
					<ul class="kids">
						<li><a href="#">Hot</a></li>
						<li><a href="#">Keju</a></li>
						<li><a href="#">Coklat</a></li>
						<li><a href="#">Jumbo</a></li>
						<li><a href="#">Oriental</a></li>
						<li><a href="#">Classic</a></li>
						<li class="last"><a href="#">Glasses Shop</a></li>
					</ul>
                   <section  class="sky-form">
					<h4>Harga</h4>
						<div class="row row1 scroll-pane">
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>IDR 20.000 - 30.000</label>
							</div>
							<div class="col col-4">
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>IDR 30.000 - 50.000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>IDR 50.000 - 75.000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>IDR 75.000 - 100.000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>IDR 100.000 - 150.000</label>
								<label class="checkbox"><input type="checkbox" name="checkbox" ><i></i>IDR 150.000 - 200.000</label>
							</div>
						</div>
		        </section>
		      </div>
			<div class="clear"></div>
			</div>
		   </div>
		</div>