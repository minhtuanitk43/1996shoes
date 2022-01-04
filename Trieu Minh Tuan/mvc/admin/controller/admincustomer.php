<?php
class AdminCustomer extends AdminController{
    public function customerList($limit=LIMIT, $offset=0)
    {
      $admincustomermodel=new AdminCustomerModel;
      $data=$admincustomermodel->customerList($limit, $offset);
      $this->loadAdminView('adminmaster1','admincustomer/customerlist',$data);
    }
    public function customerListInTrash($limit=LIMIT, $offset=0)
    {
      $admincustomermodel=new AdmincustomerModel;
      $data=$admincustomermodel->customerListInTrash($limit, $offset);
      $this->loadAdminView('adminmaster1','admincustomer/customerlistintrash',$data);
    }
    public function updateCustomer($customerId)
    { 
      $admincustomermodel=new AdminCustomerModel;
      if(isset($_POST['submit']))
        $admincustomermodel->updatecustomer($customerId);
      $data['oldcustomer']=$admincustomermodel->get(['customerId'=>$customerId]);
      $this->loadAdminView('adminmaster1','admincustomer/updatecustomer',$data);
    }
    public function updateCustomerInOrder($customerId)
    { 
      $admincustomermodel=new AdminCustomerModel;
      if(isset($_POST['submit']))
        $admincustomermodel->updateCustomerInOrder($customerId);
      $data['oldcustomer']=$admincustomermodel->get(['customerId'=>$customerId]);
      $this->loadAdminView('adminmaster1','admincustomer/updatecustomer',$data);
    }
    
}