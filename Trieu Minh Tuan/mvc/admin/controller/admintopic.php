<?php
class AdminTopic extends AdminController{
    public function addTopic()
    {
        if(isset($_POST['submit']))
        {
            $admintopicmodel=new AdminTopicModel;
            $admintopicmodel->addTopic();
           
        }
        $this->loadAdminView('adminmaster1','admintopic/addtopic',[]);
    }
    public function topicList($limit=LIMIT, $offset=0)
    {
      $admintopicmodel=new AdminTopicModel;
      $data=$admintopicmodel->topicList($limit, $offset);
      $this->loadAdminView('adminmaster1','admintopic/topiclist',$data);
    }
    public function toggleStatus($topicId)
    {
        $admintopicmodel=new AdminTopicModel;
        $admintopicmodel->toggleStatus($topicId);
    }
    public function toggleTrash($topicId)
    {
        $admintopicmodel=new AdminTopicModel;
        $admintopicmodel->toggleTrash($topicId);
    }
    public function topicListInTrash($limit=LIMIT, $offset=0)
    {
        $admintopicmodel=new AdminTopicModel;
        $data=$admintopicmodel->topicListInTrash($limit, $offset);
        $this->loadAdminView('adminmaster1','admintopic/topiclistintrash',$data);
    }
    public function topicDelete($key){
        $admintopicmodel=new AdminTopicModel;
        $data=$admintopicmodel->topicDelete($key);
    }
    public function updateTopic($topicId){ 
        //Xử lý dữ liệu
        $admintopicmodel=new AdminTopicModel;
        if(isset($_POST['submit']))
        {
          $admintopicmodel->updateTopic($topicId);
        }
        //Hiển thị form Update
        $data['oldtopic']=$admintopicmodel->get(['topicId'=>$topicId]);
        $this->loadAdminView('adminmaster1','admintopic/updatetopic',$data);
      }
    
}