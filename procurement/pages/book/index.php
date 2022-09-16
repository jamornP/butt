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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        รับหนังสือปกติ
                    </button>
                    <!-- <a href="/butt/procurement/pages/book/form.php" class="btn btn-primary">รับหนังสือปกติ</a> -->
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
                <form action="save.php" method="get">
                    
                    
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
                                    <option  value="1">1</option>

                                    <?php
                                        // $positionObj = new Position;
                                        // $positions = $positionObj->getAllPosition(); 
                                        // foreach($positions as $position) {
                                        //     $selected =($position['id']==$_SESSION['p_id']) ? 
                                        //     "selected" : "disabled";
                                        //     echo "
                                        //     <option value='{$position['id']}' {$selected} >{$position['name']}</option>
                                        //     ";
                                        // }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="departmentTo_id"class="form-label">ถึง</label>
                                <select class="form-select" aria-label="Default select example" id="departTo_id" name="departTo_id" required>
                                    <option value="">เลือก</option>
                                    <option value="1">1</option>
                                    <?php
                                        // $departmentObj = new Department;
                                        // $departments = $departmentObj->getAlldepartment(); 
                                        // foreach($departments as $department) {
                                        //     $selected =($department['id']==$_SESSION['d_id']) ? 
                                        //     "selected" : "disabled";
                                        //     echo "
                                        //     <option value='{$department['id']}' {$selected} >{$department['name']}</option>
                                        //     ";
                                        // }
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
    <script>
        $(function(){
            $("#bookDate").datepicker({
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