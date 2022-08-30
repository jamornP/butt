<?php require $_SERVER['DOCUMENT_ROOT']."/butt/function/function.php";?>
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
                <h3 >ทะเบียน รับหนังสือ </h3>
                <!-- <div>
                    <a href="" class="btn btn-primary">รับหนังสือปกติ</a>
                    <a href="" class="btn btn-warning text-white">รับหนังสือย้อนหลัง</a>
                </div> -->
                
            </div>
            
            <div class="card-body">
                <h5 class="card-title">วันที่ <?php echo day(date("Y-m-d"));?> เดือน <?php echo monthfull(date("Y-m-d"));?> พ.ศ. <?php echo year(date("Y-m-d"));?></h5>
                
               
            </div>
        </div>
    </div>
</body>
</html>