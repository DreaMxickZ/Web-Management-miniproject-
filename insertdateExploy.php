<?php
require('connect.php');
$EmployeeID   = $_REQUEST['EmployeeID'];
$Title		  = $_REQUEST['Title'];
$Name		  = $_REQUEST['Name'];
$Gender		  = $_REQUEST['Gender'];
$Education	  = $_REQUEST['Education'];
$Start_Date	  = $_REQUEST['Start_Date'];
$Salary		  = $_REQUEST['Salary'];
$DepartmentID = $_REQUEST['DepartmentID'];

$sql = "
	INSERT INTO employee
	VALUES ('$EmployeeID','$Title','$Name','$Gender','$Education','$Start_Date','$Salary','$DepartmentID');
	";

$objQuery = mysqli_query($conn, $sql);

if ($objQuery) {
	echo "เพิ่มข้อมูลสำเร็จ";
} else {
	echo "เพิ่มข้อมูลไม่สำเร็จ";
}

mysqli_close($conn); // ปิดฐานข้อมูล
echo "<br><br>";
echo "--- END ---";
?>
?>