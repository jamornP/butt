<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/butt/function/function.php";?>
<?php
    use App\Model\Procurement\Users;
    $usersObj = new Users;   
   
    print_r($_POST);
    $ck=$usersObj->checkUser($_POST);
    if($ck){
        header('Location: /butt/procurement/pages/book');
    }else{
        header('Location: /butt/procurement/pages/auth/index.php?msg=no');
    }
 ?>