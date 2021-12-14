<?php
require_once ('dbhelp.php');

$s_id = $s_maGV = $s_tenGV = $s_diaChi = $s_sdt = $s_email = '';

if (isset($_GET['id'])) {
	$s_maGV          = $_GET['id'];
    $sql = "SELECT *
            FROM giangvien
            WHERE maGV = '$s_maGV'";
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
        $s_id = $std['id'];
		$s_maGV = $std['maGV'];
		$s_tenGV     = $std['tenGV'];
		$s_diaChi  = $std['diaChi'];
        $s_sdt  = $std['sdt'];
		$s_email  = $std['email'];
	} else {
		$s_maGV = '';
	}
}
// var_dump(isset($_GET['id']));
// var_dump($s_id);

if(!empty($_POST)) {
    if(isset($_POST['id'])) {
        $s_id = $_POST['id'];
    }

    if(isset($_POST['maGV'])) {
        $s_maGV = $_POST['maGV'];
    }

    if(isset($_POST['tenGV'])) {
        $s_tenGV = $_POST['tenGV'];
    }

    if(isset($_POST['diaChi'])) {
        $s_diaChi = $_POST['diaChi'];
    }

    if(isset($_POST['sdt'])) {
        $s_sdt = $_POST['sdt'];
    }

    if(isset($_POST['email'])) {
        $s_email = $_POST['email'];
    }

    $s_maGV = str_replace('\'', '\\\'', $s_maGV);
    $s_tenGV = str_replace('\'', '\\\'', $s_tenGV);
    $s_diaChi = str_replace('\'', '\\\'', $s_diaChi);
    $s_sdt = str_replace('\'', '\\\'', $s_sdt);
    $s_email = str_replace('\'', '\\\'', $s_email);

    if ($s_id != '') {
		//update
        $sql = "update giangvien set tenGV = '$s_tenGV', diaChi = '$s_diaChi', sdt = '$s_sdt', email = '$s_email' where maGV= '$s_maGV'";
        // echo $sql;
	} else {
		//insert
        $t = substr($s_maGV, 2);
        $s_id = (int) $t;
        // echo $s_id;
        $pww = md5($s_maGV);
        $sql = "INSERT INTO taikhoan(username, password, role) VALUES ('$s_maGV', '$pww', 1)";
        execute($sql);
        $sql = "INSERT INTO giangvien(id, maGV, tenGV, diaChi, sdt, email) VALUES ('$s_id','$s_maGV','$s_tenGV','$s_diaChi','$s_sdt','$s_email')";
	}

    // var_dump($s_maGV);
    // echo $sql;
    // var_dump($s_id);
    execute($sql);

    header('Location: quanLyGV.php');
	die();
}

// var_dump(empty($_POST));


?>


<!DOCTYPE html>
<html>
<head>
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
						<li><a href="https://mail.vnu.edu.vn/" class='fas'>&#xf2b6; Email</a></li>
						<li><a href="https://uet.vnu.edu.vn/" class='fas'>&#xf549; UET</a></li>
                        <li><a href="QTV.php" class='fas'>&#xf015;</a></li>
						<img src="https://uet.vnu.edu.vn/wp-content/uploads/2017/02/logo2_new.png" alt="Trường Đại học Công nghệ, ĐHQGHN - VNU- University of Engineering and Technology">
					</ul>
				</div>
				<h2 class="text-center">Cập nhật thông tin giảng viên</h2>
			</div>
			<div class="panel-body">
                <form method="post">
                    <div class="form-group" style="display: none;">
                        <!-- <input type="text" name="maBD" value="" style="display: none;"> -->
                        <input type="text" class="form-control" id="id" name="id" value="<?=$s_id?>">
                    </div>
                    <div class="form-group">
                         <label for="maGV">Mã giảng viên:</label>
                         <input required="true" type="text" class="form-control" id="maGV" name="maGV" value="<?=$s_maGV?>">
                    </div>
                    <div class="form-group">
                        <label for="tenGV">Tên giảng viên:</label>
                        <input required="true" type="text" class="form-control" id="tenGV" name="tenGV" value="<?=$s_tenGV?>">
                    </div>
                    <div class="form-group">
                        <label for="diaChi">Địa chỉ:</label>
                        <input required="true" type="text" class="form-control" id="diaChi" name="diaChi" value="<?=$s_diaChi?>">
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số điện thoại:</label>
                        <input type="text" class="form-control" id="sdt" name="sdt" value="<?=$s_sdt?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input required="true" type="text" class="form-control" id="email" name="email" value="<?=$s_email?>">
                    </div>
                    <button class="btn btn-success">Save</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>