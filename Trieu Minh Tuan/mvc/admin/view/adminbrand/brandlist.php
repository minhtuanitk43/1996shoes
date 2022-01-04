
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<?php
$brands=$data['brands'];
$paging=$data['paging'];
?>
<div class="text-center fs-3 text-primary fw-bold mb-3">BRANDS LIST</div>
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
      <th class=text-center scope="col">STT</th>
      <th class=text-center scope="col">BrandId</th>
      <th scope="col">Brand Name</th>
      <th class=text-center scope="col">Trash</th>
      <th class=text-center scope="col">Status</th>
      <th class=text-center scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($brands as $b){?>
    <tr>
      <th class=text-center scope="row"><?php echo $i++ ?></th>
      <td class=text-center><?php echo $b['brandId'] ?></td>
      <td><?php echo $b['brandName'] ?></td> 
      <td class=text-center><?php echo $b['trash'] ?></td>
      <td class=text-center><a href='<?php echo BASE_URL?>adminbrand/toggleStatus/<?php echo $b['brandId']?>'><?php if($b['status']==1) echo '<i class="fas fa-check text-primary"></i>';
      else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class=text-center><a data-toggle="tooltip" title="Xóa" href='<?php echo BASE_URL ?>adminbrand/toggleTrash/<?php echo $b["brandId"]?>' onclick='return confirm("Bạn có chắc muốn xoá nhóm sản phẩm này không ?")'><i class="fas fa-trash me-1"></i></a>|<a data-toggle="tooltip" title="Chình sửa" href='<?php echo BASE_URL?>adminbrand/updatebrand/<?php echo $b["brandId"] ?>'><i class="fas fa-edit ms-1"></i></a></td>
      
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks()?>
