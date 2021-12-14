<?php
if (isset($_POST['id'])) {
	$s_id = $_POST['id'];

	$s_maGV = 'GV0'.$s_id;

	require_once ('dbhelp.php');

	$sql = "delete from taikhoan where username = '$s_maGV'";
	execute($sql);

	$sql = "delete from monhoc_giaovien where maGV = '$s_maGV'";
	execute($sql);

	$sql = 'delete from giangvien where id = '.$s_id;
	execute($sql);

	// echo 'Xoá điểm sinh viên thành công';
}

?>
