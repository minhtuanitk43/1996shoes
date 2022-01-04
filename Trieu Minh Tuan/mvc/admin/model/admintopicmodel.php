<?php
class AdmintopicModel extends AdminModel{
    protected $table= DB_PREFIX.'topic';
    protected $field=['title','content','image','createDate','trash','status'];
    protected $key='topicId';

    public function addtopic(){
        //Lấy dữ liệu sản phẩm mới
        $newtopic['title']=$_POST['inputTitle'];
        $newtopic['content']=$_POST['inputContent'];
        $newtopic['image']=basename($_FILES['inputFileUpload']['name']);
        $newtopic['createDate']=date('Y-m-d');
        $newtopic['trash']=0;
        $newtopic['status']=$_POST['inputStatus'];       
        //Kiểm lỗi
        $_SESSION['msg']='';
        $helper=new Helper;
        $uploadSuccess=$helper->doUpload('inputFileUpload');
        if($uploadSuccess){
            if($this->insert($newtopic))
                $_SESSION['msg'].='Thêm topic thành công';
            else
                $_SESSION['msg'].='Thêm topic thất bại';    
              }

    }
    public function topicList($limit, $offset){
        //lay danh sach san pham
        $data['topics']=$this->getAllLimit(['trash'=>0], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>0]));
        //Chuan bi paging
        $data['paging']=new Paging('admintopic/topiclist/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function toggleStatus($topicId){
        if($this->toggle('status',$topicId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';
    }
    public function toggleTrash($topicId)
    {
        if($this->toggle('trash',$topicId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';

    }
    public function topicListInTrash($limit, $offset)
    {
        //lay danh sach san pham
        $data['topics']=$this->getAllLimit(['trash'=>1], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>1]));
        //Chuan bi paging
        $data['paging']=new Paging('admintopic/topiclistintrash/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function topicDelete($key){
        if($this->delete($key))
            $_SESSION['msg']="Xoá topic vĩnh viễn thành công !";
        else
            $_SESSION['msg']="Thực hiện thất bại !";
        echo '<script>window.history.back()</script>';     
        
    }
    public function updateTopic($topicId){
        //Lấy dữ liệu topic mới
        $newtopic['title']=$_POST['inputTitle'];
        $newtopic['content']=$_POST['inputContent'];
        $newtopic['image']=basename($_FILES['inputFileUpload']['name']);
        $newtopic['createDate']=date('Y-m-d');
        $newtopic['trash']=0;
        $newtopic['status']=$_POST['inputStatus'];
        //Kiểm lỗi
        $_SESSION['msg']='';
        $helper=new Helper; 
        if($_FILES['inputFileUpload']['name']!='')
            {
                $_SESSION['msg'].="file up len:".$_FILES['inputFileUpload']['name'];
                $uploadSuccess=$helper->doUpload('inputFileUpload');
                if($uploadSuccess)
                {   
                    if($this->update($newtopic, $topicId))
                          $_SESSION['msg'].='Cập nhập thành công';
                    else
                          $_SESSION['msg'].='Cập nhập thất bại';    
                }  
            }
        else
            {   
                
                $oldtopic=$this->get(['topicId'=>$topicId]);
                $newtopic['image']=$oldtopic['image'];
                if($this->update($newtopic,$topicId)==true)
                      $_SESSION['msg'].='Cập nhập thành công !';
                else
                      $_SESSION['msg'].='Cập nhập thất bại !';  
            }

        
        
                    
        
    }
    
}
?>