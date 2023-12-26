<?php 
$server="localhost";
$user="root";
$pwd="";
$data="bus_reservation_system";

$con=new mysqli($server,$user,$pwd,$data);

if ($con-> connect_error){
  die("Connection failed:". $con->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="Si Thu Soe" content="">

  <title>Duty of Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">


  <div id="wrapper">
   
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item active">
            <ul class="navbar-nav ml-auto ml-md-0">
     
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Ticket Information
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="seatTable.php">Seat Information</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="main.php">Main</a>
           <div class="dropdown-divider"></div>
           <a class="dropdown-item" href="userTable.php">User Information</a>
          </div>
      </li>
    </ul>
        </li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Seat Number</th>
                    <th>Time</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <?php
                $sql="select username,startCity,endCity,seatNumber,departureTime,amount from ticket_data";
                $result= $con->query($sql);
                
                if($result-> num_rows > 0){
                    while($row=$result -> fetch_assoc()){
                        echo "<tr><td>".$row["username"]."</td><td>".$row["startCity"]."</td><td>".$row["endCity"]." </td><td>".$row["seatNumber"]."</td><td>".$row["departureTime"]."</td><td>".$row["amount"]."</td></tr>";
                    }
                }
                else {
                    echo "Data is empty";
                }
                $con->close();
                $con=new mysqli($server,$user,$pwd,$data);
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card-footer small text-muted">Created by Si Thu Soe</div>
      </div>
     
       

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
