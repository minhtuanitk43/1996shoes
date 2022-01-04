<?php
class Page extends UserController{
    public function showPage($pageId){
        $pagemodel=new PageModel;
        $data=$pagemodel->showPage($pageId);
        $this->loadView('master2','page/showpage',$data);
    }
    
        
        
 
}
?>