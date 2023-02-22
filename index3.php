<?php
    require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>information</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.css">
</head>
<body>

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>StudentId</th>
                <th>StudentName</th>
                <th>StudentGrade</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select_stmt = $db->prepare("SELECT * FROM ข้อมูลนักศึกษา");
                $select_stmt->execute();

                while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {

            ?>
                    <tr>
                        <td><?php echo $row["StudentId"];?></td>
                        <td><?php echo $row["StudentName"];?></td>
                        <td><?php echo $row["StudentGrade"];?></td>
                        <td><a href="edit.php?update_id=<?php echo $row["StudentId"]; ?>" class="btn btn-warning">Edit</a></td>
                        <td><a href="?delete_id=<?php echo $row["StudentId"]; ?>" class="btn btn-danger">Delete</a></td>


                    </tr>

            <?php }  ?>
        </tbody>
    </table>

    <script src="js/slim.js"></script> 
    <script src="js/poper.js"></script> 
    <script src="js/bootstrap.js"></script> 
</body>
</html>