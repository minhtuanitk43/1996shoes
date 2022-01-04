<?php
$brandmodel=new BrandModel;
$brands=$brandmodel->getAll(['trash'=>0, 'status'=>1]);
?>

<div class="card mt-2">
<div class="card-header bg-primary text-center pb-2">
              <h5 class='fw-bold mb-0 text-light'>THƯƠNG HIỆU</h5>
            </div>
            <ul class="list-group list-group-flush">
              <?php foreach( $brands as $brand){?>
                       <button type="button" class="btn btn-outline-primary"><li class='text-center'><a class="text-reset text-decoration-none"  href="<?php echo BASE_URL ?>index.php?req=product/productByBrand/<?php echo $brand['alias'].'/'.LIMIT.'/0'?> "><?php echo $brand['brandName']?></a></li></button>
                      <?php }?>
            </ul>
          </div>
         