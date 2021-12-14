<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống tra cứu điểm thi học kì Trường ĐH Công Nghệ</title>
	<link rel='shortcut icon' href='https://uet.vnu.edu.vn/wp-content/uploads/2017/02/logo2_new.png' />
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="styleQLSV.css">
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
						<img src="https://uet.vnu.edu.vn/wp-content/uploads/2017/02/logo2_new.png" alt="Trường Đại học Công nghệ, ĐHQGHN - VNU- University of Engineering and Technology">
					</ul>
				</div>
				<h2 class="text-center">Hệ thống tra cứu điểm thi học kỳ</h2>
				<h1 class="text-center">Trường ĐH Công Nghệ</h1>
			</div>
            <div class="panel-body">
                  <button class="btn btn-logout btn-info" onclick="window.open('quanLyGV.php', '_self')" style="width: 100%; text-align: left; padding: 20px;">Quản lý giảng viên</button> <br> <br>
                  <button class="btn btn-logout btn-info" onclick="window.open('quanLySV.php', '_self')" style="width: 100%; text-align: left; padding: 20px;">Quản lý sinh viên</button>
</body>
</html>

