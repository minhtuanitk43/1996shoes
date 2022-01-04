<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1996 Store</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" />
  <script src="<?php echo BASE_URL; ?>public/js/popper.min.js" defer></script>
  <script src="<?php echo BASE_URL; ?>public/js/bootstrap.js" defer></script>

  <script src="https://kit.fontawesome.com/fb3aa5052d.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="container-fluld p-3">
    <div class="row">
        <div class="col-md-4 ps-4"><a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>public/img/tuan_logo.PNG" width=75% height=100% alt="brand"></a></div>
        <div class="col-md-4 text-center"><h1 class="fw-bold text-danger">ADMIN CONTROLLER <i class="fas fa-users-cog"></i></h1></div>
          <div class="col-md-4 text-end pe-4">
              <?php if(isset($_SESSION['username'])) echo "Xin chào ".$_SESSION['username']." !"?>
              <button class='btn-primary'><a class='text-reset text-decoration-none' href='<?php echo BASE_URL?>auth/adminlogOut'>Đăng xuất</a></button>
          </div>
    </div>

</header>
<div class="container-fluld">
    <div class="row">
        <div class="col-3 text-center ps-5">
			    

                      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
                  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                    <span class="fs-4">Sidebar</span>
                  </a>
                  <hr>
                  <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                      <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        Home
                      </a>
                    </li>
                    <li>
                      <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Dashboard
                      </a>
                    </li>
                    <li>
                      <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
                        Orders
                      </a>
                    </li>
                    <li>
                      <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
                        Products
                      </a>
                    </li>
                    <li>
                      <a href="#" class="nav-link text-white">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                        Customers
                      </a>
                    </li>
                  </ul>
                  <hr>
                  <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                      <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                      <li><a class="dropdown-item" href="#">New project...</a></li>
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                  </div>
                </div>


                
        <div class='col-md-9 pe-5'>
        <?php require_once PATH_TO_ADMINVIEW.$view.".php" ?>
        
        </div>
      </div>
</div>


   <footer class="container-fluid row bg-dark">
   @copyright 2020
    </footer>



</body>
</html>