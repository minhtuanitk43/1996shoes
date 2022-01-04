<?php
class AdminLinkModel extends AdminModel{
    public function addLink(){
        $_SESSION['msg']='';
        //Hứng dữ liệu dưa vào link
        $newlink['title']=$_POST['inputTitle'];
        $newlink['position']=$_POST['inputPosition'];
        $newlink['image']='';
        if($_POST['inputLinkContent']==0)$newlink['link']=$_POST['LinkContent'];
        else $newlink['link']=BASE_URL."page/showpage/";
        $newlink['orders']=$_POST['inputOrders'];
        $newlink['trash']=0;
        $newlink['status']=$_POST['inputStatus'];
        
        $linkmodel=new LinkModel;
        if(!$linkmodel->insert($newlink))$_SESSION['msg'].='Lỗi trong quá trình thêm liên kết !';
        
        //Lấy linkId
        $sql="select * from ".DB_PREFIX ."link order by linkId DESC ";
        $linkId=$this->queryFirst($sql)['linkId'];
        //Hứng dữ liệu dưa vào page nếu người dùng thêm bài viết   
        if($_POST['inputLinkContent']==1)
        {   
            $pagemodel=new pageModel;
                //Lấy adminId
                $admin=new AuthModel;
                $adminid=$admin->get(['username'=>$_SESSION['username']]);
            $newpage['linkId']=$linkId;
            $newpage['title']=$_POST['inputTitle'];
            $newpage['content']=$_POST['LinkContent'];
            $newpage['createBy']=$adminid['adminId'];
            $newpage['createDate']=date('Y-m-d H:i:s');
            $newpage['updateDate']=date('Y-m-d H:i:s');
            $newpage['trash']=0;
            $newpage['status']=$_POST['inputStatus'];

            if(!$pagemodel->insert($newpage))
                $_SESSION['msg'].='Lỗi trong quá trình thêm nội dung !';
            if($_SESSION['msg']=='')
                $_SESSION['msg']="Thêm bài viết thành công !";
        
        }
        else
            $_SESSION['msg']="Thêm liên kết thành công !";
    }
    public function linkList($limit, $offset){
        //lay danh sach san pham
        $linkmodel=new LinkModel;
        $data['links']=$linkmodel->getAllLimit(['trash'=>0], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($linkmodel->getAll(['trash'=>0]));
        //Chuan bi paging
        $data['paging']=new Paging('adminlink/linklist/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function linkDetail($linkId){
        //lay danh sach san pham
        $linkmodel=new LinkModel;
        $data['link']=$linkmodel->get(['linkId'=>$linkId]);
        $pagemodel=new PageModel;
        $data['page']=$pagemodel->get(['linkId'=>$linkId]);
        return $data;
    }
    public function toggleStatus($linkId){
        $pagemodel=new PageModel;
        $linkmodel=new LinkModel;  
        if($pagemodel->toggle('status',$linkId)) 
            if($linkmodel->toggle('status',$linkId))
                $_SESSION['msg']="Thuc hien thanh cong !";
            else
            $_SESSION['msg']="Thuc hien that bai !";
            
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            
            // header("location:".BASE_URL."adminlink/linklist/".LIMIT."/0");
            exit;
    }
    public function toggleTrash($linkId)
    {   
        $pagemodel=new PageModel;
        $linkmodel=new LinkModel;  
        if($pagemodel->toggle('trash',$linkId)) 
            if($linkmodel->toggle('trash',$linkId))
                $_SESSION['msg']="Thuc hien thanh cong !";
            else
            $_SESSION['msg']="Thuc hien that bai !";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            // header("location:".BASE_URL."adminlink/linklist/".LIMIT."/0");
            exit;

    }
    public function linkListInTrash($limit, $offset)
    {
        $linkmodel=new LinkModel;
        $data['links']=$linkmodel->getAllLimit(['trash'=>1], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($linkmodel->getAll(['trash'=>1]));
        //Chuan bi paging
        $data['paging']=new Paging('adminlink/linklistintrash/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function linkDelete($key){
        $linkmodel=new LinkModel;
        $pagemodel=new PageModel;
        if($linkmodel->delete($key))
        {
            if($pagemodel->delete($key))
            $_SESSION['msg']="Xoá Bài viết vĩnh viễn thành công !";
            else
            $_SESSION['msg']="Xoá link vĩnh viễn thành công !";
        }
           
        else
            $_SESSION['msg']="Thực hiện thất bại !";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        // header("Location:".BASE_URL."adminlink/linklistintrash");
        exit;     
        
    }

    // -------------------------
    public function updateLink($linkId){
        $_SESSION['msg']='';
        //Hứng dữ liệu dưa vào link
        $newlink['title']=$_POST['inputTitle'];
        $newlink['position']=$_POST['inputPosition'];
        $newlink['image']='';
        if($_POST['inputLinkContent']==0)$newlink['link']=$_POST['LinkContent'];
        else $newlink['link']=BASE_URL."page/showpage/";
        $newlink['orders']=$_POST['inputOrders'];
        $newlink['trash']=0;
        $newlink['status']=$_POST['inputStatus'];
        
        $linkmodel=new LinkModel;
        if(!$linkmodel->update($newlink,$linkId))$_SESSION['msg'].='Lỗi trong quá trình thêm liên kết !';
        //Hứng dữ liệu dưa vào page nếu người dùng thêm bài viết   
        if($_POST['inputLinkContent']==1)
        {   
            $pagemodel=new pageModel;
            $oldpage=$pagemodel->get(['linkId'=>$linkId]);
            $newpage['linkId']=$linkId;
            $newpage['title']=$_POST['inputTitle'];
            $newpage['content']=$_POST['LinkContent'];
            $newpage['createBy']=$oldpage['createBy'];
            $newpage['createDate']=$oldpage['createDate'];
            $newpage['updateDate']=date('Y-m-d H:i:s');
            $newpage['trash']=0;
            $newpage['status']=$_POST['inputStatus'];

            if(!$pagemodel->update($newpage,$oldpage['pageId']))
                $_SESSION['msg'].='Lỗi trong quá trình sửa nội dung !';
            if($_SESSION['msg']=='')
                $_SESSION['msg']="Sửa bài viết thành công !";
        
        }
        else
            $_SESSION['msg']="Sửa liên kết thành công !";     
    }
    
}
?>