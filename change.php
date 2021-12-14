<?php
    session_start();
    require_once ('dbhelp.php');
    $maSV = $_SESSION['u'];
    $passWord = $_SESSION['pw'];

    $oldPass = $newPass = $newPassAgain = '';
    if(!empty($_POST)){
        $oldPass = md5($_POST['oldPass']);
        $newPass = $_POST['newPass'];
        $newPassAgain = $_POST['newPassAgain'];
    }
    $sql = "";
    if($passWord == $oldPass && $newPass == $newPassAgain){
        // update
        $newPass = md5($newPass);
        $sql = "UPDATE taikhoan SET username = '$maSV', password = '$newPass' WHERE username = '$maSV'";
        $_SESSION['pw'] = $newPass;
        execute($sql);
        echo $sql;
        header('Location: index.php');
	    die();
    }
    // var_dump(empty($_POST));
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
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
						<li><a href="index.php" class='fas'>&#xf2f5;</a></li>
						<li><a href="https://mail.vnu.edu.vn/" class='fas'>&#xf2b6; Email</a></li>
						<li><a href="https://uet.vnu.edu.vn/" class='fas'>&#xf549; UET</a></li>
						<img src="https://uet.vnu.edu.vn/wp-content/uploads/2017/02/logo2_new.png" alt="Trường Đại học Công nghệ, ĐHQGHN - VNU- University of Engineering and Technology">
					</ul>
				</div>
				<h2 class="text-center">Thay đổi mật khẩu</h2>
			</div>
			<div class="panel-body">
                <form method="post">
                    <div class="form-group"  style="width: 60%; margin: auto;">
                         <label for="oldPass">Mật khẩu cũ:</label>
                         <input required="true" type="password" class="form-control" id="oldPass" name="oldPass">
                    </div>
                    <div class="form-group"  style="width: 60%; margin: auto;">
                        <label for="newPass">Mật khẩu mới:</label>
                        <input required="true" type="password" class="form-control" id="newPass" name="newPass">
                    </div>
                    <div class="form-group"  style="width: 60%; margin: auto;">
                        <label for="newPassAgain">Nhập lại mật khẩu mới:</label>
                        <input required="true" type="password" class="form-control" id="newPassAgain" name="newPassAgain">
                    </div>
                    <div style="width: 60%; margin: auto; margin-top: 10px">
                        <button class="btn btn-success">Save</button>
					</div>
                </form>
			</div>
		</div>
	</div>
</body>
</html>