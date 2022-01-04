<?php
class AdminCategoryModel extends AdminModel{
    protected $table= DB_PREFIX.'category';
    protected $field=['catName','alias','parentId','trash','status'];
    protected $key='catId';

    public function addCategory(){
        //Lấy dữ liệu sản phẩm mới
        $newcat['catName']=$_POST['inputCatName'];
        $newcat['alias']=$_POST['inputAlias'];
        $newcat['parentId']=$_POST['inputParentId'];
        $newcat['trash']=0;
        $newcat['status']=$_POST['inputStatus'];
        //Tạo chuổi alias
        $helper=new Helper;
        if($newcat['alias']=='')
            $newcat['alias']=$helper->to_alias($newcat['catName']);
        //Kiểm lỗi
        $_SESSION['msg']='';
        if($this->get(['catName'=>$newcat['catName']]))
            $_SESSION['msg'].='Lỗi ! Tên nhóm sản phẩm đã tồn tại !';
        else{
            
            if($this->insert($newcat))
                $_SESSION['msg'].='Thêm nhóm sản phẩm thành công !';
            else
                 $_SESSION['msg'].='Thêm nhóm sản phẩm thất bại !';        
        } 
    }
    public function categoryList($limit, $offset){
        //lay danh sach san pham
        $data['cats']=$this->getAllLimit(['trash'=>0], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>0]));
        //Chuan bi paging
        $data['paging']=new Paging('admincategory/categorylist/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function toggleStatus($catId){
        if($this->toggle('status',$catId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';
    }
    public function toggleTrash($catId)
    {
        if($this->toggle('trash',$catId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';

    }
    public function categoryListInTrash($limit, $offset)
    {
        //lay danh sach san pham
        $data['cats']=$this->getAllLimit(['trash'=>1], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>1]));
        //Chuan bi paging
        $data['paging']=new Paging('admincategory/categorylistintrash/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function categoryDelete($key){
        if($this->delete($key))
            $_SESSION['msg']="Xoá nhóm sản phẩm vĩnh viễn thành công !";
        else
            $_SESSION['msg']="Thực hiện thất bại !";
        echo '<script>window.history.back()</script>';     
        
    }
    public function updateCategory($catId){
        //Lấy dữ liệu sản phẩm mới
        $newcat['catName']=$_POST['inputCatName'];
        $newcat['alias']=$_POST['inputAlias'];
        $newcat['parentId']=$_POST['inputParentId'];
        $newcat['trash']=0;
        $newcat['status']=$_POST['inputStatus'];
        //Tạo chuổi alias
        $helper=new Helper;
        if($newcat['alias']=='')
            $newcat['alias']=$helper->to_alias($newcat['catName']);
        //Kiểm lỗi
        $_SESSION['msg']='';
        $admincategorymodel=new CategoryModel;
        $oldcat=$data['oldcategory']=$admincategorymodel->get(['catId'=>$catId]);
  
        if($oldcat['catName']==$newcat['catName'])
        {
            if($oldcat['alias']==$newcat['alias'])
            {
                if($this->update($newcat, $catId))
                        $_SESSION['msg'].='Cập nhập nhóm sản phẩm thành công';
                else
                    $_SESSION['msg'].='Cập nhập nhóm sản phẩm thất bại'; 
                
                
            }
            else
            {
                if($this->get(['alias'=>$newcat['alias']]))
                    $_SESSION['msg'].='Lỗi ! alias đã tồn tại';
                else
                {
                    if($this->update($newcat, $catId))
                        $_SESSION['msg'].='Cập nhập nhóm sản phẩm thành công';
                    else
                        $_SESSION['msg'].='Cập nhập nhóm sản phẩm thất bại'; 
                    
                    
                }
            }
        }
            
        else
            if($this->get(['catName'=>$_POST['inputCatName']]))
                $_SESSION['msg'].='Lỗi ! Tên nhóm sản phẩm đã tồn tại';
            else
            {
                if($oldcat['alias']==$newcat['alias'])
                {
                    if($this->update($newcat, $catId))
                            $_SESSION['msg'].='Cập nhập nhóm sản phẩm thành công';
                    else
                        $_SESSION['msg'].='Cập nhập nhóm sản phẩm thất bại'; 
                    
                    
                }
                else
                {
                    if($this->get(['alias'=>$newcat['alias']]))
                        $_SESSION['msg'].='Lỗi ! alias đã tồn tại';
                    else
                    {
                        if($this->update($newcat, $catId))
                            $_SESSION['msg'].='Cập nhập nhóm sản phẩm thành công';
                        else
                            $_SESSION['msg'].='Cập nhập nhóm sản phẩm thất bại'; 
                        
                        
                    }
                }
            }
                    
        
    }
    
}
?>