<?php  
class Helper
{
    public function to_alias($str){
        $str=trim(mb_strtolower($str));
        $str=preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str=preg_replace('/(è|é|ẹ|ẽ|ẻ|ê|ề|ế|ể|ễ|ệ)/', 'e',$str);
        $str=preg_replace('/(í|ì|ỉ|ĩ|ị)/', 'i',$str);
        $str=preg_replace('/(ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ)/', 'o',$str);
        $str=preg_replace('/(ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/', 'u',$str);
        $str=preg_replace('/(ý|ỳ|ỷ|ỹ|ỵ)/', 'y',$str);
        $str=preg_replace('/(đ)/', 'd',$str);
        $str=preg_replace('/[^a-z0-9-\s]/', '',$str);
        $str=preg_replace('/([\s]+)/', '-',$str);
        return $str;
    }
    public function doUpload($inputFileUpload){
        // Kiểm tra có dữ liệu fileupload trong $_FILES không
        //Nếu không có thì dừng
        $_SESSION['msg']='';
        if ($_FILES[$inputFileUpload]['error']!=0){
        $_SESSION['msg'].="Dữ liệu không đúng cấu trúc, dữ liệu upload bị lỗi hoặc chưa chọn file upload !<br>";
        }
        else
        {
            //Đã có dữ liệu upload, thực hiện xử lý file upload
            // Thư mục bạn dẽ lưu file upload
            $target_dir="public/upload/";
            //Vị trí lưu file trong server(file sẽ lưu torng uploads, với tên giống tên ban đầu)
            $target_file=$target_dir . basename($_FILES[$inputFileUpload]["name"]);
            $allowUpload=true;
            //Lấy phần mở rộng của file
            $imgFileType=pathinfo($target_file, PATHINFO_EXTENSION);
            // Kích thước lớn nhất đc upload
            $maxfilesize=1000000;
            // Nhưng loại file được phép upload
            $allowtypes=array('ipg','png','jpeg','gif');
            if(isset($_POST["ok"])){
                // Kiểm tra xem có phải là ảnh bằng hàm getimagesize
                $check=getimagesize($_FILES[$inputFileUpload]['tmp_name']);
                if($check !=false){
                    $_SESSION['msg'].="Đây là file ảnh - " .$check["mime"] . ".<br>";
                    $allowUpload=true;
                }
                else{
                    $_SESSION['msg'].="Không phải file ảnh !<b>";
                    $allowUpload=false;
                }
            }
            //Kiểm tra file đã tồn tại thì không cho ghi đè
            // Bạn có thể phát triển code để lưu thành mộ tên file khác
            if(file_exists($target_file))
            {
                $_SESSION['msg'].="Tên file đã tồn tại trên server, không thể ghi đè !<br>";
                $allowUpload = false;
            }
            //Kiểm tra kích thước file upload có vượt quá giới hạn cho phép
            if($_FILES[$inputFileUpload]["size"]>$maxfilesize)
            {
                $_SESSION['msg'].="Không được upload ảnh lớn hơn $maxfilesize(byte) !<br>";
                $allowUpload=false;
            }
            if($allowUpload){
                // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
                if(move_uploaded_file($_FILES[$inputFileUpload]['tmp_name'],$target_file))
                {
                    $_SESSION['msg'].=basename($_FILES[$inputFileUpload]["name"])." Đã upload thành công !<br>";
                    $_SESSION['msg'].="FIle lưu tại ".$target_file.'<br>';
                    return true;
                }   
                else
                {
                    $_SESSION['msg'].="Không upload được file, có thể do file lớn, kiểu file không đúng !";
                    return false;
                }
            }
        }
    }

}
?>  