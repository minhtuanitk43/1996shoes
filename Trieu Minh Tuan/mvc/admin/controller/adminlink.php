<?php
class AdminLink extends AdminController{
    public function addLink()
    {
        if(isset($_POST['submit']))
        {
            $adminlinkmodel=new AdminLinkModel;
            $adminlinkmodel->addLink();     
        }
        //Lấy data links
        $link=new LinkModel;
        // $data[]=$link->getcol(['trash'=>0, 'status'=>1]);
        // array_unique($data);
        $this->loadAdminView('adminmaster1','adminlink/addlink',[]);
    }
    public function linkList($limit=LIMIT, $offset=0)
    {
      $adminlinkmodel=new AdminLinkModel;
      $data=$adminlinkmodel->linkList($limit, $offset);
      $this->loadAdminView('adminmaster1','adminlink/linklist',$data);
    }
    public function linkDetail($linkId)
    {
      $adminlinkmodel=new AdminLinkModel;
      $data=$adminlinkmodel->linkDetail($linkId);
      $this->loadAdminView('adminmaster1','adminlink/linkdetail',$data);
    }
    public function toggleStatus($linkId)
    {
        $adminlinkmodel=new AdminLinkModel;
        $data=$adminlinkmodel->toggleStatus($linkId);
    }
    public function toggleTrash($linkId)
    {
        $adminlinkmodel=new AdminLinkModel;
        $data=$adminlinkmodel->toggleTrash($linkId);
    }
    public function linkListInTrash($limit=LIMIT, $offset=0)
    {
      $adminlinkmodel=new AdminLinkModel;
      $data=$adminlinkmodel->linkListInTrash($limit, $offset);
      $this->loadAdminView('adminmaster1','adminlink/linklistintrash',$data);
    }
    public function linkDelete($key){
        $adminlinkmodel=new AdminLinkModel;
        $adminlinkmodel->linkDelete($key);
    }
    public function updateLink($linkId){ 
        //Xử lý dữ liệu
        $pagemodel=new PageModel;
        $linkmodel=new LinkModel;
        $adminlinkmodel=new AdminLinkModel;
        if(isset($_POST['submit']))
        {
          $adminlinkmodel->updateLink($linkId);
        }
        //Hiển thị form Update
        $data['oldlink']=$linkmodel->get(['linkId'=>$linkId]);
        $data['oldpage']=$pagemodel->get(['linkId'=>$linkId]);
        $this->loadAdminView('adminmaster1','adminlink/updatelink',$data);
      }
    
}