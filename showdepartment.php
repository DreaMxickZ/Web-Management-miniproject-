<?php /* *** No Copyright for Education (Free to Use and Edit) *** * /
PHP 7.1.1 | MySQL 5.7.17 | phpMyAdmin 4.6.6 | by appserv-win32-8.6.0.exe
Created by Mr.Earn SURIYACHAY | ComSci | KMUTNB | Bangkok | Apr 2018 */ ?>
<html>

<head></head>

<body>
  <?php
  require('connect.php');

  $sql = '
    SELECT * 
    FROM department;
    ';

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
  <table border="1" class="table">
    <thead class="thead-dark">
    <tr>
    <th scope="">Number</th>
      <th scope="">DepartmentID</th>
      <th scope="">DepartmentName</th>
     
      
    </tr>
    <thead>
    <?php
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
     
      <tr>
      
      <td>
          <div align="center"><?php echo $i; ?></div>
        </td>
        <td><?php echo $objResult["DepartmentID"]; ?></td>
        <td><?php echo $objResult["DepartmentName"]; ?></td>
    </tr>
    <?php
      $i++;
    }
    ?>
  </table>
  <?php
 // mysqli_close($conn); // ปิดฐานข้อมูล
 
  
  ?>
</body>

</html>