
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<?php
$orders=$data['orders'];
$paging=$data['paging'];
$customermodel=new CustomerModel;
$customers=$customermodel->getAll(['trash'=>0]);
?>
<div class="text-center fs-3 text-primary fw-bold mb-3">ORDER PROCESSED LIST</div>
<div class='row button btn-warning'>
<?php
if(!empty($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>
</div>
  <div class="text-end">
  <button class="btn btn-primary me-2"><a class="text-decoration-none text-reset" href='<?php echo BASE_URL?>adminorder/orderlist/<?php echo LIMIT ?>/0'>All Orders list</a></button>
    <button class="btn btn-primary me-2"><a class="text-decoration-none text-reset" href='<?php echo BASE_URL?>adminorder/orderprocessinglist/<?php echo LIMIT ?>/0'>Orders in Processing</a></button>
  </div>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th class=text-center scope="col">STT</th>
      <th class=text-center scope="col">Order ID</th>
      <th scope="col">Customer Name</th>
      <th class=text-center scope="col">Order Date</th>
      <th class=text-center scope="col">Status</th>
      <th class=text-center scope="col">Action</th>
      <th class=text-center scope="col">Detail</th>
      
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($orders as $o){?>
    <tr>
      <th class=text-center scope="row"><?php echo $i++ ?></th>
      <td class=text-center><?php echo $o['orderId'] ?></td>
      <td><?php foreach($customers as $c) if($c['customerId']==$o['customerId']) echo $c['fullname'] ?></td>   
      <td class=text-center><?php echo $o['orderDate'] ?></td>
      <td class=text-center><?php if($o['status']==1) echo 'Processing'; else echo 'Processed' ?></td>
      <td class=text-center><a href='<?php echo BASE_URL ?>adminorder/toggleTrash/<?php echo $o["orderId"]?>' onclick='return confirm("Bạn có chắc muốn xoá nhóm sản phẩm này không ?")'><i class="fas fa-trash me-1"></i></a></td>
      <td class=text-center><a href='<?php echo BASE_URL?>adminorder/orderDetail/<?php echo $o['orderId']?>'><i class="fas fa-stream"></i></a></td>
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks()?>
