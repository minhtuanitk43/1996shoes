<?php
class AdminPoster extends AdminController{
    public function addPoster()
    {
        if(isset($_POST['submit']))
        {
            $adminpostermodel=new AdminposterModel;
            $adminpostermodel->addPoster();
           
        }
        $this->loadAdminView('adminmaster1','adminposter/addposter',[]);
    }
    public function posterList($limit=LIMIT, $offset=0)
    {
      $adminpostermodel=new AdminPosterModel;
      $data=$adminpostermodel->posterList($limit, $offset);
      $this->loadAdminView('adminmaster1','adminposter/posterlist',$data);
    }
    public function toggleStatus($posterId)
    {
        $adminpostermodel=new AdminposterModel;
        $adminpostermodel->toggleStatus($posterId);
    }
    public function toggleTrash($posterId)
    {
        $adminpostermodel=new AdminposterModel;
        $adminpostermodel->toggleTrash($posterId);
    }
    public function posterListInTrash($limit=LIMIT, $offset=0)
    {
        $adminpostermodel=new AdminposterModel;
        $data=$adminpostermodel->posterListInTrash($limit, $offset);
        $this->loadAdminView('adminmaster1','adminposter/posterlistintrash',$data);
    }
    public function posterDelete($key){
        $adminpostermodel=new AdminposterModel;
        $data=$adminpostermodel->posterDelete($key);
    }
    public function updatePoster($posterId){ 
        //Xử lý dữ liệu
        $adminpostermodel=new AdminPosterModel;
        if(isset($_POST['submit']))
        {
          $adminpostermodel->updatePoster($posterId);
        }
        //Hiển thị form Update
        $data['oldposter']=$adminpostermodel->get(['posterId'=>$posterId]);
        $this->loadAdminView('adminmaster1','adminposter/updateposter',$data);
      }
    
}