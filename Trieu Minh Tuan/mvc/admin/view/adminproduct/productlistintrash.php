
<?php
$products=$data['products'];
$paging=$data['paging'];
?>
<div class="text-center fs-3 text-primary fw-bold mb-3">PRODUCT LIST IN TRASH</div>
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
      <th class=text-center scope="col">ID</th>
      <th class=text-center scope="col">Image</th>
      <th scope="col">ProductName</th>
      <th class=text-center scope="col">Status</th>
      <th class=text-center scope="col">Price</th>
      <th class=text-center scope="col">Trash</th>
      <th class=text-center scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($products as $p){?>
    <tr>
      <th class="text-center border" scope="row"><?php echo $i++ ?></th>
      <td class="text-center border"><?php echo $p['productId'] ?></td>
      <td class="text-center border"><img width=150 src="<?php echo BASE_URL."public/upload/".$p['image'] ?>"></td>
      <td><?php echo $p['productName'] ?></td> 
      <td class="text-center border"><a  href='<?php echo BASE_URL?>adminproduct/toggleStatus/<?php echo $p['productId']?>'><?php if($p['status']==1) echo '<i class="fas fa-check text-primary"></i>';
      else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class="text-center border"><?php echo $p['price'] ?></td>
      <td class="text-center border"><?php echo $p['trash'] ?></td>
      <td class="text-center border"><a data-toggle="tooltip" title="Xóa vĩnh viễn" href='<?php echo BASE_URL ?>adminproduct/productDelete/<?php echo $p["productId"]?>' onclick='return confirm("Bạn có chắc muốn xoá vĩnh viễn sản phẩm này không ?")'><i class="me-1   fas fa-eraser"></i></a>|<a data-toggle="tooltip" title="Khôi phục" href='<?php echo BASE_URL?>adminproduct/toggleTrash/<?php echo $p["productId"] ?>'><i class="ms-1 fas fa-trash-restore"></i></a></td>
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks();?>