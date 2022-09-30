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
                <table class="table table-hover table-bordered table-responsive">
                    <thead class="table-warning">
                        <tr class='fs-14 text-center'>
                            <th scope="col" width="3%">#</th>
                            <th scope="col" width="7%">วันที่รับ</th>
                            <th scope="col" width="7%">ลำดับทั่วไป</th>
                            <th scope="col" width="10%">เลขที่หนังสือรับ</th>
                            <th scope="col" width="7%">ลงวันที่</th>
                            <th scope="col" width="10%">จาก</th>
                            <th scope="col" width="8%">ถึง</th>
                            <th scope="col">เรื่อง</th>
                            <th scope="col" width="7%">เรื่องวันที่</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                         $date['bookRegis_date']=$_REQUEST['dateprint'];
                         $date['year']=yearterm(date("Y-m-d"));
                        $data = $bookObj->getBookByDate($date);
                        $i=0;
                        foreach($data as $book){
                            $i++;
                            $date_add=datethai($book['date_add']);
                            $bookRegis_date=datethai($book['bookRegis_date']);
                            $bookDate=datethai($book['bookDate']);
                            echo "
                                <tr class='fs-14'>
                                    <td class='text-center'>{$i}</td>
                                    <td class='text-center'>{$bookRegis_date}</td>
                                    <td>{$book['bookId_recive']}</td>
                                    <td>{$book['bookNum']}</td>
                                    <td class='text-center'>{$bookDate}</td>
                                    <td class='text-center'>{$book['dNameF']}</td>
                                    <td class='text-center'>{$book['dNameT']}</td>
                                    <td>{$book['bookName']}</td>
                                    
                                    <td class='text-center'>{$date_add}</td>
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