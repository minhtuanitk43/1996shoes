<?php
$cats=$data['cats'];
$brands=$data['brands'];
?>


<div class='col-md-9'>
<div class="text-center fs-3 text-primary fw-bold mb-3">ADD PRODUCT</div>
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
                <td><input type='text' name='inputProductName' required></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Alias</lable></td>
                <td><input type='text' name='inputAlias'></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Category Name</lable></td>
                <td>
                    <select  name=inputCatId>
                        <?php foreach($cats as $cat){?>
                        <option value="<?php echo  $cat['catId']?>">
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
                        <option value="<?php echo  $brand['brandId']?>">
                            <?php echo $brand['brandName'] ?>
                        </option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td class='col-md-3'><lable>Chi tiết sản phẩm</lable></td>
                <td><textarea name=inputDetail required cols=60 rows=10></textarea></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Price</lable></td>
                <td><input type='number' name=inputPrice max=10000 min=1 step='0.01'></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Sale Price</lable></td>
                <td><input type='number' name=inputSalePrice max=10000 min=0 step='0.01'></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Image</lable></td>
                <td><input type='file' name=inputFileUpload></td>
            </tr>
            <tr>
                <td class='col-md-3'><lable>Status</lable></td>
                <td><select name=inputStatus>
                    <option value=0>Ẩn</option>
                    <option selected value=1>Hiện</option>
                </select></td>
            </tr>
            <tr>
                <td><input type='submit' name=submit value=Submit>
                <input type=reset name=reset value=Reset></td>
            </tr>
        </table>
        </form>
    </div>
</div>