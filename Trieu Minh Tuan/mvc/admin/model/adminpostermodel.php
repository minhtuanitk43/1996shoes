<?php
class AdminPosterModel extends AdminModel{
    protected $table= DB_PREFIX.'poster';
    protected $field=['title','image','trash','status'];
    protected $key='posterId';

    public function addPoster(){
        //Lấy dữ liệu sản phẩm mới
        $newposter['title']=$_POST['inputTitle'];
        $newposter['image']=basename($_FILES['inputFileUpload']['name']);
        $newposter['trash']=0;
        $newposter['status']=$_POST['inputStatus'];       
        //Kiểm lỗi
        $_SESSION['msg']='';
        $helper=new Helper;
        $uploadSuccess=$helper->doUpload('inputFileUpload');
        if($uploadSuccess){
            if($this->insert($newposter))
                $_SESSION['msg'].='Thêm poster thành công';
            else
                $_SESSION['msg'].='Thêm poster thất bại';    
              }

    }
    public function posterList($limit, $offset){
        //lay danh sach san pham
        $data['posters']=$this->getAllLimit(['trash'=>0], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>0]));
        //Chuan bi paging
        $data['paging']=new Paging('adminposter/posterlist/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function toggleStatus($posterId){
        if($this->toggle('status',$posterId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';
    }
    public function toggleTrash($posterId)
    {
        if($this->toggle('trash',$posterId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';

    }
    public function posterListInTrash($limit, $offset)
    {
        //lay danh sach san pham
        $data['posters']=$this->getAllLimit(['trash'=>1], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>1]));
        //Chuan bi paging
        $data['paging']=new Paging('adminposter/posterlistintrash/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function posterDelete($key){
        if($this->delete($key))
            $_SESSION['msg']="Xoá poster vĩnh viễn thành công !";
        else
            $_SESSION['msg']="Thực hiện thất bại !";
        echo '<script>window.history.back()</script>';    
        
    }
    public function updateposter($posterId){
        //Lấy dữ liệu poster mới
        $newposter['title']=$_POST['inputTitle'];
        $newposter['image']=basename($_FILES['inputFileUpload']['name']);
        $newposter['trash']=0;
        $newposter['status']=$_POST['inputStatus'];
        //Kiểm lỗi
        $_SESSION['msg']='';
        $helper=new Helper; 
        if($_FILES['inputFileUpload']['name']!='')
            {
                $_SESSION['msg'].="file up len:".$_FILES['inputFileUpload']['name'];
                $uploadSuccess=$helper->doUpload('inputFileUpload');
                if($uploadSuccess)
                {   
                    if($this->update($newposter, $posterId))
                          $_SESSION['msg'].='Cập nhập thành công';
                    else
                          $_SESSION['msg'].='Cập nhập thất bại';    
                }  
            }
        else
            {   
                
                $oldposter=$this->get(['posterId'=>$posterId]);
                $newposter['image']=$oldposter['image'];
                if($this->update($newposter,$posterId)==true)
                      $_SESSION['msg'].='Cập nhập thành công !';
                else
                      $_SESSION['msg'].='Cập nhập thất bại !';  
            }

        
        
                    
        
    }
    
}
?>