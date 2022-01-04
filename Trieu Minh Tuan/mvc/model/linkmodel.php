<?php
class LinkModel  extends AdminModel{
    protected $table= DB_PREFIX.'link';
    protected $field=['title','position','image','link','orders','trash','status'];
    protected $key='linkId';
}
?>