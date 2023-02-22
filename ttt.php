<?php 
    require_once('connect.php');

    if (isset($_REQUEST['update_id'])) {
        try {
            $departmentID = $_REQUEST['update_id'];
            $select_stmt = $db->prepare("SELECT * FROM department WHERE DepartmentID = :departmentID");
            $select_stmt->bindParam(':departmentID', $departmentID);
            $select_stmt->execute();
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
            echo $departmentID;
        } catch(PDOException $e) {
            $e->getMessage();
        }
    }

    if (isset($_REQUEST['btn_update'])) {
        $departmentid_up = $_REQUEST['txt_firstname'];
        $departmentname_up = $_REQUEST['txt_lastname'];

        if (empty($departmentid_up)) {
            $errorMsg = "Please Enter Fisrtname";
        } else if (empty($departmentname_up)) {
            $errorMsg = "Please Enter Lastname";
        } else {
            try {
                if (!isset($errorMsg)) {
                    $update_stmt = $db->prepare("UPDATE department SET DepartMentName = :departmentname Where DepartmentID = :departmentID");
                    $update_stmt->bindParam(':departmentname', $departmentname_up);
                  
                    $update_stmt->bindParam(':departmentID', $departmentID);

                    if ($update_stmt->execute()) {
                        $updateMsg = "Record update successfully...";
                        header("refresh:2;department.php");
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
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>

    <div class="container">
    <div class="display-3 text-center">Edit Page</div>

    <?php 
         if (isset($errorMsg)) {
    ?>
        <div class="alert alert-danger">
            <strong>Wrong! <?php echo $errorMsg; ?></strong>
        </div>
    <?php } ?>
    

    <?php 
         if (isset($updateMsg)) {
    ?>
        <div class="alert alert-success">
            <strong>Success! <?php echo $updateMsg; ?></strong>
        </div>
    <?php } ?>

    <form method="post" class="form-horizontal mt-5">
            
            <div class="form-group text-center">
                <div class="row">
                    <label for="firstname" class="col-sm-3 control-label">Fisrtname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_firstname" class="form-control" value="<?php echo $departmentID; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="row">
                    <label for="lastname" class="col-sm-3 control-label">lastname</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_lastname" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="Update">
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>