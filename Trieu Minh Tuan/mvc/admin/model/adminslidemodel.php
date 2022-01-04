<?php
class AdminSlideModel extends SlideModel{
    
    public function addToSlide($productId)
    {
        $_SESSION['msg']='';
        $productmodel=new ProductModel;
        $product=$productmodel->get(['productId'=>$productId]);
        
        
        $newslide['image']= $product['image'];
        $newslide['imageName']=$product['productName'];
        $newslide['price']=$product['price'];
        $newslide['saleprice']=$product['saleprice'];
        $newslide['alias']=$product['alias'];
        $newslide['position']=1;
        $newslide['trash']=0;
        $newslide['status']=1;
        if($newslide['saleprice']=='') $newslide['saleprice']=0;
        
        if($this->get(['alias'=>$product['alias']]))
            echo '<script>alert("Sản phẩm này đã có trong SlideShow")</script>';
            // $_SESSION['msg'].='Sản phẩm này đã có trong SlideShow';
        else
        {
            if($this->insert($newslide))
            {
                echo '<script>alert("Thêm sản phẩm vào SlideShow thành công")</script>';
                $_SESSION['msg'].='Thêm sản phẩm vào SlideShow thành công';
                    
            }    
            else
                {
                    echo '<script>alert("Thêm sản phẩm vào SlideShow thất bại")</script>';
                    $_SESSION['msg'].='Thêm sản phẩm vào SlideShow thất bại';}
        }
        
        echo '<script>window.history.back()</script>';
    }
    public function removeFromSlide($alias)
    {
        // $_SESSION['msg']='';
        $slidemodel=new SlideModel;
        $slide=$slidemodel->get(['alias'=>$alias]);
        if(!$slide['alias'])
        {
            echo '<script>alert("Sản phẩm này chưa có trong SlideShow")</script>';
            // $_SESSION['msg'].='Sản phẩm này chưa có trong SlideShow';
        }
        else
        {
            if($this->delete($slide['id']))
            {   
                echo '<script>alert("Gỡ sản phẩm ra khỏi SlideShow thành công")</script>';
                $_SESSION['msg']='Gỡ sản phẩm ra khỏi SlideShow thành công';
            }    
            else
                echo '<script>alert("Gỡ sản phẩm ra khỏi SlideShow thất bại")</script>';
                //  $_SESSION['msg'].='Gỡ sản phẩm ra khỏi SlideShow thất bại';
        }
        
        echo '<script>window.history.back()</script>';
    }
}
?>