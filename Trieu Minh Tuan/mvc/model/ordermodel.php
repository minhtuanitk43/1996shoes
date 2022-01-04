<?php
class OrderModel extends AdminModel{
    protected $table=DB_PREFIX.'order';
    protected $field=['customerId','orderDate','updateDate','total','note','status','trash'];
    protected $key='orderId';
}
?>