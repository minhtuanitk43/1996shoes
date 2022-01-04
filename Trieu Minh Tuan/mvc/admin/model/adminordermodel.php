<?php
class AdminOrderModel extends AdminModel{
    
    public function orderList($limit, $offset){
        //lay danh sach san pham
        $ordermodel=new OrderModel;
        $data['orders']=$ordermodel->getAllLimit(['trash'=>0], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($ordermodel->getAll(['trash'=>0]));
        //Chuan bi paging
        $data['paging']=new Paging('adminorder/orderlist/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function orderProcessingList($limit, $offset){
        //lay danh sach san pham
        $ordermodel=new OrderModel;
        $data['orders']=$ordermodel->getAllLimit(['trash'=>0,'status'=>1], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($ordermodel->getAll(['trash'=>0,'status'=>1]));
        //Chuan bi paging
        $data['paging']=new Paging('adminorder/orderprocessinglist/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function orderProcessedList($limit, $offset){
         //lay danh sach san pham
         $ordermodel=new OrderModel;
         $data['orders']=$ordermodel->getAllLimit(['trash'=>0,'status'=>0], $limit, $offset);
         //Tinh tong so san pham
         $totalRecords=count($ordermodel->getAll(['trash'=>0,'status'=>0]));
         //Chuan bi paging
         $data['paging']=new Paging('adminorder/orderprocessedlist/', $totalRecords, $limit, $offset);
         return $data;
    }
    public function orderDetail($orderId){
        //lay danh sach san pham
        $ordermodel=new OrderModel;
        $data['order']=$ordermodel->get(['orderId'=>$orderId]);
        $orderdetailmodel=new orderdetailModel;
        $data['orderdetails']=$orderdetailmodel->getAll(['orderId'=>$orderId]);
        return $data;
    }
    public function toggleStatus($orderId){
        $ordermodel=new OrderModel;  
        
        if($ordermodel->toggle('status',$orderId))
                $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
            
        echo '<script>window.history.back()</script>';
            
        // header("location:".BASE_URL."adminorder/orderlist/".LIMIT."/0");
        exit;
    }
    public function toggleTrash($orderId)
    {   
        $orderdetailmodel=new OrderDetailModel;
        $ordermodel=new OrderModel;  
        if($ordermodel->toggle('trash',$orderId)&&$orderdetailmodel->toggle('trash',$orderId))
                $_SESSION['msg']="Thuc hien thanh cong !";
        else
            $_SESSION['msg']="Thuc hien that bai !";
            echo '<script>window.history.back()</script>';
            // header("location:".BASE_URL."adminorder/orderlist/".LIMIT."/0");
            exit;

    }
    public function orderListInTrash($limit, $offset)
    {
        //lay danh sach san pham
        $ordermodel=new OrderModel;
        $data['orders']=$ordermodel->getAllLimit(['trash'=>1], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($ordermodel->getAll(['trash'=>1]));
        //Chuan bi paging
        $data['paging']=new Paging('adminorder/orderlistintrash/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function orderDelete($key){
        $ordermodel=new OrderModel;
        $orderdetailmodel=new OrderdetailModel;
        $cusomermodel=new CustomerModel;
        $order=$ordermodel->get(['orderId'=>$key]);
        $orderdetaildel=$orderdetailmodel->getAll(['orderId'=>$key]);
        foreach($orderdetaildel as $del){
            $orderdetailmodel->delete($del['orderDetailId']);
            $cusomermodel->delete($order['customerId']);
        }
        if($ordermodel->delete($key))        
            $_SESSION['msg']="Xoá đơn hàng vĩnh viễn thành công !";

        else    
            $_SESSION['msg']="Thực hiện thất bại !";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
            // header("Location:".BASE_URL."adminorder/orderlistintrash");
        exit;     
        
    }

    // public function updateOrder($orderId){
    //     //Hứng dữ liệu
        
    //     //Hứng dữ liệu của order và đưa vào csdl
    //     $ordermodel=new OrderModel;
    //     $oldorder=$ordermodel->get(['orderId'=>$orderId]);
    //     $neworder['customerId']=$oldorder['customerId'];
    //     $neworder['orderDate']=$oldorder['orderDate'];
    //     $neworder['updateDate']=date('Y-m-d H:i:s');
    //     $neworder['total']=$total;
    //     $neworder['note']=$_POST['inputNote'];
    //     $neworder['status']=1;
    //     $neworder['trash']=0;

    //     $ordermodel=new OrderModel;
    //     $data['order']=$ordermodel->get(['orderId'=>$orderId]);
    //     $orderdetailmodel=new orderdetailModel;
    //     $data['orderdetails']=$orderdetailmodel->getAll(['orderId'=>$orderId]);
    //     return $data;
    // }
    
}
?>