<?php
  $oldcustomer=$data['oldcustomer'];
  ?>
<div class='row button btn-warning'>
  <?php
  if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<div class="text-center fs-3 text-primary fw-bold mb-3">UPDATE CUSTOMER</div>
<div class='row button btn-warning'>
  <?php
  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
</div>

<div class="text-center">
    <form method=post action='' enctype='multipart/form-data'>
      <table class="table ">
        <thead class="thead-light">
          <tr class=bg-light>  
            <th class="text-center border" scope="col">Customer ID</th>
            <th class="text-center border" scope="col">Customer Name</th>
            <th class="text-center border" scope="col">Address</th>
            <th class="text-center border" scope="col">Phone</th>
            <th class="text-center border" scope="col">E-mail</th>
          </tr>
        </thead>    
        <tbody>
          <tr>
            <td class="text-center border"><?php echo $oldcustomer['customerId'] ?></td>
            <td class="border"><textarea type='text' name=inputFullname cols=25 rows=3 ><?php echo $oldcustomer['fullname']?></textarea></td> 
            <td class="border"><textarea type='text' name=inputAddress cols=25 rows=3><?php echo $oldcustomer['address']?></textarea></td>
            <td class="border"><textarea type='text' name=inputPhone cols=25 rows=3 ><?php echo $oldcustomer['phone']?></textarea></td>
            <td class="border"><textarea type='text' name=inputMail cols=25 rows=3 ><?php echo $oldcustomer['email']?></textarea></td>        
          </tr>
        </tbody>
      </table>
      <div class=text-start>
        <button class="btn btn-primary" type=submit name=submit>Update</button>
        <?php if(isset($_POST['submit'])) {?>
        <button class="btn btn-primary"><?php echo "<a class='text-decoration-none text-reset' href=\"javascript:history.go(-2)\">GO BACK</a>";?></button>
        <?php }?>
      </div>
    </form>
</div>




