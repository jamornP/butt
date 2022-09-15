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
                <div>
                    <a href="/butt/procurement/pages/book/form.php" class="btn btn-primary">รับหนังสือปกติ</a>
                    <a href="" class="btn btn-warning text-white">รับหนังสือย้อนหลัง</a>
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
                        <th scope="col">หมายเหตุ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i=1;$i<20;$i++){?>
                        <tr>
                        <td scope="col"><?php echo date("d-m-Y");?></td>

                            <td scope="col"><?php echo $i;?></td>
                            <td scope="col"><?php echo "709(4)-".date("d-m-Y");?></td>
                            <td scope="col"><?php echo date("d-m-Y");?></td>
                            <td scope="col">งาน OSM</td>
                            <td scope="col">พัสดุ</td>
                            <td scope="col">เรื่อง การปรับแผน</td>
                            <td scope="col"><?php echo date("d-m-Y");?>บ</td>
                            <td scope="col">หมายเหตุ</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</body>
</html>