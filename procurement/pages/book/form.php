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
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-la text-white d-grid gap-2 d-md-flex justify-content-md-between">
                <h3 >ทะเบียน รับหนังสือ(ย้อนหลัง) </h3>
               
            </div>
            
            <div class="card-body">
                <h5 class="card-title"></h5>
                <form action="save.php" method="get">
                    
                    
                    <p class="mt-3"><b>หนังสือรับย้อนหลัง วันที่ <?php echo day($_REQUEST['date2']);?> เดือน <?php echo monthfull($_REQUEST['date2']);?> พ.ศ. <?php echo year($_REQUEST['date2']);?></b></p>
                    <hr>
                    <div class="row">
                        <?php

                        ?>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="bookDate" class="form-label">วันที่</label>
                                <input type="text" id="book_add" class="form-control" name="date_add" value="<?php echo $_REQUEST['date2'];?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <?php
                                    $year=yearterm(date("Y-m-d"));
                                    $date['date_add']=$_REQUEST['date2'];
                                    $date['year']=$year;
                                    $databook = $bookObj->getBookIdByDate($date);
                                    $bookId = $databook['bookId'];
                                    $bookId_num = $databook['bookId_num'];
                                    $bookId_recive = bookId_recive($bookId).".".bookId_reciveRe($bookId_num);
                                ?>
                                <label for="bookId_recive" class="form-label">เลขทั่วไป <?php //print_r($databook);?></label>
                                <input type="text" id="bookId_recive" class="form-control" name="bookId_recive" value="<?php echo $bookId_recive;?>" readonly>
                                <input type="text" id="bookId" class="form-control" name="bookId" value="<?php echo $bookId;?>" readonly>
                                <input type="text" id="bookId_num" class="form-control" name="bookId_num" value="<?php echo $bookId_num;?>" readonly>
                                <input type="text" id="year" class="form-control" name="year" value="<?php echo yearterm(date("Y-m-d"));?>" readonly>
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
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
                        <div class="col-sm-12 col-md-6 col-lg-3">
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
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="form-group">
                                <label for="bookName" class="form-label">เรื่อง</label>
                                <input type="text" id="bookName" class="form-control" name="bookName"  required>
                            </div>
                        </div>
                    </div>
                        
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
                        <button class="btn btn-success text-white" type="submit">บันทึก</button>
                        <a href="/butt/procurement/pages/book" class="btn btn-warning text-white">ย้อนกลับ</a>
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
           
        });
    </script>
</body>
</html>