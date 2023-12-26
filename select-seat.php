<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $link = "location:login.php?redirect=select-seat";
        if(isset($_GET['bid'])){
            $link = $link . "&bid=" . $_GET['bid'];
        }
        header($link);
    }else if(!isset($_GET['bid'])){
        header("location:bus-search.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <title>Select Seat</title>
        <link rel="stylesheet" href="css/select-seat.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--------------confirmation------->
        <meta name="viewport" content="width=device-width, initial-scale=1">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!---------------------- ticket Confirmation-------------->

<!-------------------------------------------------------------------->
        <link rel = "stylesheet" href="css/bootstrap.min.css"/>
    </head>
    <body>
    <form method="get" action="select-seat.php">
    <input type="hidden" name="bid" value="<?php echo $_GET['bid']; ?>">
<div class="train">
    <h3 style="text-align: center; ">Select Seat</h3>
  <div class="exit front bus-body">

      <div>Driver</div>
  </div>
 
  <ol class="wagon bus-body">
      <?php
      $db = mysqli_connect('localhost', 'root', '', 'bus_reservation_system');
      $query = "select * from seat_data where BID=".$_GET['bid'];
      $result = mysqli_query($db,$query);
      while ( $row = mysqli_fetch_array($result)){
          $i = $row[2];
          if(($i-1)%4==0){
              $row_number = ($i-1)/4 + 1;
              echo '<li class="row row--' . $row_number . '">' . "\n";
              echo '<ol class="seats">' . "\n";
          }
          echo '<li class="seat">' . "\n";
          if($row[3]==0){
              echo '<input type="checkbox" name = "'.$i.'" id="' . $i . '">' . "\n";
          }else{
              echo '<input type="checkbox" name = "'.$i.'" disabled id="' . $i . '">' . "\n";
          }
          echo '<label for="' . $i . '">' . $i . '</label>' . "\n";
          echo '</li>' . "\n";
          if($i%4==0){
            echo '</ol>' . "\n";
            echo '</li>' . "\n";
          }
      }
      ?>
  </ol>
    <div class="bus-button">
    <button type="submit" name="confirm" class="btn btn-success btn-lg btn-block" value="confirm">Continue</button>
    </div>
<!--   <div class="exit exit--back bus-body"></div> -->
</div>
    </form>
<!---------------------------------Confirmatoin--------------------->
      <form action="payment.php" method="get" >
        <div style="position: absolute; top: 5%; right: 15%" class="col-md-4">
        <table class="table table-striped width">
            <thead>
            <th><h3>Trip Information</h3></th>
            </thead>
        <tbody>
            <tr>
                <td>Operator:</td>
                <td>ACE Express</td>
            </tr>
            <?php
                $db = mysqli_connect('localhost', 'root', '', 'bus_reservation_system');
                $bid = mysqli_real_escape_string($db, $_GET['bid']);
                $query = "select * from bus_data where BID = $bid ";
                $result = mysqli_query($db, $query);
                if ($row = mysqli_fetch_array($result)) {
                    echo '<tr>';
                    echo '<td>Route:</td>';
                    echo '<td>' . $row[2] . ' - ' . $row[3] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Departure Time</td>';
                    $time = "";
                    switch (substr($row[1], -1)) {
                        case "1":
                            $time = "07:00 AM";
                            break;
                        case "2":
                            $time = "12:00 PM";
                            break;
                        case "3":
                            $time = "06:00 PM";
                            break;
                    }
                    echo '<td>' . $row[4] . ' ' . $time . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Seat Number:</td>';
                    $seat_number = "";
                    $seat_count = 0;
                    for($i=1;$i<=40;$i++){
                        if(isset($_GET[$i])){
                            $sid = substr($row[1],0,-1).$row[0];
                            if($i<10){
                                $sid = $sid . '0'. $i;
                            }else{
                                $sid = $sid . $i;
                            }
                            $query = "select * from seat_data where SID = '$sid' and unavailable = 0 ";
                            $result = mysqli_query($db,$query);
                            if(mysqli_num_rows($result) == 1){
                                $seat_count += 1;
                                $seat_number = $seat_number . $i . ",";
                            }
                            if($seat_count % 15 ==0){
                                $seat_number = $seat_number . "\n";
                            }
                        }
                    }
                    $seat_number = substr($seat_number,0,-1);
                    $amount = $row[5] * $seat_count;
                    echo '<td>'.$seat_number.'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Total Price</td>';
                    echo '<td>'.$amount.'Ks</td>';
                    echo '</tr>';
                    echo' <input type="hidden" name="bid" value='.$_GET['bid'].'>';
                    echo' <input type="hidden" name="startCity" value='.$row[2].'>';
                    echo' <input type="hidden" name="endCity" value='.$row[3].'>';
                    echo' <input type="hidden" name="amount" value='.$amount.'>';
                    echo '<input type="hidden" name="departureTime" value="'. $row[4] . ' ' . $time .'">';
                    echo' <input type="hidden" name="seat_number" value='.$seat_number.'>';
                }
            mysqli_close($db);
            ?>
        </tbody>
        </table>
            <?php
            if(isset($_GET['confirm'])){
                echo'<button type="submit" class="btn btn-success btn-lg btn-block">Confirm</button>';
            }else{
                echo'<button type="submit" disabled class="btn btn-success btn-lg btn-block">Confirm</button>';
            }
            ?>
        </div>
     </form>
    </body>
</html>