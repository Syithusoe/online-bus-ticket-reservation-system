<?php
session_start(); 
$name=$_SESSION['username'];
if ($name==null) {
    header("location:../login.php");
}
$server="localhost";
$user="root";
$pwd="";
$data="bus_reservation_system";

$con=new mysqli($server,$user,$pwd,$data);

if ($con-> connect_error){
	die("Connection failed:". $con->connect_error);
}



//to solve the problem use the SQL
$sql="select departureTime from bus_data where BID=101";
$res=$con->query($sql);
if ($res->num_rows > 0) {
    // output data 
    while($row = $res->fetch_assoc()) {
       $day0=$row["departureTime"];
       
    }
} else {
    echo "0 results";
}
  
$sql="select departureTime from bus_data where BID=201";
$res=$con->query($sql);
if ($res->num_rows > 0) {
    // output data 
    while($row = $res->fetch_assoc()) {
       $day1=$row["departureTime"];
       
    }
} else {
    echo "0 results";
}
$sql="select departureTime from bus_data where BID=301";
$res=$con->query($sql);
if ($res->num_rows > 0) {
    // output data 
    while($row = $res->fetch_assoc()) {
       $day2=$row["departureTime"];
       
    }
} else {
    echo "0 results";
}

 //echo $day0."+".$day1."+".$day2;//Print three days in the database

$current=date("Y-m-d");
//echo "   Today is :".$current;
if ($current==$day0) {
  $sql="select count from counter where name='count'";
  $res=$con->query($sql);
  if ($res->num_rows > 0) {
    // output data 
    while($row = $res->fetch_assoc()) {
       $count=$row["count"];
    }
} 
  if($count==1){
    $day2=date(("Y-m-d"),strtotime("+2 day"));    
    $sql="update seat_data set unavailable=0 where BID like '3%'";
    $con->query($sql);
    $sql1="update bus_data set departureTime='$day2' where BID like '3%'";
    $con->query($sql1);
}
}


if ($current==$day1) {
  $day0=date(("Y-m-d"),strtotime("+2 day")); 
  $sql="update seat_data set unavailable=0 where BID like '1%'";
  $con->query($sql); 
  $sql1="update bus_data set departureTime='$day0' where BID like '1%'";
  $con->query($sql1);
}


if ($current==$day2) {
  $day1=date(("Y-m-d"),strtotime("+2 day"));
  $sql="update seat_data set unavailable=0 where BID like '2%'";
  $con->query($sql);
  $sql1="update bus_data set departureTime='$day1' where BID like '2%'";
  $con->query($sql1);
  $sql1="update counter set count=1 where name='count'";
  $con->query($sql1);
 
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
  <style type="text/css">
    #btn{
     
      position: absolute;
      left: 600px;
      border: 2px solid green;

    }
  </style>

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <p class="navbar-brand mr-1">Administration</p>
<!--<a id="btn" href="dateControl.php" >Date Check</a>-->
    

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
       <p class="navbar-brand mr-1"><?php echo $name; ?></p>

        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">
   
    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item active">
            <ul class="navbar-nav ml-auto ml-md-0">
     
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Main
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="seatTable.php">Seat Information</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="ticketTable.php">Ticket Information</a>
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
                    <th>Bus id</th>
                    <th>Bus name</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Time</th>
                    <th>Price</th>
                    
                  </tr>
                </thead>
                <?php
                $sql="select BID,BName,departureTime,startCity,endCity,price from bus_data";
                $result= $con->query($sql);
                
                if($result-> num_rows > 0){
                    while($row=$result -> fetch_assoc()){
                        echo "<tr><td>".$row["BID"]."</td><td>".$row["BName"]."</td><td>".$row["startCity"]."</td><td>".$row["endCity"]."</td><td>".$row["departureTime"]." </td><td>".$row["price"]."</td></tr>"; 
                    }
                }
                else {
                    echo "Data is empty";
                }
                $con->close();
                
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
