<?php
    session_start();

    if(!isset($_SESSION['username'])){
        header('location:login.php');
    }

?>
<!DOCTYPE html>
<htm lang="en">
    <head>
        <link rel="stylesheet" href="ticketInformation.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>

            <?php
            $db = mysqli_connect('localhost', 'root', '', 'bus_reservation_system');
            $username =  $_SESSION['username'];
            $qry = "select * from ticket_data where username = '$username'";
            $result = mysqli_query($db,$qry);
            while ($row = mysqli_fetch_array($result)){
                echo '<div class="col-md-6 col-md-center">
        <table class="table table-striped width" style="position: relative;left: 50%;right:50%;">
            <thead>
            <th><h3>My Ticket</h3></th>
            </thead>
            <tbody>
            <tr>
                <td>Operator:</td>
                <td>ACE Express</td>
            </tr>';
                echo'<tr>';
                echo'<td>Route:</td>';
                echo'<td>'. $row[2] .'-'.$row[3].'</td>';
                echo'</tr>';
                echo'<tr>';
                echo'<td>Departure Time</td>';
                echo'<td>'.$row[5].'</td>';
                echo'</tr>';
                echo'<tr>';
                echo'<td>Seat Number:</td>';
                echo'<td>'.$row[4].'</td>';
                echo'</tr>';
                echo'<tr>';
                echo'<td>Total Price</td>';
                echo'<td>'.$row[6].' Ks</td>';
                echo'</tr>';
                echo'</tbody>
                </table>
            </div>';
            }
            mysqli_close($db);
            ?>
    </body>
</htm>