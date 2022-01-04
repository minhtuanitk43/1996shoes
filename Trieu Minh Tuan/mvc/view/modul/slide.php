<?php
$imagemodel=new SlideModel;
$images=$imagemodel->getAll(['trash'=>0, 'status'=>1, 'position'=>1]);
$count=count($images);
?>


<div class="container-fluld text-center"> <!-- slide -->
<h3 class="text-center text-light bg-danger">SẢN PHẨM BÁN CHẠY</h3>
      <div id="carouselExampleDark" class="carousel carousel-dark slide border" data-bs-ride="carousel">
        <div class="carousel-indicators mb-0">
          <button
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <?php 
          $a=1; $b=2;
          for($i=1;$i<$count;$i++) {?>
          <button
            type="button"
            data-bs-target="#carouselExampleDark"
            data-bs-slide-to="<?php echo $a++ ?>"
            aria-label="Slide <?php echo $b++ ?>"
          ></button>
          <?php }?>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
            <a href="<?php echo BASE_URL.'index.php?req=product/productDetail/'.$images[0]['alias']?>">
              <img  class="img-fluid" src="<?php if(file_exists(BASE_URL.'public/img/'.$images[0]['image'])) echo BASE_URL.'public/img/'.$images[0]['image']; else echo BASE_URL.'public/upload/'.$images[0]['image'] ?>" class="d-block w-100" alt="..." /></a>
              <div class="mb-3">
              <a href="<?php echo BASE_URL.'index.php?req=product/productDetail/'.$images[0]['alias']?>" class=text-decoration-none class="card-title"><h5><?php echo $images[0]['imageName']?></h5></a>
              <?php
          if(($images[0]['saleprice']!='')&&($images[0]['saleprice']!=0)){?>
            <span class="text-decoration-line-through"><?php echo number_format($images[0]['price'])?>$</span>
            <span class="fw-bold fs-5 text-danger"><?php echo number_format($images[0]['saleprice'])?>$</span>
          <?php }
          else {?>
            <span class='fs-6 fw-bold'><?php echo number_format($images[0]['price'])?>$</span>
          <?php }?>
              </div>
            </div>
            <?php unset($images[0]) ?>
       
          <?php foreach($images as $image){?> 
            <div class="carousel-item" data-bs-interval="10000">
              <a href="<?php echo BASE_URL.'index.php?req=product/productDetail/'.$image['alias']?>"><img  class="img-fluid" src="<?php if(file_exists(BASE_URL.'public/img/'.$image['image'])) echo BASE_URL.'public/img/'.$image['image']; else echo BASE_URL.'public/upload/'.$image['image'] ?>" class="d-block w-100" alt="..." /></a>
              <div class="mb-3">
              <a href="<?php echo BASE_URL.'index.php?req=product/productDetail/'.$image['alias'];?>" class=text-decoration-none class="card-title"><h5><h5><?php echo $image['imageName']?></h5></a>
              <?php
          if(($image['saleprice']!='')&&($image['saleprice']!=0)){?>
            <span class="text-decoration-line-through"><?php echo number_format($image['price'])?>$</span>
            <span class="fw-bold fs-5 text-danger"><?php echo number_format($image['saleprice'])?>$</span>
          <?php }
          else {?>
            <span class='fs-6 fw-bold'><?php echo number_format($image['price'])?>$</span>
          <?php }?>
          </p>
              </div>
            </div>
          <?php }?>  
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleDark"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleDark"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
</div>