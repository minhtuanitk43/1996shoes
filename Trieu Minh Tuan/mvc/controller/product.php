<?php
class Product extends UserController{
    private $productmodel;
    function __construct(){
        $this->productmodel=new ProductModel;
   
    }
    public function home($limit=LIMIT, $offset=0){
        $data=$this->productmodel->home($limit, $offset);
        
        $this->loadView('master1','product/home',$data);
    }
    public function allProduct($limit=LIMIT, $offset=0){
        $data=$this->productmodel->allProduct($limit, $offset);
        
        $this->loadView('master2','product/allproduct',$data);
    }
    public function productByCat($catAlias, $limit=LIMIT, $offset=0){
        
        $data=$this->productmodel->productByCat($catAlias, $limit, $offset);
        $this->loadView('master2','product/productbycat',$data);
    }
    public function productDetail($productAlias){
        
        $data=$this->productmodel->productDetail($productAlias);
        $this->loadView('master2','product/productdetail',$data);
    }
    public function productSearch($limit=LIMIT, $offset=0){
        //Xac dinh $searchKey
        if(isset($_POST['searchKey'])) 
           { $searchKey=$_POST['searchKey'];
            $_SESSION['searchKey']=$searchKey;
           }
        else 
        $searchKey=$_SESSION['searchKey'];
        
        
        //Chuan bi du lieu
        $data=$this->productmodel->productSearch($searchKey, $limit, $offset);
        $this->loadView('master2','product/productsearch',$data);
    }
    public function productByBrand($brandAlias, $limit=LIMIT, $offset=0){
       
        $data=$this->productmodel->productByBrand($brandAlias, $limit=LIMIT, $offset);
        $this->loadView('master2','product/productbybrand',$data);
    }
}   
?>