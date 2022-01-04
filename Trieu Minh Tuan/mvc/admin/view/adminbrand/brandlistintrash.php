
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<?php
$brands=$data['brands'];
$paging=$data['paging'];
?>
<div class="text-center fs-3 text-primary fw-bold mb-3">BRAND LIST IN TRASH</div>
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
      <th class=text-center scope="col">brandId</th>
      <th scope="col">brandName</th>
      <th class=text-center scope="col">Status</th>
      <th class=text-center scope="col">Trash</th>
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
      <td class=text-center><a href='<?php echo BASE_URL?>adminbrand/toggleStatus/<?php echo $b['brandId']?>'><?php if($b['status']==1) echo '<i class="fas fa-check text-primary"></i>';
      else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class=text-center><?php echo $b['trash'] ?></td>
      <td class=text-center ><a data-toggle="tooltip" title="Xóa vĩnh viễn" href='<?php echo BASE_URL ?>adminbrand/brandDelete/<?php echo $b["brandId"]?>' onclick='return confirm("Bạn có chắc muốn xoá vĩnh viễn thương hiệu sản phẩm này không ?")'><i class="me-1   fas fa-eraser"></i></a>|<a data-toggle="tooltip" title="Khôi phục" href='<?php echo BASE_URL?>adminbrand/toggleTrash/<?php echo $b["brandId"] ?>'><i class="ms-1 fas fa-trash-restore"></i></a></td>
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks();?>