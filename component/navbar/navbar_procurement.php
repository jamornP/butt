<?php 
session_start(); 
date_default_timezone_set('Asia/Bangkok');
?>
<nav class="navbar navbar-dark navbar-expand-lg bg-l">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ระบบรับหนังสือสำนักงานพัสดุ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <!-- <a class="nav-link active" aria-current="page" href="/butt/procurement/pages/book/index.php">หน้าหลัก</a> -->
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <li class="nav-item dropdown">
          <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            รับหนังสือ
          </a> -->
          <ul class="dropdown-menu">
            <!-- <li><a class="dropdown-item" href="/butt/procurement/pages/book/form.php">รับหนังสือปกติ</a></li>
            <li><a class="dropdown-item" href="/butt/procurement/pages/book/form2.php">รับหนังสือย้อนหลัง</a></li> -->
            <!-- <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> -->
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li> -->
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
      <div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <?php
          if($_SESSION['login']){
          $name=$_SESSION['fullname'];
          echo "
            <li class='nav-item dropdown ml-auto '>
              <a class='nav-link dropdown-toggle active' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                {$name}
              </a>
              <div class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                <a class='dropdown-item' href='/butt/procurement/pages/auth/logout.php'>ออกจากระบบ</a>
              </div>
            </li>
          ";
        }else {
          echo "
            <li class='nav-item '>
              <a href='/butt/procurement/pages/auth/index.php'class='nav-link active'>เข้าสู่ระบบ</a>
            </li>
          ";
        }
        ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php
if($_SESSION['login']){
?>
<ul class="nav bg-white">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/butt/procurement/pages/book"><i class='bx bx-home-alt'></i> หน้าหลัก</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/butt/procurement/pages/book/search.php"><i class='bx bx-search-alt-2' ></i> ค้นหาข้อมูล</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/butt/procurement/pages/department"><i class='bx bxs-contact' ></i> เพิ่มข้อมูลส่วนงาน</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li> -->
</ul>
<?php
}
?>