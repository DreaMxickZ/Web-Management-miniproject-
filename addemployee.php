<?php 
    require_once('connect.php');
    $showselect_stmt=$db->prepare("SELECT (DepartmentID) FROM department ");
   
   

    if (isset($_REQUEST['btn_insert'])) {
        $EmployeeID = $_REQUEST['txt_employeeid'];
        $Title= $_REQUEST['txt_title'];
        $Name = $_REQUEST['txt_name'];
        $Gender = $_REQUEST['txt_gender'];
        $Education = $_REQUEST['txt_education'];
        $Start_Date = $_REQUEST['txt_start_date'];
        $Salary = $_REQUEST['txt_salary'];
        $DepartmentID = $_REQUEST['txt_departmentid'];

        if (empty($EmployeeID)) {
            $errorMsg = "Please enter EmployeeID";
        } else if (empty($Title)) {
            $errorMsg = "please Enter Title";
        } else if (empty($Name)) {
            $errorMsg = "please Enter Name";
        } else if (empty($Gender)) {
            $errorMsg = "please Enter Gender";
        } else if (empty($Education)) {
            $errorMsg = "please Enter Education";
        }else if (empty($Start_Date)) {
            $errorMsg = "please Enter Start_Date";
        } else if (empty($Salary)) {
            $errorMsg = "please Enter Salary";
        } else if (empty($DepartmentID)) {
            $errorMsg = "please Enter DepartmentID";
        }
        
        
        
        
        
        
        
        
        
        
        else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO employee(EmployeeID, Title,Name,Gender,Education,Start_Date,Salary,DepartmentID) 
                    VALUES (:Employ,:title,:name,:gender,:educat,:sta_day,:salary,:DepartmentID)");
                    $insert_stmt->bindParam(':Employ', $EmployeeID);
                    $insert_stmt->bindParam(':title', $Title);
                    $insert_stmt->bindParam(':name', $Name);
                    $insert_stmt->bindParam(':gender', $Gender);
                    $insert_stmt->bindParam(':educat', $Education);
                    $insert_stmt->bindParam(':sta_day', $Start_Date);
                    $insert_stmt->bindParam(':salary', $Salary);
                    $insert_stmt->bindParam(':DepartmentID', $DepartmentID);
                    

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;employee.php");
                    }
                }
            } catch (PDOException $e) {
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
    <div class="display-3 text-center">Add+ Employee</div>

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
                        <input type="text" name="txt_employeeid" class="form-control" placeholder="EmployeeID...">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="title" class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                    <select class="form-select" aria-label="Default select example" name="txt_title">
                        <option selected>คำนำหน้าชื่อ</option>
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
                        <input type="text" name="txt_name" class="form-control" placeholder="ชื่อ - นามสกุล...">
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
                    <select class="form-select" aria-label="Default select example" name="txt_education">
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
                        <input type="date" name="txt_start_date" class="form-control" >
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="salary" class="col-sm-3 control-label">Salary</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_salary" class="form-control" placeholder="รายได้...">
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
                    <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
                    <a href="employee.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>