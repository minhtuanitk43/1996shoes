<?php
$topics=$data['topics'];
?>
<div class="row">
<?php foreach($topics as $topic) {?>
<div class="col-md-6">
      <div class="row g-0 border rounded  mb-4 shadow-sm">
        <div class="col p-3 d-flex flex-column position-static">
          <h4 class="mb-0" _msthash="1219478" _msttexthash="4239625" style="direction: ltr; text-align: left;"><?php echo $topic['title']?></h4>
          <div class="mb-1 text-muted" _msthash="1323400" _msttexthash="226018" style="direction: ltr; text-align: left;"><?php echo $topic['createDate']?></div>
          <p class="mb-auto" _msthash="1193647" _msttexthash="72854184" style="direction: ltr; text-align: left;"><?php echo substr($topic["content"], 0, 100)?></p>
          <a href="<?php echo BASE_URL."topic/topicdetail/".$topic['topicId']?>" class="stretched-link text-decoration-none" _msthash="1185483" _msttexthash="2665494" style="direction: ltr; text-align: left;">Đọc thêm...</a>
        </div>
        <div class="col-auto d-none d-lg-block p-3">
          <img class="" width=200px height=200px src="<?php echo BASE_URL."public/upload/".$topic['image']?>"/>

        </div>
      </div>
    </div>
<?php }?>
</div>