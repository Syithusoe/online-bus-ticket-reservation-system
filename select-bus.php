<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Ace Express</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

      <link rel="stylesheet" href="css/select-bus.css">

  
</head>

<body>
<?php
    $db = mysqli_connect('localhost', 'root', '', 'bus_reservation_system');
    if(isset($_GET['startCity']) && isset($_GET['endCity'])) {
        $startCity = mysqli_real_escape_string($db,$_GET['startCity']);
        $endCity = mysqli_real_escape_string($db,$_GET['endCity']);
        $departureTime = mysqli_real_escape_string($db,$_GET['departureTime']);
        $query = "select * from bus_data where startCity='$startCity' and endCity='$endCity' and departureTime='$departureTime'";
        $results = mysqli_query($db, $query);
        while ($row = mysqli_fetch_array($results)) {
            $time ="";
            switch (substr($row[1],-1)){
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
            echo '<div class="container-fluid">
                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-horizontal">
                                <div class="img-square-wrapper">
                                    <img class="" src="img/scania.jpg" alt="Card image cap" width="300" height="180">
                                </div>
                                <div class="card-body">';
            echo '<h4 class="card-title">'.$time.' Scania(Standard)</h4>';
            echo '<p class="card-text">'.$row[2].' - '.$row[3].'<span class="float">'.$row[5].' MMK</span></p>';
            echo '<p class="card-text">Departure Time : '.$row[4].','.$time;
            echo '<p class="card-text">Duration: '.$row[6];
            echo '<form method="get" action = "select-seat.php">
                <input type="hidden" name="bid" value="'.$row[0].'">';
            echo '<button type="submit" class="btn btn-outline-primary float">Select Seat</button>
            </form>';
            echo '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }

    }
    mysqli_close($db);
 ?>


</body>

</html>
