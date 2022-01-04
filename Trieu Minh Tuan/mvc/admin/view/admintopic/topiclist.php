
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];
extract($_POST);
?>
</div>

<?php
$topics=$data['topics'];
$taging=$data['paging'];
?>

<div class="text-center fs-3 text-primary fw-bold mb-3">TOPIC LIST</div>

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
      <th class="text-center border-start" scope="col">Topic ID</th>
      <th class="text-center border-start" scope="col">Image</th>
      <th class="col-1">Title</th>
      <th class="col-5">Content</th>
      <th class="text-center" scope="col">Create Date</th>
      <th class="text-center" scope="col">Status</th>
      <th class="text-center" scope="col">Trash</th>
      <th class="text-center" scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($topics as $t){?>
    <tr>
      <th class="text-center border-start" scope="row"><?php echo $i++ ?></th>
      <td class="text-center border-start"><?php echo $t['topicId'] ?></td>
      <td class="text-center border-start"><img width=100 src="<?php echo BASE_URL?>public/upload/<?php echo $t['image']?>"></td>
      <td ><?php echo $t['title'] ?></td> 
      <td ><button class="accordion"><?php echo substr($t["content"], 0, 100)?>...</button>
          <div class="panel"><?php echo $t['content'] ?></div>
      </td> 
      <td class="text-center border-start"><?php echo $t['createDate'] ?></td>
      <td class="text-center"><a href='<?php echo BASE_URL?>admintopic/toggleStatus/<?php echo $t['topicId']?>'><?php if($t['status']==1) echo '<i class="fas fa-check text-primary"></i>';
      else echo '<i class="fas fa-times text-danger"></i>' ?></td>
      <td class="text-center"><?php echo $t['trash'] ?></td>
      <td class="text-center"><a data-toggle="tooltip" title="Xoá sản phẩm" href='<?php echo BASE_URL ?>admintopic/toggleTrash/<?php echo $t["topicId"]?>' onclick='return confirm("Bạn có chắc muốn xoá topic này không ?")'><i class="fas fa-trash me-1"></i></a>|<a data-toggle="tooltip" title="Sửa sản phẩm" href='<?php echo BASE_URL?>admintopic/updatetopic/<?php echo $t["topicId"] ?>'><i class="fas fa-edit ms-1"></i></a></td>
      
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $taging->createLinks()?>
