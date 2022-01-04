<?php
$brandmodel=new BrandModel;
$brands=$brandmodel->getAll(['trash'=>0, 'status'=>1]);
$catmodel=new CategoryModel;
$cats=$catmodel->getAll(['trash'=>0, 'status'=>1]);
$linkmodel=new LinkModel;
$links=$linkmodel->getAll(['trash'=>0, 'status'=>1, 'position'=>'header']);
usort($links, function($a, $b) {
  return $a['orders'] <=> $b['orders'];
});
$pagemodel=new PageModel;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/personal.css" />
    <script src="<?php echo BASE_URL; ?>public/js/bootstrap.js" defer></script>
    <script
      src="https://kit.fontawesome.com/4925e21513.js"
      crossorigin="anonymous"
    ></script>
    <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="AaCiq8ye"></script>
    <title>1996 Store</title>
  </head>
  <body>
    <header class="container"> <!--header -->
      <div class="row">
        <div class="col-md-4"><a href="<?php echo BASE_URL ?>"><img class="img-fluid" src="<?php echo BASE_URL; ?>public/img/tuan_logo.PNG" alt="logo" /></a></div>
        <div class="col-md-4 mt-3">
          <form class="d-flex" method='post' action='<?php echo BASE_URL.'product/productSearch/'.LIMIT.'/0'?>'>
            <input 
              name='searchKey'
              class="form-control me-2"
              type="search"
              placeholder="Nhập tên sản phẩm cần tìm kiếm "
              aria-label="Search"
            />
            <button class="btn btn-outline-dark" type="submit">
              Search
            </button>
          </form>
        </div>
        <div class="col-md-4 mt-3">
        <!--shoppingcart-->
         
          <span class="me-3" data-bs-toggle="modal" data-bs-target="#exampleModal ">
            <i class="fas fa-cart-plus fs-2" id=carticon></i>
            <?php 
            $cart=new Cart;
            if($cart->getCount()!=0) echo '('.$cart->getCount().')';
            ?>  
          </span>
           
          
          <?php if(isset($_SESSION['username_user'])) {?>
            Xin chào <h6 class=d-inline ><?php if(isset($_SESSION['username_user'])) echo $_SESSION['username_user']?> !</h6>
            <button class='btn-primary ms-3'><a class='text-reset text-decoration-none' href='<?php echo BASE_URL?>auth/adminlogOut'>Đăng xuất</a></button>

          <?php } else {?>
            <button class="btn btn-dark mx-3 mb-2"><a class='text-decoration-none text-reset'  href='<?php echo BASE_URL."auth/adminlogin"?>'>Đăng Nhập</a ></button>
            <button class="btn btn-dark mx-3 mb-2"><a class='text-decoration-none text-reset' href='<?php echo BASE_URL."user/userregister"?>'>Đăng ký tài khoản</a></button>
          <?php }?>
          <div class="text-end">
          <br>

          <div class="fb-share-button  " data-href="<?php echo BASE_URL?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F1996store%3A8181%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
          </div>
        </div>
        
        <div class="col">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand fs-4" href="<?php echo BASE_URL ?>"><i class="fas fa-home fs-4"> Home</i></a> 
              <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
              >
                <span class="navbar-toggler-icon"></span>
              </button>
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-md-10">
                 
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle fs-5"
                      href="#"
                      id="navbarDropdown"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false" 
                    >
                      Thương hiệu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php foreach( $brands as $brand){?>
                       <li><a class="dropdown-item" href="<?php echo BASE_URL ?>product/productByBrand/<?php echo $brand['alias'].'/'.LIMIT.'/0'?> "><?php echo $brand['brandName']?></a></li>
                      <?php }?>
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a
                      class="nav-link dropdown-toggle fs-5"
                      href="#"
                      id="navbarDropdown"
                      role="button"
                      data-bs-toggle="dropdown"
                      aria-expanded="false"
                    >
                      Sản phẩm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <?php foreach($cats as $cat){?>
                        <li><a class="dropdown-item" href="<?php echo BASE_URL ?>product/productByCat/<?php echo $cat['alias'].'/'.LIMIT.'/0'?> "><?php  echo $cat['catName']?></a></li>
                      <?php }?>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link fs-5" href="<?php echo BASE_URL?>product/allproduct">Tất cả sản phẩm</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link fs-5" href="<?php echo BASE_URL?>topic/showtopic">Góc bài viết</a>
                  </li>

                  <?php foreach($links as $link){?>
                    <li class="nav-item">
                      <a class="nav-link fs-5" href="<?php echo $link['link']; $page=$pagemodel->get(['linkId'=>$link['linkId'],'trash'=>0]);if(!empty($page))echo $page['pageId']?>"><?php echo $link['title']?> </a>
                    </li>
                  <?php }?> 
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </div>
    </header>