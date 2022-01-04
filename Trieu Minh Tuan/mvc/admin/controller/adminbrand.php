<?php
class AdminBrand extends AdminController{
    public function addBrand()
    {
        if(isset($_POST['submit']))
        {
            $adminbrandmodel=new AdminBrandModel;
            $adminbrandmodel->addBrand();
           
        }
        $this->loadAdminView('adminmaster1','adminbrand/addbrand',[]);
    }
    public function brandList($limit=LIMIT, $offset=0)
    {
      $adminbrandmodel=new AdminBrandModel;
      $data=$adminbrandmodel->brandList($limit, $offset);
      $this->loadAdminView('adminmaster1','adminbrand/brandlist',$data);
    }
    public function toggleStatus($brandId)
    {
        $adminbrandmodel=new AdminBrandModel;
        $data=$adminbrandmodel->toggleStatus($brandId);
    }
    public function toggleTrash($brandId)
    {
        $adminbrandmodel=new AdminBrandModel;
        $data=$adminbrandmodel->toggleTrash($brandId);
    }
    public function brandListInTrash($limit=LIMIT, $offset=0)
    {
        $adminbrandmodel=new AdminBrandModel;
        $data=$adminbrandmodel->brandListInTrash($limit, $offset);
        $this->loadAdminView('adminmaster1','adminbrand/brandlistintrash',$data);
    }
    public function brandDelete($key){
        $adminbrandmodel=new AdminBrandModel;
        $data=$adminbrandmodel->brandDelete($key);
    }
    public function updateBrand($brandId){ 
        //Xử lý dữ liệu
        $adminbrandmodel=new AdminBrandModel;
        if(isset($_POST['submit']))
        {
          $adminbrandmodel->updateBrand($brandId);
        }
        //Hiển thị form Update
        $data['oldbrand']=$adminbrandmodel->get(['brandId'=>$brandId]);
        $this->loadAdminView('adminmaster1','adminbrand/updatebrand',$data);
      }
    
}