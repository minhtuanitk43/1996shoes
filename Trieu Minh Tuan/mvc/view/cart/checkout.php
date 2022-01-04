<?php
$cart=new Cart;
$cartItems=$cart->getItems();
$usermodel=new UserModel;
if(isset($_SESSION['userId']))
$user=$usermodel->get(['userId'=>$_SESSION['userId']])  
?>
<h2 class="text-danger mb-5 fw-bold text-center" > CHECK OUT</h2>
<div class="row btn-success mb-3">
            <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg']; unset($_SESSION['msg']);}?>
        </div>
    <div class=row>
    <div class='col-md-7 text-center'>
        <h4 class=text-primary>Checkout form</h4>
       
        <div class="row text-center">
            
            <form class="needs-validation was-validated mt-3" method=post action=''>
            
                <table>
                    <tr>
                        <td class='col-md-3'><lable>Họ tên</lable></td>
                        <td>
                            <div class="input-group has-validation">
                                <input type='text'class="form-control" placeholder="Họ & tên" name='inputFullname' value='<?php if(isset($user)) echo $user['fullname']?>' required>   
                            </div>
                        </td>
                    </tr>
                    <tr>   
                    <td class='col-md-3'><lable>Địa chỉ</lable></td>
                        <td>
                            <div class="input-group has-validation">
                                <input type='text'class="form-control" placeholder="Địa chỉ" name='inputAddress' required>   
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class='col-md-3'><lable>Số điện thoại</lable></td>
                        <td>
                            <div class="input-group has-validation">
                                <input class="form-control" type='text' placeholder="Số ĐT" name='inputPhone' required>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class='col-md-3'><lable>Email</lable></td>
                        <td>
                            <div class="input-group has-validation">    
                                <input class="form-control" type='mail' placeholder="YourEmail@example" name='inputMail' value='<?php if(isset($user)) echo $user['email']?>' required>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class='col-md-3'><lable>Ghi chú</lable></td>
                        <td><textarea name='inputNote' cols=50 rows=5></textarea></td>
                    </tr>
                    <tr><td> <br></td></tr>
                    <tr>
                        <td colspan=3 class=text-center><button class="w-30 btn btn-primary btn-lg" type="submit" name="submit">Đặt hàng</button>
                            <button class="w-30 btn btn-primary btn-lg" type="reset" name="reset">Nhập lại</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="col-md-5  order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill"><?php echo $cart->getCount()?></span>
        </h4>
        <ul class="list-group mb-3">
          <?php if(!empty($cartItems)) foreach ($cartItems as $item){?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="d-inline my-0"><?php echo $item['productName']?><h6 class="d-inline text-muted ms-1">(x<?php echo $item['quantity']?>)</h6></h6>
              <small class="text-muted"></small>
            </div>
            <span class="text-muted"><?php echo $item['price']?>$</span>
          </li>
          <?php } ?>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−0$</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong><?php echo $cart->getTotal()?>$</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form>
      </div>
    </div>
<?php
// if ($_SESSION['update']==true)
// {
//     echo '<script>cartIcon.click()</script>';
//     unset($_SESSION['update']);
// }
?>