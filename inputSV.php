<?php
require_once ('dbhelp.php');

$s_id = $s_maSV = $s_tenSV = $s_diaChi = $s_sdt = $s_email = $s_maLop = '';

if (isset($_GET['id'])) {
	$s_maSV          = $_GET['id'];
    $sql = "SELECT *
            FROM sinhvien
            WHERE maSV = '$s_maSV'";
	$studentList = executeResult($sql);
	if ($studentList != null && count($studentList) > 0) {
		$std        = $studentList[0];
        $s_id = $std['id'];
		$s_maSV = $std['maSV'];
		$s_tenSV     = $std['tenSV'];
		$s_diaChi  = $std['diaChi'];
        $s_sdt  = $std['sdt'];
		$s_email  = $std['email'];
        $s_maLop  = $std['maLop'];
	} else {
		$s_maSV = '';
	}
}
// var_dump(isset($_GET['id']));
// var_dump($s_id);

if(!empty($_POST)) {
    if(isset($_POST['id'])) {
        $s_id = $_POST['id'];
    }

    if(isset($_POST['maSV'])) {
        $s_maSV = $_POST['maSV'];
    }

    if(isset($_POST['tenSV'])) {
        $s_tenSV = $_POST['tenSV'];
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

    if(isset($_POST['maLop'])) {
        $s_maLop = $_POST['maLop'];
    }

    $s_maSV = str_replace('\'', '\\\'', $s_maSV);
    $s_tenSV = str_replace('\'', '\\\'', $s_tenSV);
    $s_diaChi = str_replace('\'', '\\\'', $s_diaChi);
    $s_sdt = str_replace('\'', '\\\'', $s_sdt);
    $s_email = str_replace('\'', '\\\'', $s_email);
    $s_maLop = str_replace('\'', '\\\'', $s_maLop);

    if ($s_id != '') {
		//update
        $sql = "update sinhvien set tenSV = '$s_tenSV', diaChi = '$s_diaChi', sdt = '$s_sdt', email = '$s_email' where maSV= '$s_maSV'";
        // echo $sql;
	} else {
		//insert
        $s_id = (int) $s_maSV;
        // echo $s_id;
        $pww = md5($s_maSV);
        $sql = "INSERT INTO taikhoan(username, password, role) VALUES ('$s_maSV', '$pww', 2)";
        execute($sql);
        $sql = "INSERT INTO sinhvien(id, maSV, tenSV, diaChi, sdt, email, maLop) VALUES ('$s_id','$s_maSV','$s_tenSV','$s_diaChi','$s_sdt','$s_email', '$s_maLop')";
	}

    // var_dump($s_maGV);
    // echo $sql;
    // var_dump($s_id);
    execute($sql);

    header('Location: quanLySV.php');
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
				<h2 class="text-center">Cập nhật thông tin sinh viên</h2>
			</div>
			<div class="panel-body">
                <form method="post">
                    <div class="form-group" style="display: none;">
                        <!-- <input type="text" name="maBD" value="" style="display: none;"> -->
                        <input type="text" class="form-control" id="id" name="id" value="<?=$s_id?>">
                    </div>
                    <div class="form-group">
                         <label for="maGV">Mã sinh viên:</label>
                         <input required="true" type="text" class="form-control" id="maSV" name="maSV" value="<?=$s_maSV?>">
                    </div>
                    <div class="form-group">
                        <label for="tenSV">Tên sinh viên:</label>
                        <input required="true" type="text" class="form-control" id="tenSV" name="tenSV" value="<?=$s_tenSV?>">
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
                    <div class="form-group">
                        <label for="maLop">Lớp:</label>
                        <input required="true" type="text" class="form-control" id="maLop" name="maLop" value="<?=$s_maLop?>">
                    </div>
                    <button class="btn btn-success">Save</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>