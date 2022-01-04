<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>1996 Store</title>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css" >
  <script src="<?php echo BASE_URL; ?>public/js/popper.min.js"></script>
  <script src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js" ></script>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>public/css/personal.css" />
  <script src="https://kit.fontawesome.com/fb3aa5052d.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light mt-5">
<header class=" bg-light text-center ">
    <div class="row">
        <div class=" text-center"><a href='<?php echo BASE_URL?>'><img src="<?php echo BASE_URL; ?>public/img/tuan_logo.PNG" alt="brand"></a></div>
       
          
    </div>

</header>

<?php include_once PATH_TO_VIEW.$viewname.'.php';   ?>



   <footer class="container-fluid row bg-dark m-0">
    <div class="row">
            <div class="text-center col-md-4 ps-5">
            <?php include_once PATH_TO_MODUL.'bottommenu1.php'?>
            </div>
            <div class="text-center col-md-4 ps-5">
            <?php include_once PATH_TO_MODUL.'bottommenu2.php'?>
            </div>    
            <div class="text-center col-md-4 ps-5 ">
            <?php include_once PATH_TO_MODUL.'bottommenu3.php'?>
            </div>        
        </div>
    
   @copyright 2020
    </footer>



</body>
</html>
<?php require_once PATH_TO_MODUL.'hotline.php'?>


