<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php
use App\Model\Procurement\Book;
$bookObj = new Book; 
print_r($_REQUEST);
if($_REQUEST['edit']=='edit'){
    $data['bookNum']=$_REQUEST['bookNum'];
    $data['bookName']=$_REQUEST['bookName'];
    $data['bookDate']=$_REQUEST['bookDate'];
    $data['departmentForm_id']=$_REQUEST['departmentForm_id'];
    $data['departTo_id']=$_REQUEST['departTo_id'];
    $data['id']=$_REQUEST['id'];
    print_r($data);
    $b=$bookObj->UpdateBook($data);
    header('Location: /butt/procurement/pages/book/index.php?msg=edit');
}else{
    $data = $_REQUEST;
    unset($data['edit']);
    $b=$bookObj->InsertBook($data);
    header('Location: /butt/procurement/pages/book/index.php?msg=ok');
}

?>
