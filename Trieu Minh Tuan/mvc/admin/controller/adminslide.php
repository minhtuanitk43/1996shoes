<?php
class AdminSlide extends AdminController{
    public function addToSlide($productId)
    {
        $slidemodel=new AdminSlideModel;
        $slidemodel->addToSlide($productId);
        
    }
    public function removeFromSlide($alias)
    {
        $slidemodel=new AdminSlideModel;
        $slidemodel->removeFromSlide($alias);
    }
    
}
?>