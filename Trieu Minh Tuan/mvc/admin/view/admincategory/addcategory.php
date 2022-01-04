
<div class='col-md-9'>
<div class="text-center fs-3 text-primary fw-bold mb-3">ADD CATEGORY</div>
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
                <td class='col-md-3'><lable>Category Name</lable></td>
                <td><input type='text' name='inputCatName' required></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>Alias</lable></td>
                <td><input type='text' name='inputAlias'></td>
            </tr>

            <tr>
                <td class='col-md-3'><lable>parentId</lable></td>
                <td><input type='number' name='inputParentId'></td>
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