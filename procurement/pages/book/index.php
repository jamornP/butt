<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/butt/function/function.php";?>
<?php
use App\Model\Procurement\Book;
 $bookObj = new Book;   
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบหนังสือรับ</title>
    <?php require $_SERVER['DOCUMENT_ROOT']."/butt/component/link/link_procurement.php";?>
</head>
<body class="font-prompt">
    <?php require $_SERVER['DOCUMENT_ROOT']."/butt/component/navbar/navbar_procurement.php";?>
    <div class="container-fluid mt-5">
        <div class="card shadow">
            <div class="card-header bg-la text-white d-grid gap-2 d-md-flex justify-content-md-between">
                <h3 >ทะเบียน รับหนังสือ </h3>
                <div>
                    <a href="/butt/procurement/pages/book/form.php" class="btn btn-primary">รับหนังสือปกติ</a>
                    <a href="/butt/procurement/pages/book/form2.php" class="btn btn-warning text-white">รับหนังสือย้อนหลัง</a>
                </div>
                
            </div>
            
            <div class="card-body">
                <h5 class="card-title">วันที่ <?php echo day(date("Y-m-d"));?> เดือน <?php echo monthfull(date("Y-m-d"));?> พ.ศ. <?php echo year(date("Y-m-d"));?></h5>
                <table class="table table-hover">
                    <thead class="bg-main">
                        <tr>
                        <th scope="col">วันที่รับ</th>
                        <th scope="col">ลำดับทั่วไป</th>
                        <th scope="col">เลขที่หนังสือรับ</th>
                        <th scope="col">ลงวันที่</th>
                        <th scope="col">จาก</th>
                        <th scope="col">ถึง</th>
                        <th scope="col">เรื่อง</th>
                        <th scope="col">รับเรื่องวันที่</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $data = $bookObj->getBookByDate(date("Y-m-d"));
                        foreach($data as $book){
                            $date_add=datethai($book['date_add']);
                            $bookRegis_date=datethai($book['bookRegis_date']);
                            $bookDate=datethai($book['bookDate']);
                            echo "
                                <tr>
                                    <td>{$date_add}</td>
                                    <td>{$book['bookId_recive']}</td>
                                    <td>{$book['bookNum']}</td>
                                    <td>{$bookDate}</td>
                                    <td>{$book['departmentForm_id']}</td>
                                    <td>{$book['departTo_id']}</td>
                                    <td>{$book['bookName']}</td>
                                    <td>{$bookRegis_date}</td>
                            
                                </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</body>
</html>