<?php
require_once("dbhelp.php");
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
                        <li><a href="QTV.php" class='fas'>&#xf015;</a></li>
						<img src="https://uet.vnu.edu.vn/wp-content/uploads/2017/02/logo2_new.png" alt="Trường Đại học Công nghệ, ĐHQGHN - VNU- University of Engineering and Technology">
					</ul>
				</div>
				<h2 class="text-center">Quản lý giảng viên</h2>
			</div>
            <div class="panel-body">
                  <button class="btn btn-success" onclick="window.open('inputGV.php', '_self')">Add</button>
                  <table class="table table-bordered">
                      <thead>
                          <tr>
                              <th>Mã giảng viên</th>
                              <th>Họ tên</th>
                              <th>Địa Chỉ</th>
                              <th>Số điện thoại</th>
                              <th>Email</th>
                              <th width="60px"></th>
                              <th width="60px"></th>
                          </tr>
                      </thead>
                      <tbody>
    <?php

    if (isset($_GET['s']) && $_GET['s'] != '') {
        $sql = 'select *
        from giangvien
        where maGV like "%'.$_GET['s'].'%"
        order by maGV';
    } else {
        $sql = 'select *
        from giangvien
        order by maGV';
    }

    $studentList = executeResult($sql);

    foreach($studentList as $std) {
        echo '<tr>
            <td>'.$std["maGV"].'</td>
            <td>'.$std["tenGV"].'</td>
            <td>'.$std["diaChi"].'</td>
            <td>'.$std["sdt"].'</td>
            <td>'.$std["email"].'</td>
            <td><button class="btn btn-warning" class="fas" onclick=\'window.open("inputGV.php?id='.$std['maGV'].'","_self")\'>Edit</button></td>
            <td><button class="btn btn-danger" onclick="deleteGV('.$std['id'].')">Delete</button></td>
        </tr>';
    }
    ?>
                      </tbody>
                  </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
		function deleteGV(id) {
			option = confirm('Bạn có chắc muốn xoá giảng viên này không?')
			if(!option) {
				return;
			}

			console.log(id);
			$.post('delete_gv.php', {
				'id': id
			}, function(data) {
				// alert(data)
				location.reload();
			})
		}
	</script>
</body>
</html>