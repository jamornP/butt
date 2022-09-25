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

                    <div class="container mt-2">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                            เพิ่ม
                            </button>
                        </div>
                        <table class="table table-hover table-bordered mt-2">
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
                    <div class="container mt-2">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                            เพิ่ม
                            </button>
                        </div>
                        <table class="table table-hover table-bordered mt-2">
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
    

    <!-- Modal form -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <form action="save.php" method="get">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">หน่วยงานที่ส่งหนังสือ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="dNameF" class="form-label">ชื่อหน่วยงานที่ส่งหนังสือ</label>
                                <input type="text" id="dNameF" class="form-control" name="dNameF"  autocomplete="off" required  autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" name="submitF" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

    <!-- Modal to-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <form action="save.php" method="get">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">หน่วยงานที่รับหนังสือ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button"  name="submitT" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
         $('#exampleModal1').on('shown.bs.modal', function () {
            $('#dNameF').focus()
        })
         $('#exampleModal2').on('shown.bs.modal', function () {
            $('#dNameT').focus()
        })
    </script>
</body>
</html>