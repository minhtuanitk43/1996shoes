<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1996 Store</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/personal.css" />
  <script src="<?php echo BASE_URL; ?>public/js/popper.min.js" defer></script>
  <script src="<?php echo BASE_URL; ?>public/js/bootstrap.js" defer></script>
  <script src="<?php echo BASE_URL; ?>public/js/topic.js" defer></script>


  <script src="https://kit.fontawesome.com/fb3aa5052d.js" crossorigin="anonymous"></script>
</head>
<body>
<header class="container-fluld bg-light ps-5 pe-5">
    <div class="row">
        <div class="col-md-4"><a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL; ?>public/img/tuan_logo.PNG" width=75% height=100% alt="brand"></a></div>
        <div class="col-md-5 fs-1  text-danger fw-bold text-center">ADMIN CONTROLLER<i class="ms-3 fas fa-users-cog"></i></div>
          <div class="col-md-3 text-end mt-3">
              Xin chào <h6 class=d-inline><?php if(isset($_SESSION['username'])) echo $_SESSION['username']?></h6>
              <button class='btn-primary'><a class='text-reset text-decoration-none' href='<?php echo BASE_URL?>auth/adminlogOut'>Đăng xuất</a></button>
          </div>
    </div>

</header>
<div class="container-fluld ps-5 pe-5">
    <div class="row">
        <div class="col">
			    <div class="card">
                <h4 class="card-header bg-primary text-light fw-bold ps-3"><i class="fas fa-tachometer-alt col-md-3"></i>DASHBOARD</h4>

       

                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item ">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fs-5 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="fas fa-hand-point-right me-3"></i>Product
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminproduct/addproduct"><i class="fas fa-plus-circle me-3"></i>Add Product</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminproduct/productlist/<?php echo LIMIT.'/0'?>"><i class="fas fa-list-ul me-3"></i>Product list</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminproduct/productlistintrash/<?php echo LIMIT.'/0'?>"><i class="fas fa-trash me-3"></i>Product list in trash</a>
                            </div>
                          </div>
                       </div> 

                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fs-5 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="false" aria-controls="collapseTwo">
                             <i class="fas fa-hand-point-right me-3"></i> Product Category
                            </button>
                          </h2>
                          <div id="collapsetwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>admincategory/addcategory"><i class="fas fa-plus-circle me-3"></i>Add Category</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>admincategory/categorylist/<?php echo LIMIT.'/0'?>"><i class="fas fa-list-ul me-3"></i>Product Category list</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>admincategory/categorylistintrash/<?php echo LIMIT.'/0'?>"><i class="fas fa-trash me-3"></i>Category list in trash</a>
                            </div>
                          </div>
                       </div>

                       <div class="accordion-item ">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fs-5 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <i class="fas fa-hand-point-right me-3"></i>Product Brand
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminbrand/addbrand"><i class="fas fa-plus-circle me-3"></i>Add Brand</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminbrand/brandlist/<?php echo LIMIT.'/0'?>"><i class="fas fa-list-ul me-3"></i>Product Brand list</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminbrand/brandlistintrash/<?php echo LIMIT.'/0'?>"><i class="fas fa-trash me-3"></i>Brand list in trash</a>
                            </div>
                          </div>
                       </div>

                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button fs-5 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                             <i class="fas fa-hand-point-right me-3"></i> Link-Pages
                            </button>
                          </h2>
                          <div id="collapseFour" class="accordion-collapse collapse " aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminlink/addlink"><i class="fas fa-plus-circle me-3"></i>Add Link-Page</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminlink/linklist/<?php echo LIMIT.'/0'?>"><i class="fas fa-list-ul me-3"></i>Link-Pages list</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminlink/linklistintrash/<?php echo LIMIT.'/0'?>"><i class="fas fa-trash me-3"></i>Link-Pages list in trash</a>
                            </div>
                          </div>
                       </div>

                       <div class="accordion-item ">
                          <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button fs-5 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <i class="fas fa-hand-point-right me-3"></i>Order & Customer
                            </button>
                          </h2>
                          <div id="collapseFive" class="accordion-collapse collapse " aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>admincustomer/customerlist/<?php echo LIMIT.'/0'?>"><i class="fas fa-users me-3"></i>Customer</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminorder/orderlist/<?php echo LIMIT.'/0'?>"><i class="fas fa-list-ul me-3"></i>Order list</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminorder/orderlistintrash/<?php echo LIMIT.'/0'?>"><i class="fas fa-trash me-3"></i>Order list in trash</a>
                            </div>
                          </div>
                       </div> 

                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button fs-5 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                             <i class="fas fa-hand-point-right me-3"></i> Posters
                            </button>
                          </h2>
                          <div id="collapseSix" class="accordion-collapse collapse " aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminposter/addposter"><i class="fas fa-plus-circle me-3"></i>Add Poster</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminposter/posterlist/<?php echo LIMIT.'/0'?>"><i class="fas fa-list-ul me-3"></i>Poster list</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>adminposter/posterlistintrash/<?php echo LIMIT.'/0'?>"><i class="fas fa-trash me-3"></i>Poster list in trash</a>
                            </div>
                          </div>
                       </div>  

                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button fs-5 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                             <i class="fas fa-hand-point-right me-3"></i> Topics
                            </button>
                          </h2>
                          <div id="collapseSeven" class="accordion-collapse collapse " aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>admintopic/addtopic"><i class="fas fa-plus-circle me-3"></i>Add Topic</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>admintopic/topiclist/<?php echo LIMIT.'/0'?>"><i class="fas fa-list-ul me-3"></i>Topic list</a>
                            <a class="nav-link btn btn-outline-primary text-start fs-6 fw-bold" href="<?php echo BASE_URL; ?>admintopic/topiclistintrash/<?php echo LIMIT.'/0'?>"><i class="fas fa-trash me-3"></i>Topic list in trash</a>
                            </div>
                          </div>
                       </div>                     
                  </div>

              </div>
           
       
        </div>
<div class='col-md-9'>
<?php require_once PATH_TO_ADMINVIEW.$view.".php" ?>
</div>
    </div>
</div>


   <footer class="container-fluid row bg-dark m-0">
   @copyright 2020
    </footer>



</body>
</html>