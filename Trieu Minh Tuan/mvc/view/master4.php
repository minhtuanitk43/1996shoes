    <!--header -->
    <?php require_once PATH_TO_MODUL.'header.php' ?>
    <!-- poster -->
    <?php require_once PATH_TO_MODUL.'poster.php' ?>
    <hr>
    <!--container-->
    <div class="container mt-3 mb-3"> 
      <div class="row">

        <?php include_once PATH_TO_VIEW.$viewname.'.php';   ?>
        
      </div>
    </div>    
    <!-- footer -->
    <footer class="container-fluid bg-dark">
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
    </footer>
          <?php require_once PATH_TO_MODUL.'cart.php'?>
          <?php require_once PATH_TO_MODUL.'hotline.php'?>
  </body>
</html>
