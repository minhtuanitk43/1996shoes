<?php
$products=$data['products'];
$paging=$data['paging'];
$brand=$data['brand'];
?>


<div class="row">
  <div class="col alert alert-primary fw-bold fs-5 text-center"><h1 class='text-uppercase'><?php echo $brand['brandName']?></h1></div>
</div>
        

<div class="row"><!--row 01-->
  <?php foreach($products as $product){?>
    <div class="col-md-4 col-sm-6 text-center card">
        <div>
          <img src="<?php echo BASE_URL;?>public/upload/<?php echo $product['image']?>" class="card-img-top"  alt="<?php echo $product['alias']?>"/></div>
        <div class="card-body text-center alert alert-secondary">
        <a class='fs-5 text-decoration-none' href="<?php echo BASE_URL.'product/productDetail/'.$product['alias']?>" class=text-decoration-none class="card-title"><?php echo $product['productName'] ?></a>
          <p class="card-text"> 
          <?php
          if(($product['saleprice']!='')&&($product['saleprice']!=0)){?>
            <span class="text-decoration-line-through"><?php echo number_format($product['price'])?>$</span>
            <span class="fw-bold fs-5 text-danger"><?php echo number_format($product['saleprice'])?>$</span>
          <?php }
          else {?>
            <span class='fs-6 fw-bold'><?php echo number_format($product['price'])?>$</span>
          <?php }?>
          </p>
          <a class="btn btn-primary" href='<?php echo BASE_URL?>cart/add/<?php echo $product['productId']?>/<?php echo $product['productName']?>/ <?php if($product['saleprice']<>0) echo $product['saleprice']; else echo $product['price']?>'>Add to cart</a>
        </div>
    </div>
  <?php }?>    
  <div class=row>
  <?php
  $paging->createLinks();
  ?>
  </div>
</div>          
        
          
        