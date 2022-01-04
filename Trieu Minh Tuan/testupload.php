<?php
session_start();
require 'mvc/lib/helper.php';
$h=new Helper;
$h->doUpload('imgupload');
echo($_SESSION['msg']);
unset($_SESSION['msg']);
?>