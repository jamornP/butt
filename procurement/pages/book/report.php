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
    <div class="container-fluid mt-5">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title text-center">ทะเบียนหนังสือรับ วันที่ <?php echo day($_REQUEST['dateprint']);?> เดือน <?php echo monthfull($_REQUEST['dateprint']);?> พ.ศ. <?php echo year($_REQUEST['dateprint']);?></h5>
                <table class="table table-hover">
                    <thead class="bg-main">
                        <tr class='fs-14'>
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
                        $data = $bookObj->getBookByDate($_REQUEST['dateprint']);
                        foreach($data as $book){
                            $date_add=datethai($book['date_add']);
                            $bookRegis_date=datethai($book['bookRegis_date']);
                            $bookDate=datethai($book['bookDate']);
                            echo "
                                <tr class='fs-14'>
                                    <td>{$date_add}</td>
                                    <td>{$book['bookId_recive']}</td>
                                    <td>{$book['bookNum']}</td>
                                    <td>{$bookDate}</td>
                                    <td>{$book['dNameF']}</td>
                                    <td>{$book['dNameT']}</td>
                                    <td>{$book['bookName']}</td>
                                    <td>{$bookRegis_date}</td>
                                </tr>
                            ";
                        }
                        ?>
                    </tbody>
                </table>
                <!-- <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    พิมพ์รายงาน
                </button> -->
            </div>
        </div>
    </div>

</body>
</html>