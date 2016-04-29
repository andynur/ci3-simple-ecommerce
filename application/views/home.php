<!-- slider -->
<?php $this->load->view('layout/slider.php'); ?>

<div class="main">
    <div class="wrap">
        <div class="section group">
            <div class="cont span_2_of_3">
            <h2 class="head">MENU TERBARU</h2>
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
                    <div class="col_1_of_3 span_1_of_3 readmore">
                        <?= anchor('menu', 'LIHAT SEMUA MENU')?>
                    </div>
                    
                    <div class="clear"></div>
                </div>                                                      
            </div>
            <!-- sidebar -->
            <?php $this->load->view('layout/sidebar.php'); ?>

            <div class="clear"></div>
        </div>
    </div>
</div>