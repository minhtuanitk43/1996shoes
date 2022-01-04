<?php
class PosterModel  extends AdminModel{
    protected $table=DB_PREFIX.'poster';
    protected $field=['title','image','trash','status'];
    protected $key='posterId';
}
?>