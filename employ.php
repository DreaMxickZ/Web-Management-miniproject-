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

    header("Location:employ");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XickZ Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 90px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            z-index: 99;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 11.5rem;
                padding: 0;
            }
        }
            
        .navbar {
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
        }

        @media (min-width: 767.98px) {
            .navbar {
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            color: #0d6efd;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                XickZ Manager
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                  Hello, XickZ
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Messages</a></li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
              </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link " aria-current="page" href="index">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="ml-2">Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active " href="employ">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            <span class="ml-2">Employee</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="depart">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pocket"><path d="M4 3h16a2 2 0 0 1 2 2v6a10 10 0 0 1-10 10A10 10 0 0 1 2 11V5a2 2 0 0 1 2-2z"/><polyline points="8 10 12 14 16 10"/></svg>
                            <span class="ml-2">Department</span>
                          </a>
                        </li>
                      
                      
                       
                   
                      </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Employee</li>
                    </ol>
                </nav>
                <h1 class="h2">Employee</h1>
                <p></p>
                <div class="row my-4">
                  
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                   
                        <div class="card">
                            <h5 class="card-header">Employee | พนักงาน</h5>
                            <div class="card-body">
                              <h5 class="card-title"><?php
                          function rowCount($db,$query){
                            $stml = $db->prepare($query);
                            $stml-> execute();
                            return $stml->rowCount();
                          }
                          echo rowCount($db,"Select * From employee");
                          ?> คน</h5>
                              <p class="card-text">จำนวนของพนักงานทั้งหมด</p>
                             
                            </div>
                          </div>
                    </div>
                 
                
                </div>
                <div class="row">
                    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                    <a href="addeploy.php" class="btn btn-success mb-3 ">เพิ่มพนักงาน</a>
                        <div class="card">
                            <h5 class="card-header">พนักงาน</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                          <tr>
                                          <th scope="col">#</th>
                                            <th scope="col">รหัสพนักงาน</th>
                                            <th scope="col">คำนำหน้า</th>
                                            <th scope="col">ชื่อ</th>
                                            <th scope="col">เพศ</th>
                                            <th scope="col">การศึกษา</th>
                                            <th scope="col">เริ่มทำงาน</th>
                                            <th scope="col">เงินเดือน</th>
                                            <th scope="col">รหัสแผนก</th>
                                            <th scope="col">แก้ไข</th>
                                            <th scope="col">ลบ</th>
                                           
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
                                            <th scope="row"><?php echo $i; ?></th>
                                            <td><?php echo $row["EmployeeID"]; ?></td>
                                            <td><?php echo $row["Title"]; ?></td>
                                            <td><?php echo $row["Name"]; ?></td>
                                            <td><?php echo $row["Gender"]; ?></td>
                                            <td><?php echo $row["Education"]; ?></td>
                                            <td><?php echo $row["Start_Date"]; ?></td>
                                            <td><?php echo $row["Salary"]; ?></td>
                                            <td><?php echo $row["DepartmentID"]; ?></td>
                                            <td><a href="editemploy.php?update_id=<?php  echo $row["EmployeeID"];  ?>" class="btn btn-sm btn-warning">แก้ไข</a></td>
                                            <td><a href="?delete_id=<?php echo $row["EmployeeID"];  ?>" class="btn btn-sm btn-danger">ลบ</a></td>
                                          </tr>

                                          <?php $i++;} ?>
                                        </tbody>
                                      </table>
                                </div>
                               
                            </div>
                        </div>

                </div>
                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright © 2019-2020 <a href="https://themesberg.com">Themesberg</a></span>
                    <ul class="nav m-0">
                        <li class="nav-item">
                          <a class="nav-link text-secondary" aria-current="page" href="#">Privacy Policy</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-secondary" href="#">Terms and conditions</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-secondary" href="#">Contact</a>
                        </li>
                      </ul>
                </footer>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script>
        new Chartist.Line('#traffic-chart', {
            labels: ['January', 'Februrary', 'March', 'April', 'May', 'June'],
            series: [
                [23000, 25000, 19000, 34000, 56000, 64000]
            ]
            }, {
            low: 0,
            showArea: true
        });
    </script>
</body>
</html>