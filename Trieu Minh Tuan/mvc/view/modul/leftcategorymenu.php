<?php
$catmodel=new CategoryModel;
$cats=$catmodel->getAll(['trash'=>0, 'status'=>1]);
?>

<div class="card">
            <div class="card-header bg-primary text-center pb-2">
              <h5 class='fw-bold mb-0 text-light'>DÒNG SẢN PHẨM</h5>
            </div>
            <ul class="list-group list-group-flush">
              <?php foreach( $cats as $cat){?>
                <button type="button" class="btn btn-outline-primary"><li  class='text-center'><a class="text-reset text-decoration-none"  href="<?php echo BASE_URL ?>index.php?req=product/productByCat/<?php echo $cat['alias'].'/'.LIMIT.'/0'?> "><?php echo $cat['catName']?></a></li></botton>
                      <?php }?>
            </ul>
          </div>