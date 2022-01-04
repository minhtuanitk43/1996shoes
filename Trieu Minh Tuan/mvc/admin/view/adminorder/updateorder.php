<?php
  $order=$data['oldorder'];
  $orderdetails=$data['oldorderdetails'];
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
<div class="text-center fs-3 text-primary fw-bold mb-3">UPDATE ORDER</div>
<div class='row button btn-warning'>
  <?php
  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
</div>

<div class="text-center">
  <div class="row text-center">
      <h3>Order ID: <?php echo $order['orderId'] ?></h3>
  </div>
      
    <form method=post action='' enctype='multipart/form-data'>
      <table class="table d-inline">
          <tr class=bg-light>
            <th class="text-center border" scope="col">Order Date</th>    
          </tr>
          <tr>
            <td class="text-center border"><?php echo $order['orderDate'] ?></td>  
          </tr> 
          <tr class=bg-light>
            <th class="text-center border" scope="col">Note</th>    
          </tr>
          <tr>
            <td class="text-center border" scope="row"><textarea name=inputNote cols=30 rows=3><?php echo $order['note'] ?></textarea></td>  
          </tr>
      </table>
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
              <td class="text-center border"><input type='number' name=inputQuantity max=10000 min=0 step='0' value='<?php echo $orderdetail['quantity'] ?>'></td>   
            </tr>  
          <?php }?>
            <tr>
              <th colspan=2 class="text-center border">Total</throw> 
              <th colspan=3 class="text-center border text-danger fs-5" scope="row"><?php echo $total ?>.00$</th>
            </tr>
        </tbody>
      </table>
      <button class="btn btn-primary" type=submit name=submit>Update</button>
    </form>
    <h3 class="mt-3 mb-1">Customer Info</h3>
    <table class="table ">
      <thead class="thead-light">
        <tr class=bg-light>  
          <th class="text-center border" scope="col">Customer Name</th>
          <th class="text-center border" scope="col">Address</th>
          <th class="text-center border" scope="col">Phone</th>
          <th class="text-center border" scope="col">E-mail</th>
          <th class="text-center border" scope="col">Update</th>
        </tr>
      </thead>    
      <tbody>
        <tr>
          <td class="text-center border"><?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c['fullname'] ?></td> 
          <td class="text-center border"><?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c['address'] ?></td>
          <td class="text-center border"><?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c['phone'] ?></td>
          <td class="text-center border"><?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c['email'] ?></td>
          <td class="text-center fs-4"><a data-toggle="tooltip" title="Chỉnh sửa" href='<?php echo BASE_URL?>admincustomer/updatecustomerinorder/<?php foreach($customers as $c) if($c['customerId']==$order['customerId']) echo $c["customerId"]?>'><i class="fas fa-edit ms-1"></i></a></td>
        </tr>
      </tbody>
    </table>
</div>


