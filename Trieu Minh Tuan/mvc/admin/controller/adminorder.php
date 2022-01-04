<?php
class AdminOrder extends AdminController{
    public function orderList($limit=LIMIT, $offset=0)
    {
      $adminordermodel=new AdminOrderModel;
      $data=$adminordermodel->orderList($limit, $offset);
      $this->loadAdminView('adminmaster1','adminorder/orderlist',$data);
    }
    public function orderProcessingList($limit=LIMIT, $offset=0)
    {
      $adminordermodel=new AdminOrderModel;
      $data=$adminordermodel->orderProcessingList($limit, $offset);
      $this->loadAdminView('adminmaster1','adminorder/orderprocessinglist',$data);
    }
    public function orderProcessedList($limit=LIMIT, $offset=0)
    {
      $adminordermodel=new AdminOrderModel;
      $data=$adminordermodel->orderProcessedList($limit, $offset);
      $this->loadAdminView('adminmaster1','adminorder/orderprocessedlist',$data);
    }
    public function orderDetail($orderId)
    {
      $adminordermodel=new AdminOrderModel;
      $data=$adminordermodel->orderDetail($orderId);
      $this->loadAdminView('adminmaster1','adminorder/orderdetail',$data);
      // echo '<script>window.history.back();</script>';
    }
    public function toggleStatus($orderId)
    {
        $adminordermodel=new AdminOrderModel;
        $data=$adminordermodel->toggleStatus($orderId);
    }
    public function toggleTrash($orderId)
    {
      $adminordermodel=new AdminOrderModel;
      $adminordermodel->toggleTrash($orderId);
    }
    public function orderListInTrash($limit=LIMIT, $offset=0)
    {
      $adminordermodel=new AdminOrderModel;
      $data=$adminordermodel->orderListInTrash($limit, $offset);
      $this->loadAdminView('adminmaster1','adminorder/orderlistintrash',$data);
    }
    public function orderDelete($key){
        $adminordermodel=new AdminOrderModel;
        $adminordermodel->orderDelete($key);
    }
    public function updateOrder($orderId)
    {
      $adminordermodel=new AdminOrderModel;
      if(isset($_POST['submit']))
      $adminordermodel->updateOrder($orderId);
      $ordermodel=new OrderModel;
      $data['oldorder']=$ordermodel->get(['orderId'=>$orderId]);
      $orderdetailmodel=new orderdetailModel;
      $data['oldorderdetails']=$orderdetailmodel->getAll(['orderId'=>$orderId]);
      $this->loadAdminView('adminmaster1','adminorder/updateorder',$data);
      // echo '<script>window.history.back();</script>';
    }
    
}