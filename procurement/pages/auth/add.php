<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/butt/function/function.php";?>
<?php
    use App\Model\Procurement\Users;
    $usersObj = new Users;   
   
    $da = $usersObj->createUser();
    header("location: /butt/procurement/pages/auth/index.php");
 ?>