<html>

<head></head>

<body>
  <?php
  require('connect.php');
  // ORDER QUERY DATA
  $sql = '
	SELECT *
	FROM department ;
	';

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
  <table border="1">
    <tr>
      <th width="50">
        <div align="center">DepartmentID</div>
      </th>
      <th width="100">
        <div align="center">DepartmentName</div>
      </th>
      
      
     
    </tr>
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
  mysqli_close($conn); // ปิดฐานข้อมูล
  echo "<br><br>";
  echo "--- END ---";
  ?>
</body>

</html>