<?php
session_start();
// echo $_SESSION['u'];
require_once("dbhelp.php");
$sql = 'SELECT tenGV FROM giangvien WHERE maGV like "%'.$_SESSION['u'].'%"';
$tenGV = executeResult($sql);
if ($tenGV != null && count($tenGV) > 0) {
    $nameGV        = $tenGV[0];
    $name = $nameGV['tenGV'];
}
// echo $name;
$sql = 'SELECT maMH FROM monhoc_giaovien WHERE maGV like "%'.$_SESSION['u'].'%"';

$list = executeResult($sql);
$listMH = [];

foreach($list as $item){
    $listMH[] = $item['maMH'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hệ thống tra cứu điểm thi học kì Trường ĐH Công Nghệ</title>
    <link rel="stylesheet" href="styleQLSV.css">
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
                        <li><a href="" class='fas'>&#xf2bd;
                            <?php
                                echo $name;
                            ?>
                        </a></li>
						<li><a href="https://mail.vnu.edu.vn/" class='fas'>&#xf2b6; Email</a></li>
						<li><a href="https://uet.vnu.edu.vn/" class='fas'>&#xf549; UET</a></li>
						<img src="https://uet.vnu.edu.vn/wp-content/uploads/2017/02/logo2_new.png" alt="Trường Đại học Công nghệ, ĐHQGHN - VNU- University of Engineering and Technology">
					</ul>
				</div>
				<h2 class="text-center">Quản lý điểm sinh viên</h2>
                <form method="get">
					<input type="text" name="s" class="form-control" style="margin-top: 15px; margin-bottom: 15px;" placeholder="Tìm kiếm theo mã sinh viên">
				</form>
			</div>
            <div class="panel-body">
                  <button class="btn btn-success" onclick="window.open('input.php', '_self')">Add</button>
<?php

foreach($listMH as $value) {
    echo "<button class=\"btn btn-logout btn-info\" onclick=\"$('table#$value').css('display', '');\" style=\"width: 95%; text-align: left; padding: 10px; margin-top: 10px;\">$value</button>";
    echo "<button class=\"btn btn-secondary\" onclick=\"$('table').css('display', 'none');\" style=\"width: 5%; text-align: center; padding: 10px; margin-top: 10px;\">-</button>";

    echo "<table class=\"table table-bordered\" id=\"$value\" style=\"display: none;\">
    <thead>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Tên môn học</th>
            <th>Điểm chuyên cần</th>
            <th>Điểm giữa kì</th>
            <th>Điểm cuối kì</th>
            <th>Tổng kết</th>
            <th width=\"60px\"></th>
            <th width=\"60px\"></th>
        </tr>
    </thead>
    <tbody>";

    if (isset($_GET['s']) && $_GET['s'] != '') {
        $sql = 'select d.maBD, d.maSV, sv.tenSV, mh.tenMH, d.diemCC, d.diemGK, d.diemCK, dtk.diemTK, d.maMH
        from diem d
        join monhoc_giaovien mh_gv on d.maMH = mh_gv.maMH
        join sinhvien sv on d.maSV = sv.maSV
        join diemtongket dtk on dtk.maBD = d.maBD
        join monhoc mh on mh.maMH = mh_gv.maMH
        where d.maSV like "%'.$_GET['s'].'%" and mh_gv.maGV like "%'.$_SESSION['u'].'%" and d.maMH = "'.$value.'"
        order by d.maSV';
    } else {
        $sql = 'select d.maBD, d.maSV, sv.tenSV, mh.tenMH, d.diemCC, d.diemGK, d.diemCK, dtk.diemTK, d.maMH
        from diem d
        join monhoc_giaovien mh_gv on d.maMH = mh_gv.maMH
        join sinhvien sv on d.maSV = sv.maSV
        join diemtongket dtk on dtk.maBD = d.maBD
        join monhoc mh on mh.maMH = mh_gv.maMH
        where mh_gv.maGV like "%'.$_SESSION['u'].'%" and d.maMH = "'.$value.'"
        order by d.maSV';
    }

    $studentList = executeResult($sql);

    foreach($studentList as $std) {
        echo '<tr>
            <td>'.$std["maSV"].'</td>
            <td>'.$std["tenSV"].'</td>
            <td>'.$std["tenMH"].'</td>
            <td>'.$std["diemCC"].'</td>
            <td>'.$std["diemGK"].'</td>
            <td>'.$std["diemCK"].'</td>
            <td>'.$std["diemTK"].'</td>
            <td><button class="btn btn-warning" class="fas" onclick=\'window.open("input.php?id='.$std['maSV'].'&maMon='.$std['maMH'].'","_self")\'>Edit</button></td>
            <td><button class="btn btn-danger" class="glyphicon" onclick="deleteStudent('.$std['maBD'].')">Delete</button></td>
        </tr>';
    }


    echo "</tbody>
    </table>";

    
}
?>
                      
            </div>
        </div>
    </div>
    <script type="text/javascript">
		function deleteStudent(maBD) {
			option = confirm('Bạn có chắc muốn xoá điểm của sinh viên này không?')
			if(!option) {
				return;
			}

			console.log(maBD);
			$.post('delete_student.php', {
				'maBD': maBD
			}, function(data) {
				// alert(data)
				location.reload();
			})
		}
	</script>
</body>
</html>

