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
<body class="font-prompt vh-100 d-flex justify-content-center align-items-center">
    <div class="card mb-3">
		<div class="card-header bg-primary text-white">
			<h4>เข้าสู่ระบบ</h4>
		</div>
		<div class="card-body">
			<form action="checkLogin.php" class="mb-3" method="POST">
				<?php
					if($_GET['msg']) {
						echo "<h5 class='my-3 text-danger'>Password ไม่ถูกต้อง กรุณาลองอีกครั้ง</h5>";
					}
				?>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control" required>
				</div>
                <div class="text-end">
				    <button type="submit" class="btn btn-primary mt-4">Login</button>
                </div>
			</form>
			<!-- <a href="register.php">สมัครใช้งานใหม่</a> -->
		</div>
	</div>
</body>
</html>