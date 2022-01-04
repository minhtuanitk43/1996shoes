
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];
extract($_POST);
?>
</div>

<?php
$posters=$data['posters'];
$paging=$data['paging'];
?>

<div class="text-center fs-3 text-primary fw-bold mb-3">POSTER LIST</div>

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
      <th class="text-center border-start" scope="col">STT</th>
      <th class="text-center border-start" scope="col">Poster ID</th>
      <th class="text-center border-start" scope="col">Image</th>
      <th class="col-md-3">Title</th>
      <th class="text-center" scope="col">Status</th>
      <th class="text-center" scope="col">Trash</th>
      <th class="text-center" scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($posters as $p){?>
    <tr>
      <th class="text-center border-start" scope="row"><?php echo $i++ ?></th>
      <td class="text-center border-start"><?php echo $p['posterId'] ?></td>
      <td class="text-center border-start"><img width=100 src="<?php echo BASE_URL?>public/upload/<?php echo $p['image']?>"></td>
      <td ><?php echo $p['title'] ?></td> 
      <td class="text-center"><a href='<?php echo BASE_URL?>adminposter/toggleStatus/<?php echo $p['posterId']?>'><?php if($p['status']==1) echo '<i class="fas fa-check text-primary"></i>';
      else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class="text-center"><?php echo $p['trash'] ?></td>
      <td class="text-center"><a data-toggle="tooltip" title="Xoá sản phẩm" href='<?php echo BASE_URL ?>adminposter/toggleTrash/<?php echo $p["posterId"]?>' onclick='return confirm("Bạn có chắc muốn xoá poster này không ?")'><i class="fas fa-trash me-1"></i></a>|<a data-toggle="tooltip" title="Sửa sản phẩm" href='<?php echo BASE_URL?>adminposter/updateposter/<?php echo $p["posterId"] ?>'><i class="fas fa-edit ms-1"></i></a></td>
      
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks()?>
