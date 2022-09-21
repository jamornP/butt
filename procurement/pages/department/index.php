<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/butt/function/function.php";?>
<?php
    // use App\Model\Procurement\Book;
    // $bookObj = new Book;   
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
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <h5 class="card-header bg-la text-white">ข้อมูลหน่วยงานที่ส่งหนังสือ</h5>
                    <div class="container mt-4">
                        <table class="table table-hover table-bordered">
                            <thead class="table-warning">
                                <tr class="">
                                    <th scope="col" class='text-center'>#</th>
                                    <th scope="col">ชื่อหน่วยงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data = $departmentObj->getDepartmentF();
                                $i=0;
                                foreach($data as $department){
                                    $i++;
                                    echo "
                                        <tr>
                                            <td class='text-center'>{$i}</td>
                                            <td>{$department['dNameF']}</td>
                                        </tr>
                                    ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow">
                    <h5 class="card-header bg-primary text-white">ข้อมูลหน่วยงานรับหนังสือ</h5>
                    <div class="container mt-4">
                        <table class="table table-hover table-bordered">
                            <thead class="table-warning">
                                <tr class="">
                                    <th scope="col">#</th>
                                    <th scope="col">ชื่อหน่วยงาน</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $data = $departmentObj->getDepartmentT();
                                $i=0;
                                foreach($data as $department){
                                    $i++;
                                    echo "
                                        <tr>
                                            <td class='text-center'>{$i}</td>
                                            <td>{$department['dNameT']}</td>
                                        </tr>
                                    ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>