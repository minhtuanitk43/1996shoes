<?php 
class AdminProductModel extends AdminModel{
    protected $table= DB_PREFIX.'product';
    protected $field=['productName','alias','catId','brandId','detail','price','saleprice','image','status','trash'];
    protected $key='productId';

    public function productList($limit, $offset){
        //lay danh sach san pham
        // if(!empty($_POST))
        // { 
            
            // if(!empty($_SESSION['product_filter']))
            // {
                $where="trash='0'";
                foreach($_POST as $field => $value)
                {
                    if(!empty($value)){
                        switch($field){
                            case 'productName': 
                                $where .=" and "."`".$field."` LIKE '%".$value."%'";
                                break;
                            case 'brandName': 
                                $where .=" and "."`".$field."` LIKE '%".$value."%'";
                                break;
                            case 'catName': 
                                $where .=" and "."`".$field."` LIKE '%".$value."%'";
                                break;
                            default:
                                $where .=" and "."`".$field."` = ".$value."";
                            break;

                        }
                    }
                }
                
            // }

                $sql="select * from $this->table where $where limit $offset, $limit";
                $data['products']=$this->queryAll($sql);
                    //Tinh tong so san pham
                $sql="select * from $this->table where $where";
                $data['totalRecords']=$totalRecords=count($this->queryAll($sql));
                //Chuan bi paging
                $data['paging']=new Paging('adminproduct/productlist/', $totalRecords, $limit, $offset);
        
        // else
        // {
        //     $data['products']=$this->getAllLimit(['trash'=>0], $limit, $offset);
        
        //     //Tinh tong so san pham
        //     $data['totalRecords']=$totalRecords=count($this->getAll(['trash'=>0]));
        //     //Chuan bi paging
        //     $data['paging']=new Paging('adminproduct/productlist/', $totalRecords, $limit, $offset);
        // }
        return $data;

    }
    public function toggleTrash($productId){
        if($this->toggle('trash',$productId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';
        // header("location:".BASE_URL."adminproduct/productlist/".LIMIT."/0");

    }
        public function toggleStatus($productId){
        if($this->toggle('status',$productId)) 
        $_SESSION['msg']="Thuc hien thanh cong !";
        else
        $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';
        // header("location:".BASE_URL."adminproduct/productlist/".LIMIT."/0");
    }

    public function productListInTrash($limit, $offset){
        //lay danh sach san pham
        $data['products']=$this->getAllLimit(['trash'=>1], $limit, $offset);
        //Tinh tong so san pham
        $totalRecords=count($this->getAll(['trash'=>1]));
        //Chuan bi paging
        $data['paging']=new Paging('adminproduct/productlistintrash/', $totalRecords, $limit, $offset);
        return $data;
    }
    public function productDelete($key){
        if($this->delete($key))
            $_SESSION['msg']="Xo?? s???n ph???m v??nh vi???n th??nh c??ng !";
        else
            $_SESSION['msg']="Thuc hien that bai !";
        echo '<script>window.history.back()</script>';    
        
    }
    public function doAddProduct(){
        //L???y d??? li???u s???n ph???m m???i
        $newpro['productName']=$_POST['inputProductName'];
        $newpro['alias']=$_POST['inputAlias'];
        $newpro['catId']=$_POST['inputCatId'];
        $newpro['brandId']=$_POST['inputBrandId'];
        $newpro['detail']=$_POST['inputDetail'];
        $newpro['price']=$_POST['inputPrice'];
        $newpro['saleprice']=$_POST['inputSalePrice'];
        $newpro['image']=basename($_FILES['inputFileUpload']['name']);
        $newpro['status']=$_POST['inputStatus'];
        $newpro['trash']=0;
        $_SESSION['msg']='';
        $newpro['productName']=preg_replace('/(#|%|!|&|`)/', '_',$newpro['productName']);
        if($newpro['saleprice']=='') $newpro['saleprice']=0;    
        //T???o chu???i alias
        $helper=new Helper;
        if($newpro['alias']=='')
            $newpro['alias']=$helper->to_alias($newpro['productName']);
        //Ki???m l???i
        $_SESSION['msg']='';
        if($newpro['price']<$newpro['saleprice'])
        $_SESSION['msg'].='Gi?? sale ph???i nh??? h??n gi?? b??n';
        else{
            $uploadSuccess=$helper->doUpload('inputFileUpload');
            if($uploadSuccess){
                if($this->insert($newpro))
                    $_SESSION['msg'].='Th??m s???n ph???m th??nh c??ng';
                else
                    $_SESSION['msg'].='Th??m s???n ph???m th???t b???i';    
            }
        }
        
    }
 
    public function doUpdateProduct($productId){
        //L???y d??? li???u s???n ph???m m???i
        $newpro['productName']=$_POST['inputProductName'];
        $newpro['alias']=$_POST['inputAlias'];
        $newpro['catId']=$_POST['inputCatId'];
        $newpro['brandId']=$_POST['inputBrandId'];
        $newpro['detail']=$_POST['inputDetail'];
        $newpro['price']=$_POST['inputPrice'];
        $newpro['saleprice']=$_POST['inputSalePrice'];
        $newpro['image']=basename($_FILES['inputFileUpload']['name']);
        $newpro['status']=$_POST['inputStatus'];
        $newpro['trash']=0;
        //X??? l?? d??? li???u h???p l???
        $newpro['productName']=preg_replace('/(#|%|!|&|`)/', '_',$newpro['productName']);
        if($newpro['saleprice']=='')$newpro['saleprice']=0;
        //T???o chu???i alias
        $helper=new Helper;
        if($newpro['alias']=='')
            $newpro['alias']=$helper->to_alias($newpro['productName']);
        //Ki???m l???i
        if($newpro['saleprice']=='') $newpro['saleprice']=0;
        $_SESSION['msg']='';
        if($newpro['price']<$newpro['saleprice'])
            $_SESSION['msg'].='Gi?? sale ph???i nh??? h??n gi?? b??n';
        else{
            if($_FILES['inputFileUpload']['name']!='')
            {
                $_SESSION['msg'].="file up len:".$_FILES['inputFileUpload']['name'];
                $uploadSuccess=$helper->doUpload('inputFileUpload');
                if($uploadSuccess)
                {   
                    if($this->update($newpro, $productId))
                        $_SESSION['msg'].='C???p nh???p s???n ph???m th??nh c??ng';
                    else
                        $_SESSION['msg'].='C???p nh???p s???n ph???m th???t b???i';
                        
                    
                }  
            }
            else
            {   $adminproductmodel=new AdminProductModel;
                $oldproduct=$adminproductmodel->get(['productId'=>$productId]);
                $newpro['image']=$oldproduct['image'];
                if($this->update($newpro,$productId)==true)
                    $_SESSION['msg'].='C???p nh???p s???n ph???m th??nh c??ng !';
                else
                    $_SESSION['msg'].='C???p nh???p s???n ph???m th???t b???i !';  
                     
                
            }
            
        }
    }

}
?>