
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<?php
$customers=$data['customers'];
$ordermodel=new OrderModel;
$orders=$ordermodel->getAll(['trash'=>0]);
$usermodel=new UserModel;
$users=$usermodel->getAll(['trash'=>0,'status'=>1]);
$paging=$data['paging'];
?>
<div class="text-center fs-3 text-primary fw-bold mb-3">CUSTOMER LIST</div>
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
      <th class=text-center scope="col">Customer ID</th>
      <th class=text-center scope="col">User ID</th>
      <th class=text-center scope="col">Username</th>
      <th scope="col">Customer Name</th>
      <th class=text-center scope="col">Address</th>
      <th class=text-center scope="col">Phone</th>
      <th class=text-center scope="col">E-mail</th>
      <th class=text-center scope="col">Action</th>
      <th class=text-center scope="col">Order</th>
      
      
    </tr>
  </thead>
  <tbody>
  <?php 
  $i=1;
  foreach($customers as $c){?>
    <tr>
      <th class=text-center scope="row"><?php echo $i++ ?></th>
      <td class=text-center><?php echo $c['customerId'] ?></td>
      <td class=text-center><?php if($c['userId']!=0) echo $c['userId']; else echo '-' ?></td>
      <td class=text-center><?php $user=$usermodel->get(['userId'=>$c['userId']]); if(isset($user)) echo $user['username']; else echo '-' ?></td>
      <td><?php echo $c['fullname'] ?></td>   
      <td class=text-center><?php echo $c['address'] ?></td>
      <td class=text-center><?php echo $c['phone'] ?></td>
      <td class=text-center><?php echo $c['email'] ?></td>
      <td class=text-center><a data-toggle="tooltip" title="Chỉnh sửa" href='<?php echo BASE_URL?>admincustomer/updatecustomer/<?php echo $c["customerId"]?>'><i class="fas fa-edit ms-1"></i></a></td>
      <td class=text-center><a data-toggle="tooltip" title="Order" href='<?php echo BASE_URL?>adminorder/orderdetail/<?php foreach($orders as $order) if($order['customerId']==$c['customerId']) echo $order['orderId'] ?>'><i class="fas fa-file-invoice"></i></a></td>
    </tr>
  <?php }?>  
  </tbody>
</table>
<?php $paging->createLinks()?>

