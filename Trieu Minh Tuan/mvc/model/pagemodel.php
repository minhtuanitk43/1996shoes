<?php
class PageModel  extends AdminModel{
    protected $table=DB_PREFIX.'page';
    protected $field=['linkId','title','content','createBy','createDate','updateDate','trash','status'];
    protected $key='pageId';
    public function showPage($pageId){
        //lay data trong bang page
        $data['page']=$this->get(['pageId'=>$pageId]);
       return $data;
   }
}
?>