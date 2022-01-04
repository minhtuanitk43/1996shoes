
<?php
$posters=$data['posters'];
$paging=$data['paging'];
?>
<div class="text-center fs-3 text-primary fw-bold mb-3">POSTER LIST IN TRASH</div>
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
      <th class=text-center scope="col">Poster ID</th>
      <th class=text-center scope="col">Image</th>
      <th scope="col">Title</th>
      <th class=text-center scope="col">Status</th>
      <th class=text-center scope="col">Trash</th>
      <th class=text-center scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($posters as $p){?>
    <tr>
      <th class=text-center scope="row"><?php echo $i++ ?></th>
      <td class=text-center><?php echo $p['posterId'] ?></td>
      <td class=text-center><img width=150 src="<?php echo BASE_URL."public/upload/".$p['image'] ?>"></td>
      <td><?php echo $p['title'] ?></td> 
      <td class=text-center><a  href='<?php echo BASE_URL?>adminposter/toggleStatus/<?php echo $p['posterId']?>'><?php if($p['status']==1) echo '<i class="fas fa-check text-primary"></i>';
      else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class=text-center><?php echo $p['trash'] ?></td>
      <td class=text-center class=text-center><a data-toggle="tooltip" title="Xóa vĩnh viễn" href='<?php echo BASE_URL ?>adminposter/posterDelete/<?php echo $p["posterId"]?>' onclick='return confirm("Bạn có chắc muốn xoá vĩnh viễn poster này không ?")'><i class="me-1   fas fa-eraser"></i></a>|<a data-toggle="tooltip" title="Khôi phục" href='<?php echo BASE_URL?>adminposter/toggleTrash/<?php echo $p["posterId"] ?>'><i class="ms-1 fas fa-trash-restore"></i></a></td>
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks();?>