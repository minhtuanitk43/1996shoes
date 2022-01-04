<?php
$linkmodel=new LinkModel;
$links=$linkmodel->getAll(['trash'=>0, 'status'=>1, 'position'=>'bottommenu1']);
usort($links, function($a, $b) {
    return $a['orders'] <=> $b['orders'];
});
$pagemodel=new PageModel;
?>
<div class="text-start p-5">
            <?php foreach($links as $link ){?>
                <a href="<?php echo $link['link']; $page=$pagemodel->get(['linkId'=>$link['linkId'],'trash'=>0]);if(!empty($page))echo $page['pageId']?>" class="text-decoration-none ms-5" target="_bank"><?php echo $link['title']?></a><br>
            <?php }?>
</div>