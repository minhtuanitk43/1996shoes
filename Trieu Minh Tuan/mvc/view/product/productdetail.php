<?php
$currentproduct=$data['currentproduct'];
$sameProducts=$data['sameProducts'];
?>
  <div class='row'>
  <div class="card mb-3"> <!--chi tiết sản phẩm-->
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo BASE_URL; ?>public/upload/<?php echo $currentproduct['image']?> " alt="<?php echo $currentproduct['alias']?>" class=img-fluid>
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title alert alert-primary"><?php  echo $currentproduct['productName']?></h5>
                  <div><?php echo $currentproduct['detail']?></div>
                  <?php
              if($currentproduct['saleprice']!=''&&$currentproduct['saleprice']!=0){?>
                <span class="text-decoration-line-through"><?php echo number_format($currentproduct['price'])?>$</span>
                <span class="fw-bold fs-5 text-danger"><?php echo number_format($currentproduct['saleprice'])?>$</span>
              <?php }
              else {?>
                <span class="fs-6 fw-bold">Price: <?php echo number_format($currentproduct['price'])?>$</span>
              <?php }?>
                  </p>
                  <a href="<?php echo BASE_URL?>cart/add/<?php echo $currentproduct['productId']?>/<?php echo $currentproduct['productName']?>/<?php if($currentproduct['saleprice']<>0) echo $currentproduct['saleprice']; else echo $currentproduct['price']?>" class="btn btn-primary">Add to cart</a>
                </div>
              </div>
            </div>
  </div>
              </div>
         
  <div class="row"> <!--SẢN PHẨM TƯƠNG TỰ-->
            <div class="col-md-12 alert alert-primary fw-bold fs-4 text-center">SẢN PHẨM TƯƠNG TỰ</div>
               
                <?php foreach($sameProducts as $sameProduct){?>
                 <div class="col-md-4 col-sm-6 text-center card">
                    <div>
                      <img src="<?php echo BASE_URL;?>public/upload/<?php echo $sameProduct['image']?>" class="card-img-top"  alt="<?php echo $sameProduct['alias']?>"/></div>
                    <div class="card-body text-center alert alert-secondary">
                    <a class='fs-5 text-decoration-none' href="<?php echo BASE_URL.'product/productDetail/'.$sameProduct['alias']?>" class=text-decoration-none class="card-title"><?php echo $sameProduct['productName'] ?></a>
                      <p class="card-text"> 
                      <?php
                      if(($sameProduct['saleprice']!='')&&($sameProduct['saleprice']!=0)){?>
                        <span class="text-decoration-line-through"><?php echo number_format($sameProduct['price'])?>$</span>
                        <span class="fw-bold fs-5 text-danger"><?php echo number_format($sameProduct['saleprice'])?>$</span>
                      <?php }
                      else {?>
                        <span class="fs-6 fw-bold"><?php echo number_format($sameProduct['price'])?>$</span>
                      <?php }?>
                      </p>
                      <a class="btn btn-primary" href='<?php echo BASE_URL?>cart/add/<?php echo $sameProduct['productId']?>/<?php echo $sameProduct['productName']?>/<?php if($sameProduct['saleprice']<>0) echo $sameProduct['saleprice']; else echo $sameProduct['price']?>'>Add to cart</a>
                    </div>
                  </div>
                <?php }?>  
               
  </div>
        
  
