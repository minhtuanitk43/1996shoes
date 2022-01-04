
<div class='row button btn-warning'>
<?php
if(!empty($data['msg'])) echo $data['msg'];?>
</div>
<?php
$page=$data['page'];
$link=$data['link'];
$adminmodel=new AuthModel;
$admin=$adminmodel->get(['adminId'=>$page['createBy']]);

?>


  <div class="text-center fs-3 text-primary fw-bold mb-3">LINK-PAGE DETAIL</div>
  <div class='row button btn-warning'>
<?php
if(!empty($_SESSION['msg'])){
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>
</div>
    <div class="row btn-success">
        <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg']; unset($_SESSION['msg']);}?>
    </div>
    <div class=row>
        <form method=post action='' enctype='multipart/form-data'>
        
        <table>
          <tr class="border-top">
                <td class='col-md-2'><lable class="fw-bold">LinkId</lable> 
                </td>
                <td class='ps-3'><?php echo $link['linkId'] ?></td>
            </tr>
            <tr class="border-top" class="border-top">
                <td class='col-md-2'><lable class="fw-bold">Title</lable></td>
                <td class='ps-3'><?php echo $link['title'] ?></td>
            </tr>
            <tr class="border-top">
                <td class='col-md-2'><lable class="fw-bold">Position</lable></td>
               <td class='ps-3'>
                  <?php echo $link['position']  ?>
                </td>
            </tr>
            

            <tr class="border-top">
                <td class='col-md-2'><lable class="fw-bold">Image</lable></td>
               <td class='ps-3'><?php echo $link['image'] ?></td>
            </tr>
            <tr class="border-top">
                <td class='col-md-2'><lable class="fw-bold">Link</lable> 
                </td>
               <td class='ps-3'><?php echo $link['link'] ?></td>
            </tr>
            <tr class="border-top">
                <td class='col-md-2'><lable class="fw-bold">Content</lable> 
                </td>
               <td class='ps-3'><?php echo $page['content'] ?></td>
            </tr>
            
            <tr class="border-top">
                <td class='col-md-2'><lable class="fw-bold">Create By</lable></td>
               <td class='ps-3'><?php echo $admin['username']." (ID: ".$admin['adminId'].")" ?></td>
            </tr>

            <tr class="border-top">
              <td class='col-md-2'><lable class="fw-bold">Create Date</lable></td>
               <td class='ps-3'><?php echo $page['createDate'] ?></td>
            </tr>
            <tr class="border-top">
              <td class='col-md-2'><lable class="fw-bold">Update Date</lable></td>
               <td class='ps-3'><?php echo $page['updateDate'] ?></td>
            </tr>
            <tr class="border-top">
                <td class='col-md-2'><lable class="fw-bold">Orders</lable></td>
               <td class='ps-3'>
                  <?php echo $link['orders'] ?>
                </td>
            </tr>   
            
            <tr class="border-top">
                <td class='col-md-2'><lable class="fw-bold">Status</lable></td>
               <td class='ps-3'><a href='<?php echo BASE_URL?>adminlink/toggleStatus/<?php echo $link['linkId']?>'><?php if($link['status']==1) echo '<i class="fas fa-check text-primary"></i>'; else echo '<i class="fas fa-times text-danger"></i>' ?></td>
            </tr>
            <tr class="border-top">
            <td class='col-md-2'><lable class="fw-bold">Action</lable></td>
             <td class='ps-3'><a data-toggle="tooltip" title="Xóa" href='<?php echo BASE_URL ?>adminlink/toggleTrash/<?php echo $link["linkId"]?>' onclick='return confirm("Bạn có chắc muốn xoá nhóm sản phẩm này không ?")'><i class="fas fa-trash me-1"></i></a>|<a data-toggle="tooltip" title="Chỉnh sửa" href='<?php echo BASE_URL?>adminlink/updatelink/<?php echo $link["linkId"] ?>'><i class="fas fa-edit ms-1"></i></a></td>
            </tr>
        </table>
        </form>
    </div>





