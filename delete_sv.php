<?php
if (isset($_POST['id'])) {
	$s_id = $_POST['id'];

	$s_maSV = (string) $s_id;

	require_once ('dbhelp.php');

	$sql = "delete from taikhoan where username = '$s_maSV'";
	execute($sql);

    $sql = "delete from diemtongket where maBD in (SELECT maBD FROM diem WHERE maSV = '$s_maSV')";
	execute($sql);

	$sql = "delete from diem where maBD in (SELECT maBD FROM diem WHERE maSV = '$s_maSV')";
	execute($sql);

	$sql = "delete from sinhvien where maSV = '$s_maSV'";
	execute($sql);
	// echo 'Xoá điểm sinh viên thành công';
}

?>
