<?php
$postermodel=new PosterModel;
$posters=$postermodel->getAll(['trash'=>0, 'status'=>1]);
?>


<div class="col-md-12 mb-3 mt-3">

  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img class='img-fluid  d-block w-100' src="<?php echo BASE_URL.'public/upload/'.$posters[0]['image']?>" alt="..."/>
      <?php unset($posters[0]) ?>
      </div>
      <?php foreach($posters as $poster){?>
      <div class="carousel-item">
      <img class='img-fluid  d-block w-100' src="<?php echo BASE_URL.'public/upload/'.$poster['image']; ?>" alt="">
      </div>
      <?php }?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>




