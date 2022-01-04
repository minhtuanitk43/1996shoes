
<div class="container text-center col-md-4">
  <h1 class="h3 mb-3 mt-5 fw-normal">User Register</h1>
  <div class='row button btn-warning'>
  <?php
  if(!empty($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
</div>
   <form action="<?php echo BASE_URL ?>user/userregister/" method=post> 
            <table>
              <tr>
                <td class='col-md-4 text-start'><lable>User Name</lable></td>
                <td colspan=2>
                  <div class="input-group has-validation">    
                    <input class="form-control" type='text' name='inputUsername' required>
                  </div>
                </td>
              </tr>
              <tr>
                <td class='col-md-4 text-start'><lable>Password</lable></td>
                <td>
                  <div class="input-group has-validation">    
                    <input class="form-control" type='password' name='inputPass' required>
                  </div>
                </td>
              </tr>
              <tr>
                <td class='col-md-4 text-start'><lable>Nhập lại Password</lable></td>
                <td>
                  <div class="input-group has-validation">    
                    <input class="form-control" type='password' name='inputPassAgain' required>
                  </div>
                </td>
              </tr>
              <tr>
                <td class='col-md-4 text-start'><lable>Họ tên</lable></td>
                <td>
                    <div class="input-group has-validation">
                      <input type='text'class="form-control" placeholder="Họ & tên" name='inputFullname' required>   
                    </div>
                </td>
              </tr>
              <tr>
                <td class='col-md-4 text-start'><lable>Email</lable></td>
                <td>
                    <div class="input-group has-validation">
                      <input type='mail'class="form-control" placeholder="email" name='inputMail' required>   
                    </div>
                </td>
              </tr>
              <tr>   
              <tr><td> <br></td></tr>
              <tr>
                <td colspan=3 class="text-end pe-4"><button class="w-30 btn btn-primary btn-lg" type="submit" name="register">Đăng ký</button>
                    <button class="w-30 btn btn-primary btn-lg" type="reset" name="reset">Nhập lại</button>
                    
                </td>
               
              </tr>
            </table>
        </form>
        <a class="text-decoration-none" href='<?php echo BASE_URL."auth/adminlogin"?>'><h5 class=mt-3>Đăng nhập ngay >></h5></a>

                  
              
</div>