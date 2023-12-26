<?php 
$username = "";
$email    = "";
$tel      = "";
$errors = array();

//connect to the database
$name="";
$db = mysqli_connect('localhost', 'root', '', 'bus_reservation_system');
$username="Admin";
//$password=123456;
//$password=md5(password);
$sql="select * from user_data where username='$username' ";
$res= $db->query($sql);
if ($res->num_rows>0) {
   $row=$res->fetch_assoc();
   $name=$row['userlevel'];
}
echo $name."<br>";
            //if ($name=="admin") 
                //$_SESSION['username']=$username;
               // header("location:admin/main.php");
?>