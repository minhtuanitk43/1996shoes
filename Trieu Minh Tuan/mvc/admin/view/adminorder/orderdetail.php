  <?php
  $order=$data['order'];
  $orderdetails=$data['orderdetails'];
  extract($orderdetails);

  foreach($orderdetails as $orderdetail);

  $customermodel=new CustomerModel;
  $customers=$customermodel->getAll(['trash'=>0]);
  $productmodel=new ProductModel;
  $products=$productmodel->getAll(['trash'=>0,'status'=>1]);
  ?>
<div class='row button btn-warning'>
  <?php
  if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<div class="text-center fs-3 text-primary fw-bold mb-3">ORDER DETAIL</div>
<div class='row button btn-warning'>
  <?php
  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
</div>

<div class="row ms-5">
  <div class="text-end">
    <button class="btn btn-primary me-2"><a class="text-decoration-none text-reset" href='<?php echo BASE_URL?>adminorder/orderprocessinglist/<?php echo LIMIT ?>/0'>Orders in Processing</a></button>
    <button class="btn btn-primary"><a class="text-decoration-none text-reset" href='<?php echo BASE_URL?>adminorder/orderprocessedlist/<?php echo LIMIT ?>/0'>Orders in Processed</a></button>
  </div>
</div>

<div class="text-center">
  <div class="row text-center">
      <h3>Order ID: <?php echo $order['orderId'] ?></h3>
  </div>
  
    <table class="table d-inline">
      <thead class="thead-light">
        <tr class=bg-light>
          <th class="text-center border"scope="col">STT</th>
          <th class="text-center border"scope="col">Product Id</th> 
          <th class="text-center border" scope="col">Product Name</th>
          <th class="text-center border" scope="col">Price</th>
          <th class="text-center border" scope="col">Quantity</th>     
        </tr>
      </thead>
      <tbody>
        <?php
        $i=1;
        $total=0;
        foreach($orderdetails as $orderdetail) { $total+=$orderdetail['price']*$orderdetail['quantity'];?>
          <tr>
            <td class="text-center border" scope="row"><?php echo $i++?></td>
            <td class="text-center border" scope="row"><?php echo $orderdetail['productId'] ?></td>
            <td class="text-center border" scope="row"><?php foreach($products as $product) if($product['productId']==$orderdetail['productId']) echo $product['productName'] ?></td>
            <td class="text-center border"><?php  echo $orderdetail['price'] ?>$</td>
            <td class="text-center border"><?php echo $orderdetail['quantity'] ?></td>   
          </tr>  
        <?php }?>
          <tr>
            <th colspan=2 class="text-center border">Total</throw> 
            <th colspan=3 class="text-center border text-danger fs-5" scope="row"><?php echo $total ?>.00$</th>
          </tr>
      </tbody>
    </table>
    <table class="table d-inline">
      <thead class="thead-light">
        <tr class=bg-secondary>  
          <th class="text-center border" scope="col">Status</th>
          <th class="text-center border" scope="col">Action</th>
          <th class="text-center border" scope="col">Update</th>
        </tr>
      </thead>    
      <tbody>
        <tr>
          <td class="text-center border text-danger fs-4"><?php if($order['status']==1) echo 'Pending'; else echo 'Processed' ?></td>
          <td class="text-center border"><button class="btn btn-info"><a class="text-decoration-none text-light" href='<?php echo BASE_URL?>adminorder/toggleStatus/<?php echo $order['orderId']?>'><?php if($order['status']==1) echo 'Processing';else echo '<i class="fas fa-check text-primary"></i>' ?></a></button></td>
          <td class="text-center border fs-3">
            <a data-toggle="tooltip" title="Chỉnh sửa" href='<?php echo BASE_URL?>adminorder/updateorder/<?php echo $order["orderId"]?>'><i class="fas fa-edit ms-1"></i></a>
          </td>
        </tr>
      </tbody>
    </table>
    <h3 class="mt-3 mb-1">Customer Info</h3>
    <table class="table ">
      <thead class="thead-light">
        <tr class=bg-light>  
          <th class="text-center border" scope="col">Order Date</th>
          <th class="text-center border" scope="col">Customer Name</th>
          <th class="text-center border" scope="col">Address</th>
          <th class="text-center border" scope="col">Phone</th>
          <th class="text-center border" scope="col">E-mail</th>
          <th class="text-center border" scope="col">Note</th>
        </tr>
      </thead>    
      <tbody>
        <tr>
          <td class="text-center border"><?php echo $order['orderDate'] ?></td>
          <td class="text-center border"><?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c['fullname'] ?></td> 
          <td class="text-center border"><?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c['address'] ?></td>
          <td class="text-center border"><?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c['phone'] ?></td>
          <td class="text-center border"><?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c['email'] ?></td>
          <td class="text-center border" scope="row"><?php echo $order['note'] ?></td>          
        </tr>
      </tbody>
    </table>
</div>


