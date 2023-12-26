<?php
$server="localhost";
$user="root";
$pwd="";
$data="bus_reservation_system";

$con=new mysqli($server,$user,$pwd,$data);

if ($con-> connect_error){
	die("Connection failed:". $con->connect_error);
}

$current=date("Y-m-d");
$day0=$current;
$day1=date("Y-m-d",strtotime("+1 day"));
$day2=date("Y-m-d",strtotime("+2 day"));
echo $day0." ".$day1." ".$day2;
if($current==$day0)
echo "True";
  $sql1="update bus_data set departureTime='$day0' where BID like '1%'";
  $con->query($sql1);
  $sql1="update bus_data set departureTime='$day1' where BID like '2%'";
  $con->query($sql1);
  $sql1="update bus_data set departureTime='$day2' where BID like '3%'";
  $con->query($sql1);
  
   $sql1="update counter set count=0 where name='count'";
  $con->query($sql1);
  
  $sql="select count from counter where name='count'";
  $res=$con->query($sql);
  if ($res->num_rows > 0) {
    // output data 
    while($row = $res->fetch_assoc()) {
       $count=$row["count"];
      
    }
} 

 echo "  ".$count;
 if ($count==1) {
   # code...
  echo "Count is ok";
 }
$con->close();

?>