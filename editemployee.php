<?php 
require_once('connect.php');
   if(isset($_REQUEST['update_id'])) {
       try {
           $empid = $_REQUEST['update_id'];
           $select_stmt = $db->prepare("SELECT * FROM employee WHERE EmployeeID=:empid");
           $select_stmt->bindParam(':empid',$empid);
           $select_stmt->execute();
           $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
           extract($row);
       }catch(PDOException $e) {
            $e->getMessage();
       }

   }
   if (isset($_REQUEST['btn_update'])) {
    
    $title = $_REQUEST['txt_title'];
    $name = $_REQUEST['txt_name'];
    $gender = $_REQUEST['txt_gender'];
    $education = $_REQUEST['txt_education'];
    $start_date = $_REQUEST['txt_start_date'];
    $salary = $_REQUEST['txt_salary'];
    $departmentid = $_REQUEST['txt_departmentid'];



    if (empty($title)) {
            $errorMsg = "please Enter Title";
        } else if (empty($name)) {
            $errorMsg = "please Enter Name";
        } else if (empty($gender)) {
            $errorMsg = "please Enter Gender";
        } else if (empty($education)) {
            $errorMsg = "please Enter Education";
        }else if (empty($start_date)) {
            $errorMsg = "please Enter Start_Date";
        } else if (empty($salary)) {
            $errorMsg = "please Enter Salary";
        } else if (empty($departmentid)) {
            $errorMsg = "please Enter DepartmentID";
        } else {
        try {
            if (!isset($errorMsg)) {
                $update_stmt = $db->prepare("UPDATE employee 
                SET Title=:title,Name=:name,Gender=:gender, Education=:education, 
                Start_Date=:start_date, Salary=:salary , DepartmentID=:departmentid  WHERE EmployeeID=:empid");
                $update_stmt->bindParam(':title', $title);
                $update_stmt->bindParam(':name', $name);
                $update_stmt->bindParam(':gender', $gender);
                $update_stmt->bindParam(':education', $education);
                $update_stmt->bindParam(':start_date',$start_date);
                $update_stmt->bindParam(':salary',$salary);
                $update_stmt->bindParam(':departmentid',$departmentid);



                $update_stmt->bindParam(':empid',$empid);

                if ($update_stmt->execute()) {
                    $updateMsg = "Record update successfully...";
                    header("refresh:2;employee.php");
                }
            }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <style>

     
    </style>
</head>
<body>

    <div class="container">
    <div class="display-3 text-center">Edit Employee</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($insertMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $insertMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="employeeid" class="col-sm-3 control-label">EmployeeID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_employeeid" disabled class="form-control" value="<?php echo$empid; ?>">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="title" class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="txt_title" >
                        <option selected >คำนำหน้าชื่อ</option>
                            <option value="นาย" name="txt_title" >นาย</option>
                            <option value="นาง" name="txt_title" >นาง</option>
                            <option value="นางสาว" name="txt_title" >นางสาว</option>
                    </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_name" class="form-control" value="<?php echo$Name; ?>">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="gender" class="col-sm-3 control-label">Gender</label>
                    <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example"name="txt_gender">
                        <option selected>เพศ</option>
                            <option value="ชาย" name="txt_gender" >ชาย</option>
                            <option value="หญิง" name="txt_gender" >หญิง</option>
                            <option value="LGBT+"name="txt_gender" >LGBT+</option>
                    </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="education" class="col-sm-3 control-label">Education</label>
                    <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="txt_education"  >
                        <option selected>การศึกษา</option>
                            <option value="ปวส." name="txt_education" >ปวส.</option>
                            <option value="ปริญญาตรี" name="txt_education">ปริญญาตรี</option>
                            <option value="ปริญญาโท"name="txt_education" >ปริญญาโท</option>
                            <option value="ปริญญาเอก"name="txt_education" >ปริญญาเอก</option>
                    </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="salary" class="col-sm-3 control-label">Start_Date</label>
                    <div class="col-sm-9">
                        <input type="date" name="txt_start_date" class="form-control" value="<?php echo$Start_Date; ?>"; >
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="salary" class="col-sm-3 control-label">Salary</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_salary" class="form-control" value="<?php echo$Salary; ?>">
                    </div>                                                          
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="departmentid" class="col-sm-3 control-label">DepartMentID</label>
                    <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="txt_departmentid">
                    <?php
          $select_stml= $db->prepare("SELECT * FROM department");
          $select_stml->execute(); ?>
            <option selected>ตำแหน่ง</option>
          <?php  while($row =$select_stml->fetch(PDO::FETCH_ASSOC)){
              
            ?>
                        
                            <option value="<?php echo $row["DepartmentID"]; ?>"name="txt_departmentid"><?php echo $row["DepartmentID"]; ?></option>
                            <?php } ?>
                    </select>
         
                    </div>
                </div>
            </div>

            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="Insert">
                    <a href="employee.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>