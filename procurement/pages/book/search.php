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
    
    <?php 
        // print_r($_POST);
        if(isset($_REQUEST['msg'])){
            if($_REQUEST['msg']=='ok'){
                $mes="บันทึกข้อมูลเรียบร้อย";
                echo "<script type='text/javascript'>toastr.success('" . $mes . "', { timeOut: 100000 })</script>";   
            }
           
        }
    ?>
    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-warning text-white d-grid gap-2 d-md-flex justify-content-md-between">
                <h3>ค้นหาข้อมูล</h3>    
                
            </div>
            <div class="card-body table-responsive">
                <form action="search.php" method="post">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="year" class="form-label">ปีงบประมาณ</label>
                                <select class="form-select " aria-label="Default select example" id="year" name="year" >
                                    <option  value="">ทุกปี</option>
                                    <?php
                                        $years = $bookObj->getYear(); 
                                        foreach($years as $year) {
                                            echo "
                                            <option value='{$year['year']}'>{$year['year']}</option>
                                            ";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="bookNum" class="form-label">เลขที่หนังสือรับเข้า</label>
                                <input type="text" id="bookNum" class="form-control" name="bookNum" value="" >
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="bookName" class="form-label">เรื่อง</label>
                                <input type="text" id="bookName" class="form-control" name="bookName" value="" >
                               
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success text-white " name="search">
                            <i class='bx bx-search'></i> ค้นหา
                        </button>
                    </div>
                </from>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="card shadow">
            <div class="card-header bg-la text-white d-grid gap-2 d-md-flex justify-content-md-between">
                <h3 >ข้อมูลที่ค้นหา</h3>
                <!-- <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        รับหนังสือปกติ
                    </button>
                    <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                       หนังสือรับย้อนหลัง
                    </button>
                    
                </div> -->
                
            </div>
            
            <div class="card-body table-responsive">
                <!-- <h5 class="card-title text-center">วันที่ <?php echo day(date("Y-m-d"));?> เดือน <?php echo monthfull(date("Y-m-d"));?> พ.ศ. <?php echo year(date("Y-m-d"));?></h5> -->
                <table class="table table-hover table-bordered">
                    <thead class="table-warning">
                        <tr class="text-center">
                        <th scope="col" width="7%">วันที่รับ</th>
                        <th scope="col" width="7%">ลำดับทั่วไป</th>
                        <th scope="col" width="15%">เลขที่หนังสือรับ</th>
                        <th scope="col" width="7%">ลงวันที่</th>
                        <th scope="col" width="10%">จาก</th>
                        <th scope="col" width="8%">ถึง</th>
                        <th scope="col">เรื่อง</th>
                        <th scope="col" width="7%">รับเรื่องวันที่</th>
                        <th scope="col" width="5%">แก้ไข</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(isset($_REQUEST['search'])){
                            if($_REQUEST['year']<>""){
                                $s1 = " WHERE year='".$_REQUEST['year']."'";
                                if($_REQUEST['bookNum']<>""){
                                    $s2 = " AND bookNum LIKE '%".$_REQUEST['bookNum']."%'";
                                }else{
                                    $s2="";
                                }
                                if($_REQUEST['bookName']<>""){
                                    $s3 = " AND bookName LIKE '%".$_REQUEST['bookName']."%'";
                                }else{
                                    $s3="";
                                }
                            }else{
                                $s1="";
                                if($_REQUEST['bookNum']<>""){
                                    $s2 = "WHERE bookNum LIKE '%".$_REQUEST['bookNum']."%'";
                                    if($_REQUEST['bookName']<>""){
                                        $s3 = " AND bookName LIKE '%".$_REQUEST['bookName']."%'";
                                    }else{
                                        $s3="";
                                    }
                                }else{
                                    $s2="";
                                    if($_REQUEST['bookName']<>""){
                                        $s3 = " WHERE bookName LIKE '%".$_REQUEST['bookName']."%'";
                                    }else{
                                        $s3="";
                                    }

                                }
                                
                            }
                            
                            $sql="
                                select 
                                    b.id as bid,b.*,df.*,dt.*
                                from 
                                    tb_book AS b
                                    LEFT JOIN tb_departmentf AS df ON b.departmentForm_id = df.id
                                    LEFT JOIN tb_departmentt AS dt ON b.departTo_id = dt.id
                                 
                                    {$s1} {$s2} {$s3}
                                order by
                                    b.bookId
                            ";
                            echo $sql;
                            $data = $bookObj->getBookSearch($sql);
                            // print_r($data);
                            $i=0;
                            foreach($data as $books){
                                $i++;
                                $date_add=datethai($books['date_add']);
                                $booksRegis_date=datethai($books['bookRegis_date']);
                                $booksDate=datethai($books['bookDate']);
                                
                                echo "
                                    <tr>
                                        <td class='text-center'>{$date_add}</td>
                                        <td>{$books['bookId_recive']}</td>
                                        <td>{$books['bookNum']}</td>
                                        <td class='text-center'>{$booksDate}</td>
                                        <td class='text-center'>{$books['dNameF']}</td>
                                        <td class='text-center'>{$books['dNameT']}</td>
                                        <td>{$books['bookName']}</td>
                                        <td class='text-center'>{$booksRegis_date}</td>
                                        <td class='text-center'><a href='edit.php?id={$books['bid']}'>แก้ไข</a></td>
                                    </tr>
                                ";
                            }
                         }
                        ?>
                    </tbody>
                </table>
                
                
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
           
           
        });
        $('#staticBackdrop').on('shown.bs.modal', function () {
            $('#bookNum').focus()
        })
        $('#exampleModal').on('shown.bs.modal', function () {
            $('#date2').focus()
        })
      
    </script>
    
</body>
</html>