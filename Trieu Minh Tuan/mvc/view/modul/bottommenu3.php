<?php
$linkmodel=new LinkModel;
$links=$linkmodel->getAll(['trash'=>0, 'status'=>1, 'position'=>'bottommenu3']);
usort($links, function($a, $b) {
  return $a['orders'] <=> $b['orders'];
});
$pagemodel=new PageModel;
?>
<div class=" text-start p-5">
  <h6 class="text-light">Kết nối với chúng tôi:</h6>
            <ul>
              <li><a class="text-decoration-none ms-5" href="<?php foreach($links as $link ) if($link['orders']==1) echo $link['link']?>" target="_bank"> <i class="fab fa-facebook-f text-white-50"></i>  Facebook</a></li>
              <li><a class="text-decoration-none ms-5" href="<?php foreach($links as $link ) if($link['orders']==2) echo $link['link']?>"target="_bank"> <i class="fab fa-instagram text-white-50"></i>  Instagram</a></li>
              <li><a class="text-decoration-none ms-5" href="<?php foreach($links as $link ) if($link['orders']==3) echo $link['link']?>"target="_bank"><i class="fab fa-tiktok text-white-50"></i>  Tiktok </a></li>
            </ul>
</div>
