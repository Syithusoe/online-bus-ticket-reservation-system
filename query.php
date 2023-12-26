<?php
    $db = mysqli_connect('localhost', 'root', '', 'bus_reservation_system');
    for($i=1;$i<=10;$i++){
        if($i<10){
            $sid = 'MY1010'.$i;
        }else{
            $sid = 'MY101'.$i;
        }
        $query = "insert into 'seat_data' ('SID','BID','SNumber','unavailable') values($sid,101,$i,0)";
        mysqli_query($db,$query);
        mysqli_error($db);

    }
    mysqli_close($db);
    ?>
