<?php
session_start();
require_once ('dbhelp.php');
$u = $p = '';

$u = $_POST['username'];
// $_SESSION['u'] = $_POST['username'];
$_SESSION['u'] = $u;
$p = md5($_POST['password']);
$_SESSION['pw'] = $p;

$sql = "select role from taikhoan where username='$u' and password='$p'";

$account = executeResult($sql);
	if ($account != null && count($account) > 0) {
		$acc        = $account[0];
        $role = $acc['role'];
        if($role == 1) {
            header('Location: quanLyDiemSV.php');
        } elseif($role == 2) {
            header("Location: SVTimKiem.php");
        } else {
            header("Location: QTV.php");
        }
	} else {
		header("Location: index.php");
	}

?>