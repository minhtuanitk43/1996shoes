
    <div class="text-center fs-3 text-primary fw-bold mb-3">ADD LINK-PAGE</div>
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
                <td><input type='text' name='inputTitle' required></td>
            </tr>
            <tr>
                <td class='col-md-3'><lable>Position</lable></td>
                <td>
                    <select name=inputPosition>
                        <option value=header>Header</option>
                        <option value=bottommenu1>bottom-menu 1</option>
                        <option value=bottommenu2>bottom-menu 2</option>
                        <option value=bottommenu3>bottom-menu 3</option>
                    </select>
                </td>
            </tr>
            

            <tr>
                <td class='col-md-3'><lable>Image</lable></td>
                <td><input type='file' name=inputFileUpload></td>
            </tr>
            <tr>
                <td class='col-md-4'><lable>Nội dung</lable> 
                    <select name=inputLinkContent>
                        <option value=''>--Chọn--</option>
                        <option value=0>Thêm link</option>
                        <option value=1>Thêm bài viết</option>
                    </select>
                </td>
                <td><textarea name=LinkContent required cols=60 rows=10></textarea></td>
            </tr>
            <!-- <tr>
                <td class='col-md-3'><lable>Link</lable></td>
                <td><input type='link' name=inputLink></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Nội dung bài viết</lable></td>
                <td><textarea name=inputContent required cols=60 rows=20></textarea></td>
            </tr> -->

            <tr>
                <td class='col-md-3'><lable>Orders</lable></td>
                <td>
                <input type='link' name=inputOrders>
                </td>
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

