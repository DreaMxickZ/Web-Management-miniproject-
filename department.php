<?php 
require_once('connect.php');
  if(isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select_stml =$db->prepare("SELECT * FROM department where DepartmentID =:id");
    $select_stml->bindParam(':id' , $id);
    $select_stml->execute();
    $row = $select_stml->fetch(PDO::FETCH_ASSOC);


    //delete an originale

    $delete_stml =$db->prepare("DELETE FROM department where DepartmentID =:id");
    $delete_stml->bindParam(':id' , $id);
    $delete_stml->execute();

    header("Location:department.php");
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
  <body>
    <div class="display-3 text-center">Department</div>
    <div class="container">
      <a href="adddepartment.php" class="btn btn-success mb-3 ">Add+</a>
      <a href="index.php" class="btn btn-warning mb-3  ">Back</a>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>DepartmentID</th>
          <th>DepartmentName</th>
          <th>Edit </th> 
          <th>Delete </th>
        </tr>
      </thead>
      <tbody>
        <?php
          $select_stml= $db->prepare("SELECT * FROM department");
          $select_stml->execute();
          $i = 1;  
          while($row =$select_stml->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
            <td><?php echo $i; ?></td>
              <td><?php echo $row["DepartmentID"]; ?></td>
              <td><?php echo $row["DepartmentName"]; ?></td>
           <td><a href="editdepartment.php?update_id=<?php  echo $row["DepartmentID"];  ?>" class='btn btn-warning'>Edit</a></td> 
           <td><a href="?delete_id=<?php echo $row["DepartmentID"];  ?>" class="btn btn-sm btn-danger">ลบ</a></td>
            </tr>


          <?php  $i++;  }        ?>

      </tbody>
    </table>

    
    </div>

    
    <script src="js/slim.js"></script> 
    <script src="js/poper.js"></script> 
    <script src="js/bootstrap.js"></script> 

  </body>
</html>