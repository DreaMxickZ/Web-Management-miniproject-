<html>
	<body>

<?php
require'connect.php';
$DepartmentID  = $_REQUEST['DepartmentID'];
$DepartmentName	= $_REQUEST['DepartmentName'];

$sql = "
	INSERT INTO department (DepartmentID,DepartmentName)
	VALUES ('$DepartmentID','$DepartmentName');
	";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "เพิ่มข้อมูลสำเร็จ";
} else {
	echo "เพิ่มข้อมูลไม่สำเร็จ";
}
echo "<br><br>";
include('showdepartment.php');

echo "<br><br>";




echo "--- END ---";
?>

	</body>
</html>