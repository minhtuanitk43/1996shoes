<?php
class AdminCategory extends AdminController{
    public function addCategory()
    {
        if(isset($_POST['submit']))
        {
            $admincategorymodel=new AdminCategoryModel;
            $admincategorymodel->addCategory();
           
        }
        $this->loadAdminView('adminmaster1','admincategory/addcategory',[]);
    }
    public function categoryList($limit=LIMIT, $offset=0)
    {
      $admincategorymodel=new AdminCategoryModel;
      $data=$admincategorymodel->categoryList($limit, $offset);
      $this->loadAdminView('adminmaster1','admincategory/categorylist',$data);
    }
    public function toggleStatus($catId)
    {
        $admincategorymodel=new AdminCategoryModel;
        $data=$admincategorymodel->toggleStatus($catId);
    }
    public function toggleTrash($catId)
    {
        $admincategorymodel=new AdminCategoryModel;
        $data=$admincategorymodel->toggleTrash($catId);
    }
    public function categoryListInTrash($limit=LIMIT, $offset=0)
    {
        $admincategorymodel=new AdminCategoryModel;
        $data=$admincategorymodel->categoryListInTrash($limit, $offset);
        $this->loadAdminView('adminmaster1','admincategory/categorylistintrash',$data);
    }
    public function categoryDelete($key){
        $admincategorymodel=new AdminCategoryModel;
        $data=$admincategorymodel->categoryDelete($key);
    }
    public function updateCategory($catId){ 
        //Xử lý dữ liệu
        $admincategorymodel=new AdminCategoryModel;
        if(isset($_POST['submit']))
        {
          $admincategorymodel->updateCategory($catId);
        }
        //Hiển thị form Update
        $data['oldcategory']=$admincategorymodel->get(['catId'=>$catId]);
        $this->loadAdminView('adminmaster1','admincategory/updatecategory',$data);
      }
    
}