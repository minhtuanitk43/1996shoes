
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<?php
$links=$data['links'];
$paging=$data['paging'];
?>
<div class="text-center fs-3 text-primary fw-bold mb-3">LINK-PAGES LIST IN TRASH</div>
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
      <th class=text-center scope="col">Link Id</th>
      <th scope="col">Title</th>
      <th scope="col">Link</th>
      <th class=text-center scope="col">Trash</th>
      <th class=text-center scope="col">Status</th>
      <th class=text-center scope="col">Action</th>
      <th class=text-center scope="col">Detail</th>
      
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($links as $l){?>
    <tr>
      <th class=text-center scope="row"><?php echo $i++ ?></th>
      <td><?php echo $l['linkId'] ?></td>
      <td><?php echo $l['title'] ?></td>
      <td><?php echo $l['link'] ?></td>   
      <td class=text-center><?php echo $l['trash'] ?></td>
      <td class=text-center><a href='<?php echo BASE_URL?>adminlink/toggleStatus/<?php echo $l['linkId']?>'><?php if($l['status']==1) echo '<i class="fas fa-check text-primary"></i>'; else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class=text-center class=text-center><a data-toggle="tooltip" title="Xóa vĩnh viễn" href='<?php echo BASE_URL ?>adminlink/linkDelete/<?php echo $l["linkId"]?>' onclick='return confirm("Bạn có chắc muốn xoá vĩnh viễn link-poster này không ?")'><i class="me-1   fas fa-eraser"></i></a>|<a data-toggle="tooltip" title="Khôi phục" href='<?php echo BASE_URL?>adminlink/toggleTrash/<?php echo $l["linkId"] ?>'><i class="ms-1 fas fa-trash-restore"></i></a></td>
      <td class=text-center><a data-toggle="tooltip" title="Xem chi tiết" href='<?php echo BASE_URL?>adminlink/linkDetail/<?php echo $l['linkId']?>'><i class="fas fa-stream"></i></a></td>
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks();

