<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php
use App\Model\Procurement\Book;
$bookObj = new Book; 
print_r($_REQUEST);
$b=$bookObj->InsertBook($_REQUEST);
header('Location: /butt/procurement/pages/book/index.php?msg=ok');
?>
