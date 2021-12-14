<?php
session_start();
//echo $_SESSION['u'];
$name = '';
$code = '';
require_once("dbhelp.php");
$sql = 'SELECT tenSV, maSV FROM sinhvien WHERE maSV like "%'.$_SESSION['u'].'%"';
$tenSV = executeResult($sql);
if ($tenSV != null && count($tenSV) > 0) {
    $nameSV        = $tenSV[0];
    $name = $nameSV['tenSV'];
    $code = $nameSV['maSV'];
}

// Huyen and Tuoi :))

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống tra cứu điểm thi học kì Trường ĐH Công Nghệ</title>
    <link rel='shortcut icon' href='https://uet.vnu.edu.vn/wp-content/uploads/2017/02/logo2_new.png' />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
		img {
			display: inline;
		}

		ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
			overflow: hidden;
		}

		li a {
			display: inline-block;
			padding: 8px;
			text-decoration: none;
			color: #FFFFFFBF;
			float: right;
		}

		a:hover {
			text-decoration: none;
			color: white;
		}

		h2 {
			margin-top: 40px;
		}

		h1 {
			font-size: 32px;
			margin-bottom: 40px;
		}
	</style>
</head>
<body style="background-color: rgb(214, 231, 247)">
    <div class="container">
        <div class="panel panel-primary">
        <div class="panel-heading">
				<div class="header" style="background-color: #46A5E5">
					<ul>
                        <li><a href="index.php" class='fas'>&#xf2f5;Log out</a></li>
                        <li><a href="change.php" class='fas'>&#xf0ad; Change password</a></li>
                        <li>
                            <a href="" class='fas'>&#xf2bd;
                                <?php 
                                    echo $name; echo "["; echo $code; echo "]";
                                ?>
                            </a>
                        </li>
						<li><a href="https://mail.vnu.edu.vn/" class='fas'>&#xf2b6; Email</a></li>
						<li><a href="https://uet.vnu.edu.vn/" class='fas'>&#xf549; UET</a></li>
						<img src="https://uet.vnu.edu.vn/wp-content/uploads/2017/02/logo2_new.png" alt="Trường Đại học Công nghệ, ĐHQGHN - VNU- University of Engineering and Technology">
					</ul>
				</div>
				<h2 class="text-center">Hệ thống tra cứu điểm thi học kỳ</h2>
				<h1 class="text-center">Trường ĐH Công Nghệ</h1>
                <form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 20px; margin-bottom: 20px;" placeholder="Nhập mã môn học">
                </form>
			</div>
            <div class="panel-body">
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Tên môn học</th>
                              <th>Mã môn học</th>
                              <th>Điểm chuyên cần</th>
                              <th>Điểm giữa kì</th>
                              <th>Điểm cuối kì</th>
                              <th>Tổng kết</th>
                          </tr>
                      </thead>
                      <tbody>
    <?php

    if (isset($_GET['s']) && $_GET['s'] != '') {
        $sql = 'SELECT mh.tenMH, mh.maMH, d.diemCC, d.diemGK, d.diemCK, dtk.diemTK
                FROM diem d join sinhvien sv on d.maSV = sv.maSV 
                join monhoc mh on d.maMH = mh.maMH
                join diemtongket dtk on dtk.maBD = d.maBD
                WHERE d.maMH like "%'.$_GET['s'].'%" and d.maSV like "%'.$_SESSION['u'].'%"
                ORDER BY d.maSV';
    } else {
        $sql = 'SELECT mh.tenMH, mh.maMH, d.diemCC, d.diemGK, d.diemCK, dtk.diemTK
                FROM diem d join sinhvien sv on d.maSV = sv.maSV 
                join monhoc mh on d.maMH = mh.maMH
                join diemtongket dtk on dtk.maBD = d.maBD
                WHERE d.maSV like "%'.$_SESSION['u'].'%"
                ORDER BY d.maSV';
    }

    $studentList = executeResult($sql);

    foreach($studentList as $std) {
        echo '<tr>
            <td>'.$std["tenMH"].'</td>
            <td>'.$std["maMH"].'</td>
            <td>'.$std["diemCC"].'</td>
            <td>'.$std["diemGK"].'</td>
            <td>'.$std["diemCK"].'</td>
            <td>'.$std["diemTK"].'</td>
        </tr>';
    }
    ?>
                      </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>



</html>