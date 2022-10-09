<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบหนังสือรับ</title>
    <link rel="stylesheet" href="../../theme/css/bootstrap-theme.css">
<link rel="stylesheet" href="/butt/theme/css/style_procurement.css">
<link rel="stylesheet" href="/butt/inc/datepicker/css/datepicker.css">
<!-- Toastr -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
<!-- select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<!-- icon -->
<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


    
</head>
<body class="font-prompt">
    <?php //require $_SERVER['DOCUMENT_ROOT']."/butt/component/navbar/navbar_procurement.php";?>
    
    <?php 
        if(isset($_REQUEST['msg'])){
            if($_REQUEST['msg']=='ok'){
                $mes="บันทึกข้อมูลเรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 100000 })</script>";   
            }
            if($_REQUEST['msg']=='edit'){
                $mes="แก้ไขข้อมูลเรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 100000 })</script>";   
            }
           
        }
    ?>
    <div class="container-fluid mt-5">
        <div class="card shadow">
            <div class="card-header bg-la text-white d-grid gap-2 d-md-flex justify-content-md-between">
                <h3 >ทะเบียน รับหนังสือ <?php echo "ปีงบประมาณ ".yearterm(date("Y-m-d"));?></h3>
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
            
            <div class="card-body table-responsive">
                <h5 class="card-title text-center">วันที่ <?php echo day(date("Y-m-d"));?> เดือน <?php echo monthfull(date("Y-m-d"));?> พ.ศ. <?php echo year(date("Y-m-d"));?></h5>
                <table class="table table-hover table-bordered">
                    <thead class="table-warning">
                        <tr class="text-center">
                        <th scope="col" width="7%">วันที่รับ</th>
                        <th scope="col" width="7%">ลำดับทั่วไป</th>
                        <th scope="col" width="10%">เลขที่หนังสือรับ</th>
                        <th scope="col" width="7%">ลงวันที่</th>
                        <th scope="col" width="10%">จาก</th>
                        <th scope="col" width="8%">ถึง</th>
                        <th scope="col">เรื่อง</th>
                        <th scope="col" width="7%">รับเรื่องวันที่</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-success text-white " data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        พิมพ์รายงาน
                    </button>
                </div>
                
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
                        <!-- <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="bookDate" class="form-label">วันที่</label>
                                <input type="hidden" id="book_add" class="form-control" name="date_add" value="<?php echo date("Y-m-d");?>" readonly>
                            </div>
                        </div> -->
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="year" class="form-label">ปีงบประมาณ</label>
                                <input type="text" id="year" class="form-control" name="year" value="<?php echo yearterm(date("Y-m-d"));?>" readonly>
                                <input type="hidden" id="book_add" class="form-control" name="date_add" value="<?php echo date("Y-m-d");?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                               
                                <label for="bookId_recive" class="form-label">เลขทั่วไป <?php //print_r($bookId);?></label>
                                <input type="text" id="bookId_recive" class="form-control" name="bookId_recive" value="<?php echo $bookId_recive;?>" readonly>
                                <input type="hidden" id="bookId" class="form-control" name="bookId" value="<?php echo $bookId;?>" readonly>
                                <input type="hidden" id="bookId_num" class="form-control" name="bookId_num" value="0" readonly>
                                <input type="hidden" id="bookRegis_date" class="form-control" name="bookRegis_date" value="<?php echo date('Y-m-d');?>" readonly>
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
                                <select class="form-select " aria-label="Default select example" id="departmentForm_id" name="departmentForm_id" required>
                                    <option  value="">เลือก</option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="departmentTo_id"class="form-label">ถึง</label>
                                <select class="form-select" aria-label="Default select example" id="departTo_id" name="departTo_id" required>
                                    <option value="">เลือก</option>
                                    
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
                                    <label for="date2" class="form-label">วันที่รับย้อนหลัง</label>
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
                                    <input type="text" id="dateprint" class="form-control" name="dateprint" value="<?php echo date("Y-m-d");?>" autocomplete="off">
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
    <!-- <script src='/inc/lib/jquery/dist/jquery.min.js'></script> -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src='/butt/inc/datepicker/js/bootstrap-datepicker.js'></script>
<script src='/butt/inc/datepicker/js/bootstrap-datepicker-thai.js'></script>
<script src='/butt/inc/datepicker/js/locales/bootstrap-datepicker.th.js'></script>
 <!-- Toastr -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
 <!-- select2 -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    // Command: toastr["success"]("ข้อความ")

    //ตัวนี้จะเอาไว้ set ค่าต่างๆ toastr
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>
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
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#date2').focus()
        })
        $('#exampleModal2').on('shown.bs.modal', function () {
            $('#dateprint').focus()
        })
    </script>
    
</body>
</html>