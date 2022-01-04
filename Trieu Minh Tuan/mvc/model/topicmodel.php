<?php
class TopicModel  extends BaseModel{
    protected $table=DB_PREFIX.'topic';
    protected $field=['title','image','createDate','trash','status'];
    protected $key='topicId';
    public function showTopic($topicId){
        //lay data trong bang page
        $data['topics']=$this->getAll(['trash'=>0,'status'=>1]);
       return $data;
   }
   public function topicDetail($topicId){
    //lay data trong bang page
    $data['topic']=$this->get(['topicId'=>$topicId]);
   return $data;
}
}
?>