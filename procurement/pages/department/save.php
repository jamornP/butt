<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php
use App\Model\Procurement\Department;
$departmentObj = new Department; 


if(isset($_REQUEST['submitF'])){
    print_r($_REQUEST);
    $data['dNameF']=$_REQUEST['dNameF'];
    $save = $departmentObj->InsertDepartmentf($data);
    header('Location: /butt/procurement/pages/department/index.php?msg=ok');
}
if(isset($_REQUEST['submitT'])){
    print_r($_REQUEST);
    $data['dNameT']=$_REQUEST['dNameT'];
    $save = $departmentObj->InsertDepartmentt($data);
    header('Location: /butt/procurement/pages/department/index.php?msg=ok');
}
if(isset($_REQUEST['edit'])){
    print_r($_REQUEST);
    $data['id']=$_REQUEST['id'];
    $data['dname']=$_REQUEST['dname'];
    if($_REQUEST['tb']=='tb_departmentf'){
        $up = $departmentObj->UpdateDepartmentf($data);
        header('Location: /butt/procurement/pages/department/index.php?msg=edit');
    }elseif($_REQUEST['tb']=='tb_departmentt'){
        $up = $departmentObj->UpdateDepartmentt($data);
        header('Location: /butt/procurement/pages/department/index.php?msg=edit');

    }
   
}
// header('Location: /butt/procurement/pages/department/index.php?msg=ok');
?>