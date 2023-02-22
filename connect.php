<?php  
$severname='localhost';
$username='root';
$password='';
$dbname='test11'; 

//$severname='databases.000webhost.com';
//$username='id17675293_root';
//$password='142536789Za_';
//$dbname='id17675293_test10';

//$severname='sql212.epizy.com';
//$password='142536789';
//$dbname='epiz_29886422_test_10';




$conn = mysqli_connect($severname,$username,$password,$dbname);

try {
    $db= new PDO("mysql:host={$severname}; dbname={$dbname}",$username,$password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    $e->getMessage();
}

//Check Connect
//if (!$conn) {
    //die("Connection Failed" . mysqli_connect_error());
//}
//else {
   // echo "Connection Ok | เชื่อมต่อฐานข้อมูลสำเร็จ";
//}
 

//mysqli_close($conn);//ปิด

?>