

<div class="container text-center col-md-2">

   <form action="<?php echo BASE_URL ?>auth/adminLogin/" method=post>
    <h1 class="h3 mb-3 mt-5 fw-normal">Please sign in</h1>
    <div class="text-danger  text-center">
      <?php
      if(isset($_SESSION['msg']))
      {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
      }
      ?>
    </div>
    <div class="form-floating">
      <input type="text" name=inputUsername class="form-control" id="floatingInput">
      <label for="floatingInput">UserName</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword"   name=inputPassword>
      <label for="floatingPassword">Password</label>
    </div>
    <div class="checkbox mb-3 text-start">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name='login'>Sign in</button>
    
  </form>
  <a class="text-decoration-none" href='<?php echo BASE_URL."user/userregister"?>'><h5 class=mt-3>Đăng ký tài khoản >></h5></a>
  <p class="mt-5 mb-3 text-muted">© Create in 2021 by TMT</p>
</div>