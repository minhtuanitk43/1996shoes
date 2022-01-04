<?php
class CartModel extends BaseModel{
    public function checkOut($total)
    {   
        if($total<=0) $_SESSION['msg']='Chưa có sản phẩm nào trong giỏ hàng.';
        else
        {
            $_SESSION['msg']='';
            //Hứng dữ liệu customer đưa vào
            if(isset($_SESSION['userId'])) $newcustomer['userId']=$_SESSION['userId']; 
            else $newcustomer['userId']= 0;
            $newcustomer['fullname']=$_POST['inputFullname'];
            $newcustomer['address']=$_POST['inputAddress'];
            $newcustomer['phone']=$_POST['inputPhone'];
            $newcustomer['email']=$_POST['inputMail'];
            $newcustomer['trash']=0;

            $customermodel=new CustomerModel;
            if(!$customermodel->insert($newcustomer))$_SESSION['msg'].='Lỗi trong quá trình xử lý đơn hàng !';
            //Lấy Id của newcustomer
            $sql="select * from ".DB_PREFIX ."customer order  by customerId DESC ";
            $customerId=$this->queryFirst($sql)['customerId'];

            //Hứng dữ liệu của order và đưa vào csdl
            $neworder['customerId']=$customerId;
            $neworder['orderDate']=date('Y-m-d H:i:s');
            $neworder['updateDate']=date('Y-m-d H:i:s');
            $neworder['total']=$total;
            $neworder['note']=$_POST['inputNote'];
            $neworder['status']=1;
            $neworder['trash']=0;

            $ordermodel=new OrderModel;
            if(!$ordermodel->insert($neworder))$_SESSION['msg'].='Lỗi trong quá trình xử lý đơn hàng !';
            //Lấy Id của order

            $sql="select * from ".DB_PREFIX ."order order  by customerId DESC ";
            $orderId=$this->queryFirst($sql)['orderId'];
            
            //Hứng dữ liệu chi tiết order
            $orderdetailmodel=new OrderDetailModel;
            
            foreach($_SESSION['cart'] as $k=>$c)
            {
                $neworderDetail['orderId']=$orderId;
                $neworderDetail['productId']=$k;
                $neworderDetail['price']=$c['price'];
                $neworderDetail['quantity']=$c['quantity'];
                $neworderDetail['trash']=0;
                
                if(!($orderdetailmodel->insert($neworderDetail)))$_SESSION['msg'].='Lỗi trong quá trình xử lý đơn hàng !';
            }
            if($_SESSION['msg']=='')
            {
                $_SESSION['msg']="Đặt hàng thành công !";
                unset($_SESSION['cart']);
            }
        }
    }
}
?>