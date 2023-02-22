<?php 
require_once('connect.php');
   if(isset($_REQUEST['update_id'])) {
       try {
           $departmentid = $_REQUEST['update_id'];
           $select_stmt = $db->prepare("SELECT * FROM department WHERE DepartmentID=:departmentid");
           $select_stmt->bindParam(':departmentid',$departmentid);
           $select_stmt->execute();
           $row=$select_stmt->fetch(PDO::FETCH_ASSOC);
           extract($row);
       }catch(PDOException $e) {
            $e->getMessage();
       }

   }
   if (isset($_REQUEST['btn_update'])) {
    
    $departmentname_up = $_REQUEST['txt_departname'];
    $departmentid_up = $_REQUEST['txt_departmentid'];

    if (empty($departmentname_up)) {
        $errorMsg = "Please Enter DepartmentName";
    } else {
        try {
            if (!isset($errorMsg)) {
                $update_stmt = $db->prepare("UPDATE department SET DepartmentName =:departname_up WHERE DepartmentID=:departmentid");
                $update_stmt->bindParam(':departname_up', $departmentname_up);
                $update_stmt->bindParam(':departmentid', $departmentid);

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
    <div class="display-3 text-center">Edit Department</div>

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
                    <label for="departmentid" class="col-sm-3 control-label" >DepartmentID</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_departmentid" disabled class="form-control" value="<?php echo$departmentid; ?>">
                    </div>   
                </div>
            </div>
            <br>
            <div class="form-group text-center">
                <div class="row">
                    <label for="departmentname" class="col-sm-3 control-label">DepartmentName</label>
                    <div class="col-sm-9">
                        <input type="text" name="txt_departname" class="form-control" placeholder="สาขา...">
                        
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="col-md-12 mt-3">
                    <input type="submit" name="btn_update" class="btn btn-success" value="Update" >
                    <a href="department.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>


    </form>

    <script src="js/slim.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>