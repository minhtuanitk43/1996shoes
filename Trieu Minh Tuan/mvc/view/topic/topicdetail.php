<?php
$topic=$data['topic'];
?>
<div class="card mb-3">

  <div class="card-body">
    <h5 class="card-title text-primary fs-2 text-center"><?php echo $topic['title']?></h5>
    <div class="row text-center p-5">
      <img src="<?php echo BASE_URL."public/upload/".$topic['image']?>" alt="<?php echo $topic['image']?>">
    </div>
    
    <p class="card-text"><?php echo $topic['content']?></p>
    
    <p class="card-text"><small class="text-muted"><?php echo $topic['createDate']?><br> By 1996 Store - Giày thể thao chính hãng</small></p>
    </div>
  </div>
