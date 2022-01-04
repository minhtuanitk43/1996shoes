<?php
class OrderDetailModel extends AdminModel{
    protected $table=DB_PREFIX.'orderdetail';
    protected $field=['orderId','productId','price','quantity','trash'];
    protected $key='orderDetailId';
}
?>