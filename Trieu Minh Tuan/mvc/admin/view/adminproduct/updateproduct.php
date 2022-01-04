<?php
$cats=$data['cats'];
$brands=$data['brands'];
$oldproduct=$data['oldproduct'];
?>


<div class='col-md-9'>
<div class="text-center fs-3 text-primary fw-bold mb-3">UPDATE PRODUCT</div>
    <h5>
        <?php if(isset($_POST['submit'])) {?>
            <?php echo "<a class='text-decoration-none' href=\"javascript:history.go(-2)\"><i class='fas fa-angle-double-left me-1'></i>GO BACK</a>";?>
        <?php }?>
    </h5>         
    <div class="row btn-success">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg']; unset($_SESSION['msg']);}?>
    </div>
    <div class=row>
        <form method=post action='' enctype='multipart/form-data'>
        
        <table>
            <tr>
                <td class='col-md-3'><lable>Product Name</lable></td>
                <td><input type='text' name=inputProductName required value='<?php echo $oldproduct['productName']?>'></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Alias</lable></td>
                <td><input type='text' name=inputAlias value='<?php echo $oldproduct['alias']?>'></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Category Name</lable></td>
                <td>
                    <select  name=inputCatId>
                        <?php foreach($cats as $cat){?>
                            <option value="<?php echo  $cat['catId']?>" <?php if($oldproduct['catId']==$cat['catId']) echo "selected"?>>
                            <?php echo $cat['catName'] ?>
                            </option>
                        <?php }?>
                    </select>
                </td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Brand Name</lable></td>
                <td>
                    <select  name=inputBrandId>
                    <?php foreach($brands as $brand){?>
                        <option value="<?php echo  $brand['brandId']?>" <?php if($oldproduct['brandId']==$brand['brandId']) echo "selected"?>>
                            <?php echo $brand['brandName'] ?>
                        </option>
                    <?php }?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td class='col-md-3'><lable>Chi tiết sản phẩm</lable></td>
                <td><textarea name=inputDetail required cols=60 rows=10><?php echo $oldproduct['detail']?> </textarea></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Price</lable></td>
                <td><input type='number' name=inputPrice max=10000 min=1 step='0' value='<?php echo $oldproduct['price']?>'></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Sale Price</lable></td>
                <td><input type='number' name=inputSalePrice max=10000 min=0 step='0' value='<?php echo $oldproduct['saleprice']?>'></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Image</lable></td>
                <td><input type=file name=inputFileUpload></td>
                <td><lable>Hình cũ: <?php echo $oldproduct['image']?></lable> <img  class="img-thumbnail float-end" src="<?php echo BASE_URL;?>public/upload/<?php echo $oldproduct['image']?>" alt="<?php echo $oldproduct['image']?>"></td>
            </tr>
            <tr>
                <td class='col-md-3'><lable>Status</lable></td>
                <td>
                    <select name=inputStatus>
                        <option value=0 <?php if($oldproduct['status']==0) echo "selected"?>>Ẩn</option>
                        <option value=1 <?php if($oldproduct['status']==1) echo "selected"?>>Hiện</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Trash</lable></td>
                <td>
                    <select name=inputTrash>
                        <option value=0 <?php if($oldproduct['trash']==0) echo "selected"?>>Không</option>
                        <option value=1 <?php if($oldproduct['trash']==1) echo "selected"?>>Trash</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class=pt-2>
                    <button class="btn btn-primary" type='submit' name=submit>Update</button>
                    <button class="btn btn-primary" type='reset' name=reset>Reset</button>
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>