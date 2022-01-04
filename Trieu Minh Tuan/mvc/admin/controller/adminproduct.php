<?php
class AdminProduct extends AdminController{
    public function productList($limit=LIMIT, $offset=0){
      $adminproductmodel=new AdminProductModel;
      $data=$adminproductmodel->productList($limit, $offset);
      $this->loadAdminView('adminmaster1','adminproduct/productlist',$data);
    }
    public function toggleTrash($productId){
      $adminproductmodel=new AdminProductModel;
      $adminproductmodel->toggleTrash($productId);
    }
    public function toggleStatus($productId){
      $adminproductmodel=new AdminProductModel;
      $adminproductmodel->toggleStatus($productId);
    }
    public function productListInTrash($limit=LIMIT, $offset=0){
      $adminproductmodel=new AdminProductModel;
      $data=$adminproductmodel->productListInTrash($limit, $offset);
      $this->loadAdminView('adminmaster1','adminproduct/productlistintrash',$data);
    }
    public function productDelete($key){
      $adminproductmodel=new AdminProductModel;
      $adminproductmodel->productDelete($key);
    }
    public function addProduct(){
      //Xủ lý dữ liệu
      if(isset($_POST['submit']))
      {
        $adminproductmodel=new AdminProductModel;
        $adminproductmodel->doAddProduct();
       
      }
      //Hiển thị form Add
      $catmodel=new AdminCategoryModel;
      $data['cats']=$catmodel->getAll(['trash'=>0,'status'=>1]);
      $brandmodel=new AdminBrandModel;
      $data['brands']=$brandmodel->getAll(['trash'=>0,'status'=>1]);
      $this->loadAdminView('adminmaster1','adminproduct/addproduct',$data);
      
    }
    public function UpdateProduct($productId){ 
      //Xử lý dữ liệu
      $adminproductmodel=new AdminProductModel;
      if(isset($_POST['submit']))
      {
        $adminproductmodel->doUpdateProduct($productId);
      }
      //Hiển thị form Update
      $catmodel=new AdminCategoryModel;
      $data['cats']=$catmodel->getAll(['trash'=>0,'status'=>1]);
      $brandmodel=new AdminBrandModel;
      $data['brands']=$brandmodel->getAll(['trash'=>0,'status'=>1]);
      $data['oldproduct']=$adminproductmodel->get(['productId'=>$productId]);
      $this->loadAdminView('adminmaster1','adminproduct/updateproduct',$data);
    }
}
?>