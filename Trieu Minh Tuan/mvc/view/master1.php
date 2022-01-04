<!--header -->
<?php require_once PATH_TO_MODUL.'header.php'; ?>
<!-- poster -->
<?php include_once PATH_TO_MODUL.'poster.php'?>
    <hr>
    <!--container-->
    <div class="container"> 
      <div class="row">
        <!-- content left -->
        <div class="col-md-3">   
          <div class="row">
            <?php require_once PATH_TO_MODUL.'slide.php'?>
          </div>
          <hr>
          <div class="row">
            <?php include_once PATH_TO_MODUL.'exchangerates.php'?>
          </div>  
          <hr>
          <div class="row">
            <?php include_once PATH_TO_MODUL.'maps.php'?>
          </div>
          <hr>
          <div class="text-primary d-inline"><h5>Chia sẻ cùng bạn bè trên Facebook:</h5></div>
          <div class="fb-share-button" data-href="<?php echo BASE_URL?>" data-layout="button_count" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F1996store%3A8181%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
        </div>   
        <!-- content right -->
        <div class="col-md-9 ps-3">  
              <?php require PATH_TO_VIEW.$viewname.".php"?>
        </div>
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