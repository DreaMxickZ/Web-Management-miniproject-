<?php 
    require_once('connect.php');

    if (isset($_REQUEST['btn_insert'])) {
        $DepartmentID = $_REQUEST['txt_departmentid'];
        $DepartmentName = $_REQUEST['txt_departmentname'];

        if (empty($DepartmentID)) {
            $errorMsg = "Please enter DepartmentID";
        } else if (empty($DepartmentName)) {
            $errorMsg = "please Enter DepartmentName";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $insert_stmt = $db->prepare("INSERT INTO department(DepartmentID, DepartmentName) VALUES (:departid, :departname)");
                    $insert_stmt->bindParam(':departid', $DepartmentID);
                    $insert_stmt->bindParam(':departname', $DepartmentName);

                    if ($insert_stmt->execute()) {
                        $insertMsg = "Insert Successfully...";
                        header("refresh:2;department.php");
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
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <style>

     
    </style>
</head>
<body>

    <div class="container">
    <div class="display-3 text-center">Add+ Department</div>

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
                    <label for="departmentid" class="col-sm-3 control-label">DepartmentID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_departmentid" class="form-control" placeholder="Enter Firstname...">
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="departmentname" class="col-sm-3 control-label">DepartmentName</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_departmentname" class="form-control" placeholder="Enter Lastname...">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_insert" class="btn btn-success" value="Insert">
                    <a href="department.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>