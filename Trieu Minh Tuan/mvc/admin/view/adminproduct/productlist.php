
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];
extract($_POST);
?>
</div>

<?php
$products=$data['products'];
$paging=$data['paging'];

$catmodel=new AdminCategoryModel;
$cats=$catmodel->getAll(['trash'=>0,'status'=>1]);
$brandmodel=new AdminBrandModel;
$brands=$brandmodel->getAll(['trash'=>0,'status'=>1]);
$slidemodel=new SlideModel;

?>

<div class="text-center fs-3 text-primary fw-bold mb-3">PRODUCTS LIST</div>
<form action='' class="d-flex border  p-2" method=post >

  <input name="productName" class="me-3 " type="search" placeholder="Product Name" value="<?=!empty($productName)?$productName:""?>">
  <input name="productId" class="me-3 col-2" type="search" placeholder="Product Id" value="<?=!empty($productId)?$productId:""?>">
  
  <select  name=brandId class="me-3 fw-bold">
    <option value="">
            Brand
    </option>
    <?php foreach($brands as $brand){?>
        <option value="<?php echo $brand['brandId'] ?>" <?=!empty($brandId)&&($brandId==$brand['brandId'])?"selected" : ""?>>
          <?php echo $brand['brandName'] ?>
        </option>
    <?php }?>
  </select>
  <select  name=catId class="me-3 fw-bold">
    <option value="">
            Category
    </option>
    <?php foreach($cats as $cat){?>
        <option value="<?php echo  $cat['catId']?>" <?=!empty($catId)&&$catId==$cat['catId']?"selected":""?>>
          <?php echo $cat['catName'] ?>
        </option>
    <?php }?>
  </select>

  <button class=" btn btn-primary col-1" type=submit>Search</button>
</form>

<div class='row button btn-warning'>
<?php
if(!empty($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>
</div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th class="text-center" scope="col">STT</th>
      <th class="text-center" scope="col">ID</th>
      <th class="text-center" scope="col">Image</th>
      <th class="col-md-3">Product Name</th>
      <th class="text-center" scope="col">Status</th>
      <th class="text-center" scope="col">Price</th>
      <th class="text-center" scope="col">Sale Price</th>
      <th class="text-center" scope="col">Trash</th>
      <th class="text-center" scope="col">SlideShow</th>
      <th class="text-center" scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($products as $p){?>
    <tr>
      <th class="text-center border" scope="row"><?php echo $i++ ?></th>
      <td class="text-center border"><?php echo $p['productId'] ?></td>
      <td class="text-center border"><img width=100 src="<?php echo BASE_URL?>public/upload/<?php echo $p['image']?>"></td>
      <td class="border"><?php echo $p['productName'] ?></td> 
      <td class="text-center"><a href='<?php echo BASE_URL?>adminproduct/toggleStatus/<?php echo $p['productId']?>'><?php if($p['status']==1) echo '<i class="fas fa-check text-primary"></i>';
      else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class="text-center border"><?php echo $p['price'] ?></td>
      <td class="text-center border"><?php if(($p['saleprice']=='')||($p['saleprice']==0))echo 'N/A';else echo $p['saleprice'] ?></td>
      <td class="text-center border"><?php echo $p['trash'] ?></td>
      <td class="text-center border"><?php if($slidemodel->get(['alias'=>$p['alias']])) { ?><a data-toggle="tooltip" title="Gỡ sản phẩm khỏi SlideShow" href='<?php echo BASE_URL ?>adminslide/removeFromSlide/<?php echo $p['alias']?>'><i class="fas fa-minus-circle"></i></a><?php } else { ?><a data-toggle="tooltip" title="Thêm sản phẩm vào SlideShow" href='<?php echo BASE_URL ?>adminslide/addToSlide/<?php echo $p['productId']?>'><i class="fas fa-plus-circle"></i></a><?php } ?></td>
      <td class="text-center border"><a data-toggle="tooltip" title="Xoá sản phẩm" href='<?php echo BASE_URL ?>adminproduct/toggleTrash/<?php echo $p["productId"]?>' onclick='return confirm("Bạn có chắc muốn xoá sản phẩm này không ?")'><i class="fas fa-trash me-1"></i></a>|<a data-toggle="tooltip" title="Chỉnh sửa" href='<?php echo BASE_URL?>adminproduct/updateproduct/<?php echo $p["productId"] ?>'><i class="fas fa-edit ms-1"></i></a></td>
      
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks()?>
