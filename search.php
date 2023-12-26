<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body{
    background-color:gray;
    }
input{
    width:40%;
    height:5%;
    border:1px;
    border-radius:05px;
    padding: 8px 15px 8px 15px;
    margin: 10px 0px 15px 0px;
    box-shadow: 1px 1px 2px 1px grey;
}

</style>
</head>
<body>
<center>
    <form action="search.php" method="POST">
        <input type="text" name="username" placeholder="Username" /><br/>
        <input type="submit" name="search" value="Search Data">
    </form>

    <?php

    $connection = mysqli_connect('localhost','root','');
    $db = mysqli_select_db($connection,'bus_reservation_system');

    if(isset($_POST['search']))
    {

        $username = $_POST['username'];

        $query = "SELECT * FROM ticket_data where username='$username' ";
        $query_run = mysqli_query($connection,$query);

        while($row = mysqli_fetch_array($query_run))
        {
            ?>
            <form action="" method="POST">
                <input type="hidden" name="TID" value="<?php echo $row['TID']?>"/>
                <input type="text" name="username" disabled value="<?php echo $row['username']?>"/><br>
                <input type="text" name="BName" disabled value="<?php echo $row['BName']?>"/><br>
                <input type="text" name="BName" disabled value="<?php echo $row['SNumber']?>"/><br>

            </form>
            <?php
        }
    }
    ?>
</center>
</body>
</html>