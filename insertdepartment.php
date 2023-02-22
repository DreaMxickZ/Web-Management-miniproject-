<html>

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>

<body>
    <h2>Insert Data : Department</h2>
    <form action="insertdepartmentsql.php" method="post" target="_self" >
        <table border="1" class="table">
            <tr>
                <td>DepartmentID : </td>
                <td><input type="text" name="DepartmentID"></td>
            </tr>
            <tr>
                <td>DepartmentName : </td>
                <td><input type="text" name="DepartmentName"></td>
            </tr>
           
        </table>

        <br>
        <input type="submit" value="Insert Data">
    </form>
</body>

</html>