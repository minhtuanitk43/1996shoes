<?php
$products=$data['products'];
$paging=$data['paging'];
?>

        <div class="col-md-12">
          <div class="row">
            <?php foreach($products as $product){?>
              <div class="card col-md-4 col-sm-6 text-center">
           
                <img  
                  src="<?php echo BASE_URL; ?>public/upload/<?php echo $product['image'] ?>"
                  class="card-img-top" 
                  alt="shoes2"
                />
                <div class="card-body text-center alert alert-secondary">
                  <a href="<?php echo BASE_URL.'index.php?req=product/productDetail/'.$product['alias']?>" class=text-decoration-none class="card-title"><?php echo $product['productName'] ?></a>
                  <p class="card-text">
                    <span class="text-decoration-line-through"><?php echo number_format($product['price'],2) ?>$</span 
                    ><span class="fw-bold fs-5 text-danger"> <?php echo number_format($product['saleprice'],2) ?>$</span>
                  </p>
                  <a class="btn btn-primary" href='<?php echo BASE_URL?>cart/add/<?php echo $product['productId']?>/<?php echo $product['productName']?>/ <?php if($product['saleprice']<>0) echo $product['saleprice']; else echo $product['price']?>'>Add to cart</a>
                </div>
              </div>
             
            <?php } ?>   
                       
          </div>
        </div>
        <div class="row">
        <?php $paging->createLinks();?>
        </div>
    