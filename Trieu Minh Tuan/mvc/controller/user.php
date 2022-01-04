<?php
class User extends UserController{
    private $usermodel;
    function __construct(){
        $this->registermodel=new UserModel;
    }
    public function userRegister(){
        if(isset($_POST['register']))
            $this->registermodel->userRegister(); 
        $this->loadView('master3','auth/userregister',[]);
    }
    
}
?>