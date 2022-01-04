<?php
class AdminCustomerModel extends AdminModel{
    protected $table=DB_PREFIX.'customer';
    protected $field=['userId','fullname','address','phone','email','trash'];
    protected $key='customerId';
    public function customerList($limit, $offset){
        //lay danh sach san pham
        $customermodel=new CustomerModel;
        $data['customers']=$customermodel->getAllLimit(['trash'=>0], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($customermodel->getAll(['trash'=>0]));
        //Chuan bi paging
        $data['paging']=new Paging('admincustomer/customerlist/', $totalRecords, $limit, $offset);
        return $data;
    }
    
    public function updatecustomer($customerId){
        //Hứng thông tin khách hàng
        $_SESSION['msg']='';
        $newcustomer['fullname']=$_POST['inputFullname'];
        $newcustomer['address']=$_POST['inputAddress'];
        $newcustomer['phone']=$_POST['inputPhone'];
        $newcustomer['email']=$_POST['inputMail'];
        $newcustomer['trash']=0;
        //Update thông tin khách hàng
        if($this->update($newcustomer, $customerId))
            $_SESSION['msg'].='Cập nhập thành công';
        else
            $_SESSION['msg'].='Cập nhập thất bại';
        header("Location:".BASE_URL."admincustomer/customerList");
        exit;
    }
    public function updateCustomerInOrder($customerId){
        //Hứng thông tin khách hàng
        $_SESSION['msg']='';
        $newcustomer['fullname']=$_POST['inputFullname'];
        $newcustomer['address']=$_POST['inputAddress'];
        $newcustomer['phone']=$_POST['inputPhone'];
        $newcustomer['email']=$_POST['inputMail'];
        $newcustomer['trash']=0;
        //Update thông tin khách hàng
        if($this->update($newcustomer, $customerId))
            $_SESSION['msg'].='Cập nhập thành công';
        else
            $_SESSION['msg'].='Cập nhập thất bại';   
    }
    
}
?>