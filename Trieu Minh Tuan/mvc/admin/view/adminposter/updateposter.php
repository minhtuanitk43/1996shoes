<?php
$oldposter=$data['oldposter'];
?>


<div class='col-md-9'>
<div class="text-center fs-3 text-primary fw-bold mb-3">UPDATE POSTER</div>
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
                <td class='col-md-3'><lable>Title</lable></td>
                <td><input type='text' name=inputTitle required value='<?php echo $oldposter['title']?>'></td>
            </tr>
            <tr>
                <td class='col-md-3'><lable>Image</lable></td>
                <td><input type=file name=inputFileUpload></td>
                <td><lable>Hình cũ: <?php echo $oldposter['image']?></lable> <img  class="img-thumbnail float-end" src="<?php echo BASE_URL;?>public/upload/<?php echo $oldposter['image']?>" alt="<?php echo $oldposter['image']?>"></td>
            </tr>
            <tr>
                <td class='col-md-3'><lable>Status</lable></td>
                <td>
                    <select name=inputStatus>
                        <option value=0 <?php if($oldposter['status']==0) echo "selected"?>>Ẩn</option>
                        <option value=1 <?php if($oldposter['status']==1) echo "selected"?>>Hiện</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Trash</lable></td>
                <td>
                    <select name=inputTrash>
                        <option value=0 <?php if($oldposter['trash']==0) echo "selected"?>>Không</option>
                        <option value=1 <?php if($oldposter['trash']==1) echo "selected"?>>Trash</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type='submit' name=submit value=Submit>
                <input type='reset' name=reset value=Reset></td>
            </tr>
        </table>
        </form>
    </div>
</div>