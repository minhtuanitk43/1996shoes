<?php
class SlideModel  extends BaseModel{
    protected $table= DB_PREFIX.'slide';
    protected $field=['image','imageName','price','saleprice','alias','position','trash','status'];
    protected $key='id';
}
?>