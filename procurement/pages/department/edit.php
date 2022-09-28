<?php
//  echo $_REQUEST['id'];
 ?>
 <?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/butt/function/function.php";?>
<?php
    // use App\Model\Procurement\Book;
    // $bookObj = new Book;   
    use App\Model\Procurement\Department;
    $departmentObj = new Department; 
    if($_REQUEST['tb']=='f'){
        $data = $departmentObj->getDepartmentById($_REQUEST['id'],"tb_departmentf");
        $name['dname']=$data['dNameF'];  
        $name['id']=$data['id'];  
        $name['tb']="tb_departmentf";  
    }else if($_REQUEST['tb']=='t'){
        $data = $departmentObj->getDepartmentById($_REQUEST['id'],"tb_departmentt"); 
        $name['dname']=$data['dNameT'];  
        $name['id']=$data['id']; 
        $name['tb']="tb_departmentt"; 
    }
     
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
<div class="container mt-4">
    <div class="card">
        <h5 class="card-header">แก้ไขข้อมูล</h5>
        <div class="card-body">
            <form action="save.php" method="get">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="dNameF" class="form-label">ชื่อหน่วยงาน</label>
                                <input type="text" id="dNameF" class="form-control" name="dname"  value="<?php echo $name['dname'];?>" autocomplete="off" required  autofocus>
                                <input type="hidden" id="dNameF" class="form-control" name="id"  value="<?php echo $name['id'];?>" autocomplete="off" required  autofocus>
                                <input type="hidden" id="dNameF" class="form-control" name="tb"  value="<?php echo $name['tb'];?>" autocomplete="off" required  autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit" class="btn btn-primary">บันทึก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
        
</body>
</html>