<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/butt/function/function.php";?>
<?php
use App\Model\Procurement\Book;
 $bookObj = new Book;   
use App\Model\Procurement\Department;
 $departmentObj = new Department;   
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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        รับหนังสือปกติ
                    </button>
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                       หนังสือรับย้อนหลัง
                    </button>
                    <!-- <a href="/butt/procurement/pages/book/form.php" class="btn btn-primary">รับหนังสือปกติ</a> -->
                    <!-- <a href="/butt/procurement/pages/book/form2.php" class="btn btn-warning text-white">รับหนังสือย้อนหลัง</a> -->
                </div>
                
            </div>
            
            <div class="card-body">
                <h5 class="card-title text-center">วันที่ <?php echo day(date("Y-m-d"));?> เดือน <?php echo monthfull(date("Y-m-d"));?> พ.ศ. <?php echo year(date("Y-m-d"));?></h5>
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
                <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    พิมพ์รายงาน
                </button>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <form action="save.php" method="get">
            <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">หนังสือรับ วันที่ <?php echo day(date("Y-m-d"));?> เดือน <?php echo monthfull(date("Y-m-d"));?> พ.ศ. <?php echo year(date("Y-m-d"));?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="save.php" method="post">
                    
                    
                    <p class="mt-3"><b></b></p>
                    <!-- <hr> -->
                    <div class="row">
                        <?php

                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="bookDate" class="form-label">วันที่</label>
                                <input type="text" id="book_add" class="form-control" name="date_add" value="<?php echo date("Y-m-d");?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <?php
                                $bookId = $bookObj->getBookId();
                                $bookId_recive = bookId_recive($bookId);
                                ?>
                                <label for="bookId_recive" class="form-label">เลขทั่วไป <?php //print_r($bookId);?></label>
                                <input type="text" id="bookId_recive" class="form-control" name="bookId_recive" value="<?php echo $bookId_recive;?>" readonly>
                                <input type="hidden" id="bookId" class="form-control" name="bookId" value="<?php echo $bookId;?>" readonly>
                                <input type="hidden" id="bookId_num" class="form-control" name="bookId_num" value="0" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="bookNum" class="form-label">เลขหนังสือรับ</label>
                                <input type="text" id="bookNum" class="form-control" name="bookNum"  autocomplete="off" required  autofocus>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="bookDate" class="form-label">วันที่ในหนังสือ</label>
                                <input type="text" id="bookDate" class="form-control" name="bookDate" value="<?php echo date("Y-m-d");?>">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="departmentForm_id"class="form-label">จาก</label>
                                <select class="form-select" aria-label="Default select example" id="departmentForm_id" name="departmentForm_id" required>
                                    <option  value="">เลือก</option>
                                    <?php

                                        $positions = $departmentObj ->getDepartmentF(); 
                                        foreach($positions as $position) {
                                            // $selected =($position['id']==$_SESSION['p_id']) ? 
                                            // "selected" : "disabled";
                                            echo "
                                            <option value='{$position['id']}'>{$position['dNameF']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="departmentTo_id"class="form-label">ถึง</label>
                                <select class="form-select" aria-label="Default select example" id="departTo_id" name="departTo_id" required>
                                    <option value="">เลือก</option>
                                    <?php
                                         $positions = $departmentObj ->getDepartmentT(); 
                                         foreach($positions as $position) {
                                             // $selected =($position['id']==$_SESSION['p_id']) ? 
                                             // "selected" : "disabled";
                                             echo "
                                             <option value='{$position['id']}'>{$position['dNameT']}</option>
                                             ";
                                         }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="bookName" class="form-label">เรื่อง</label>
                                <input type="text" id="bookName" class="form-control" name="bookName"  required>
                            </div>
                        </div>
                    </div>
                    <br>
                    
                    
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button class="btn btn-success text-white" type="submit">บันทึก</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    <!-- Modal หนังสือย้อนหลัง -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="form.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">หนังสือรับย้อนหลัง</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="date2" class="form-label">วันที่รับ</label>
                                    <input type="text" id="date2" class="form-control" name="date2" value="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">ต่อไป</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Print -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="report.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal2Label">พิมพ์รายงาน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="dateprint" class="form-label">วันที่ต้องการพิมพ์รายงาน</label>
                                    <input type="text" id="dateprint" class="form-control" name="dateprint" value="<?php echo date("y-m-d");?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">ต่อไป</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $("#bookDate").datepicker({
                language:'th-en',
                format: 'yyyy-mm-dd',
                autoclose: true
            });
           
            $("#date2").datepicker({
                language:'th-en',
                format: 'yyyy-mm-dd',
                autoclose: true
            });
            $("#dateprint").datepicker({
                language:'th-en',
                format: 'yyyy-mm-dd',
                autoclose: true
            });
           
        });
        $('#staticBackdrop').on('shown.bs.modal', function () {
            $('#bookNum').focus()
        })
    </script>
</body>
</html>