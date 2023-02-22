<?php 
require_once('connect.php');
  if(isset($_REQUEST['delete_id'])) {
    $id = $_REQUEST['delete_id'];

    $select_stml =$db->prepare("SELECT * FROM employee where EmployeeID =:id");
    $select_stml->bindParam(':id' , $id);
    $select_stml->execute();
    $row = $select_stml->fetch(PDO::FETCH_ASSOC);


    //delete an originale

    $delete_stml =$db->prepare("DELETE FROM employee where EmployeeID =:id");
    $delete_stml->bindParam(':id' , $id);
    $delete_stml->execute();

    header("Location:employee.php");
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee</title>
  <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
  <body>
    <div class="display-3 text-center">Employee</div>
    <div class="container">
      <a href="addemployee.php" class="btn btn-success mb-3 ">Add+</a>
      <a href="index.php" class="btn btn-warning mb-3  ">Back</a>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>EmployeeID</th>
          <th>Title</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Education</th>
          <th>Start_Date</th>
          <th>Salary</th>
          <th>DepartmentID</th>
          <th>Edit </th> 
          <th>Delete </th>
        </tr>
      </thead>
      <tbody>
      
        <?php
          $select_stml= $db->prepare("SELECT * FROM employee");
          $select_stml->execute();
          $i = 1;
          while($row =$select_stml->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row["EmployeeID"]; ?></td>
              <td><?php echo $row["Title"]; ?></td>
              <td><?php echo $row["Name"]; ?></td>
              <td><?php echo $row["Gender"]; ?></td>
              <td><?php echo $row["Education"]; ?></td>
              <td><?php echo $row["Start_Date"]; ?></td>
              <td><?php echo $row["Salary"]; ?></td>
              <td><?php echo $row["DepartmentID"]; ?></td>
           <td><a href="editemployee.php?update_id=<?php  echo $row["EmployeeID"];  ?>" class='btn btn-warning'>Edit</a></td> 
              <td><a href="?delete_id=<?php echo $row["EmployeeID"];  ?>" class='btn btn-danger'>Delete</a></td>
            </tr>


          <?php $i++; }        ?>

      </tbody>
    </table>
    <br>
    <div class="display-3 text-center ">Employee Inner Join</div>
    <table class="table table-striped table-bordered table-hover mt-5">
      <thead>
        <tr>
          <th>#</th>
          <th>EmployeeID</th>
          <th>Title</th>
          <th>Name</th>
          <th>Gender</th>
          <th>Education</th>
          <th>Start_Date</th>
          <th>Salary</th>
          <th>DepartmentID</th>
          <th>DepartmentName</th>

        </tr>
      </thead>
      <tbody>
        <?php
          $select_stml= $db->prepare("SELECT * FROM employee inner join department on employee.DepartmentID = department.DepartmentID");
          $select_stml->execute();
          $i = 1;  
          while($row =$select_stml->fetch(PDO::FETCH_ASSOC)){
            ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $row["EmployeeID"]; ?></td>
              
              <td><?php echo $row["Title"]; ?></td>
              <td><?php echo $row["Name"]; ?></td>
              <td><?php echo $row["Gender"]; ?></td>
              <td><?php echo $row["Education"]; ?></td>
              <td><?php echo $row["Start_Date"]; ?></td>
              <td><?php echo $row["Salary"]; ?></td>
              <td><?php echo $row["DepartmentID"]; ?></td>
              <td><?php echo $row["DepartmentName"]; ?></td>
         
            </tr>


          <?php $i++;  }        ?>

      </tbody>
    </table>
    </div>

    
    <script src="js/slim.js"></script> 
    <script src="js/poper.js"></script> 
    <script src="js/bootstrap.js"></script> 

  </body>
</html>