<?php
class Topic extends UserController{
    private $topicmodel;
    function __construct(){
        $this->topicmodel=new TopicModel;
    }
    public function showTopic($limit=LIMIT, $offset=0){
        $data=$this->topicmodel->showTopic($limit, $offset);
        $this->loadView('master1','topic/showtopic',$data);
    }
    public function topicDetail($topicId){
        $data=$this->topicmodel->topicDetail($topicId);
        $this->loadView('master1','topic/topicdetail',$data);
    }
    
}
?>