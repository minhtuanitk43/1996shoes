<?php 
class UserModel extends BaseModel{
    protected $table= DB_PREFIX.'user';
    protected $field=['username','pass','fullname','email','status','trash'];
    protected $key='userId';
    public function userLogin()
    {
        //Hứng dữ liệu
        $username=$_POST['inputUsername'];
        $password=md5(md5($_POST['inputPassword']));
        //Lấy user từ bảng admin
        $u=$this->get(['username'=>$username,'trash'=>0]);
        if(isset($u))
        {
            if(($u['pass']==$password))
            {
                $_SESSION['username_user']=$username;
                $_SESSION['userId']=$u['userId'];
                header('Location:'.BASE_URL);
                exit;
            }
            else
            {
                $_SESSION['msg']= "PassWord không chính xác !";
                header('Location:'.BASE_URL.'auth/adminlogin');
                exit;
            }
        }
        else
        {
            $_SESSION['msg']= "UserName không tồn tại !";
                header('Location:'.BASE_URL.'auth/adminlogin');
                exit;
        }
    }
    public function userRegister(){
        $authmodel=new AuthModel;
        //Lấy dữ liệu sản phẩm mới
        $newuser['username']=$_POST['inputUsername'];
        $newuser['pass']=md5(md5($_POST['inputPass']));
        $newuser['fullname']=$_POST['inputFullname'];
        $newuser['email']=$_POST['inputMail'];   
        $newuser['status']=1;   
        $newuser['trash']=0;    
        //Kiểm lỗi
        $_SESSION['msg']='';
        if($newuser['pass']!=md5(md5($_POST['inputPassAgain']))) $_SESSION['msg']='Nhập lại mật khẩu không khớp';
        else
        {
            if($this->get( ['username'=>$newuser['username']])||$authmodel->get(['username'=>$newuser['username']]))  $_SESSION['msg']='Username đã tồn tại';
            else
            {   
                if($this->get(['email'=>$newuser['email']])||$authmodel->get(['email'=>$newuser['email']])) $_SESSION['msg']='Email này đã được sử dụng';
                else
                {
                    if($this->insert($newuser))
                        $_SESSION['msg'].='Đăng ký thành công';
                    else
                        $_SESSION['msg'].='Đăng ký thất bại';  
                }
                
            }  
        }

        header('Location:'.BASE_URL.'user/userregister');
        exit;
  
    }
}
?>