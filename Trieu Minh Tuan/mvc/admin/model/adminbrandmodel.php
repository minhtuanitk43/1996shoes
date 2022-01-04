<?php
class AdminBrandModel extends AdminModel{
    protected $table= DB_PREFIX.'brand';
    protected $field=['brandName','alias','trash','status'];
    protected $key='brandId';

    public function addBrand(){
        //Lấy dữ liệu sản phẩm mới
        $newbrand['brandName']=$_POST['inputBrandName'];
        $newbrand['alias']=$_POST['inputAlias'];
        $newbrand['trash']=0;
        $newbrand['status']=$_POST['inputStatus'];
        //Tạo chuổi alias
        $helper=new Helper;
        if($newbrand['alias']=='')
            $newbrand['alias']=$helper->to_alias($newbrand['brandName']);
        //Kiểm lỗi
        $_SESSION['msg']='';
        if($this->get(['brandName'=>$newbrand['brandName']]))
            $_SESSION['msg'].='Lỗi ! Tên thương hiệu đã tồn tại !';
        else{
            
            if($this->insert($newbrand))
                $_SESSION['msg'].='Thêm thương hiệu thành công !';
            else
                 $_SESSION['msg'].='Thêm thương hiệu thất bại !';        
        } 
    }
    public function brandList($limit, $offset){
        //lay danh sach san pham
        $data['brands']=$this->getAllLimit(['trash'=>0], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>0]));
        //Chuan bi paging
        $data['paging']=new Paging('adminbrand/brandlist/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function toggleStatus($brandId){
        if($this->toggle('status',$brandId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';
    }
    public function toggleTrash($brandId)
    {
        if($this->toggle('trash',$brandId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';

    }
    public function brandListInTrash($limit, $offset)
    {
        //lay danh sach san pham
        $data['brands']=$this->getAllLimit(['trash'=>1], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>1]));
        //Chuan bi paging
        $data['paging']=new Paging('adminbrand/brandlistintrash/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function brandDelete($key){
        if($this->delete($key))
            $_SESSION['msg']="Xoá nhóm sản phẩm vĩnh viễn thành công !";
        else
            $_SESSION['msg']="Thực hiện thất bại !";
            echo '<script>window.history.back()</script>';
            
        
    }
    public function updateBrand($brandId){
        //Lấy dữ liệu sản phẩm mới
        $newbrand['brandName']=$_POST['inputBrandName'];
        $newbrand['alias']=$_POST['inputAlias'];
        $newbrand['trash']=0;
        $newbrand['status']=$_POST['inputStatus'];
        //Tạo chuổi alias
        $helper=new Helper;
        if($newbrand['alias']=='')
            $newbrand['alias']=$helper->to_alias($newbrand['brandName']);
        //Kiểm lỗi
        
        $_SESSION['msg']='';
        $adminbrandmodel=new BrandModel;
        $oldbrand=$data['oldbrand']=$adminbrandmodel->get(['brandId'=>$brandId]);
  
        if($oldbrand['brandName']==$newbrand['brandName'])
        {
            if($oldbrand['alias']==$newbrand['alias'])
            {
                if($this->update($newbrand, $brandId))
                        $_SESSION['msg'].='Cập nhập nhóm sản phẩm thành công';
                else
                    $_SESSION['msg'].='Cập nhập nhóm sản phẩm thất bại'; 
               
            }
            else
            {
                if($this->get(['alias'=>$newbrand['alias']]))
                    $_SESSION['msg'].='Lỗi ! alias đã tồn tại';
                else
                {
                    if($this->update($newbrand, $brandId))
                        $_SESSION['msg'].='Cập nhập nhóm sản phẩm thành công';
                    else
                        $_SESSION['msg'].='Cập nhập nhóm sản phẩm thất bại'; 
                   
                }
            }
        }
            
        else
            if($this->get(['brandName'=>$_POST['inputBrandName']]))
                $_SESSION['msg'].='Lỗi ! Tên nhóm sản phẩm đã tồn tại';
            else
            {
                if($oldbrand['alias']==$newbrand['alias'])
                {
                    if($this->update($newbrand, $brandId))
                            $_SESSION['msg'].='Cập nhập nhóm sản phẩm thành công';
                    else
                        $_SESSION['msg'].='Cập nhập nhóm sản phẩm thất bại'; 
                    
                }
                else
                {
                    if($this->get(['alias'=>$newbrand['alias']]))
                        $_SESSION['msg'].='Lỗi ! alias đã tồn tại';
                    else
                    {
                        if($this->update($newbrand, $brandId))
                            $_SESSION['msg'].='Cập nhập nhóm sản phẩm thành công';
                        else
                            $_SESSION['msg'].='Cập nhập nhóm sản phẩm thất bại'; 
                       
                    }
                }
            }        
        
    }
    
}
?>