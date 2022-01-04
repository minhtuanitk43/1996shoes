
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<?php
$cats=$data['cats'];
$paging=$data['paging'];
?>
<div class="text-center fs-3 text-primary fw-bold mb-3">CATEGORY LIST IN TRASH</div>
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
      <th class=text-center scope="col">catId</th>
      <th scope="col">catName</th>
      <th class=text-center scope="col">Status</th>
      <th class=text-center scope="col">Trash</th>
      <th class=text-center scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($cats as $c){?>
    <tr>
      <th class=text-center scope="row"><?php echo $i++ ?></th>
      <td class=text-center><?php echo $c['catId'] ?></td>
      <td><?php echo $c['catName'] ?></td> 
      <td class=text-center><a href='<?php echo BASE_URL?>admincategory/toggleStatus/<?php echo $c['catId']?>'><?php if($c['status']==1) echo '<i class="fas fa-check text-primary"></i>';
      else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class=text-center><?php echo $c['trash'] ?></td>
      <td  class=text-center><a data-toggle="tooltip" title="Xóa vĩnh viễn" href='<?php echo BASE_URL ?>admincategory/categoryDelete/<?php echo $c["catId"]?>' onclick='return confirm("Bạn có chắc muốn xoá vĩnh viễn nhóm sản phẩm này không ?")'><i class="me-1   fas fa-eraser"></i></a>|<a data-toggle="tooltip" title="Khôi phục" href='<?php echo BASE_URL?>admincategory/toggleTrash/<?php echo $c["catId"] ?>'><i class="ms-1 fas fa-trash-restore"></i></a></td>
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks();?>