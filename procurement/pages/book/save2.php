<?php //print_r($_REQUEST);?>
<?php require $_SERVER['DOCUMENT_ROOT']."/butt/vendor/autoload.php";?>
<?php require $_SERVER['DOCUMENT_ROOT']."/butt/procurement/pages/auth/auth.php";?>
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
    <?php
    if(isset($_POST['submit'])){
      $year = yearterm($_POST['dateprint']);
      echo $_POST['dateprint']."<br>";
      echo "ปีงบประมาณ ".$year; 
    }
    ?>
    <div class="container">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button type="button" class="btn btn-success text-white " data-bs-toggle="modal" data-bs-target="#exampleModal2">
              พิมพ์รายงาน
          </button>
      </div>
    
    </div>
    
    <!-- Modal Print -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
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
                        <button type="submit" name="submit" class="btn btn-primary">ต่อไป</button>
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