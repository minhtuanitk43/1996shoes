<?php
class BaseModel extends Db{
    protected $table;
    protected $field;
    protected $key;
    protected $col;
    public function getAll($cond){
        $cond=$this->where($cond);
        $sql="select * from $this->table $cond";
        return ($this->queryAll($sql));     
    }
    // public function getAllProductList($where,$limit,$offset){
    //     $sql="select * from $this->table where $where limit $offset, $limit";
    //     return ($this->queryAll($sql));     
    // }
    public function getAllLimit($cond, $limit, $offset){
        $cond=$this->where($cond);
        $sql="select * from $this->table $cond limit $offset, $limit";
        return ($this->queryAll($sql));     
    }

    public function get($cond){
        $cond=$this->where($cond);
        $sql="select * from $this->table $cond";
        return ($this->queryFirst($sql)); 
           
    }
    public function where($cond){
        $condString='';
        if($cond!=[]){
            foreach($cond as $k=>$v)
                {$condString.=" $k='$v' and ";}
            $condString=substr($condString,0,strlen($condString)-4);
            $condString="where".$condString;
        }
        return $condString;
    }
    function insert($data){
        $dataString="'".implode("','",$data)."'";
        $fieldString=implode(',',$this->field);
        $sql=" insert into $this->table($fieldString) values ($dataString)";
        return $this->query($sql);
        
    }
    function delete($key){
        $sql=" delete from $this->table where $this->key=$key";
        return $this->query($sql);
    }
    function getcol($cond){
        $cond=$this->where($cond);
        $sql="select $this->col from $this->table $cond";
        return $this->queryAll($sql);
    }
}
?>