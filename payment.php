<?php

session_start();

if(isset($_GET['submit'])){
    $db = mysqli_connect('localhost', 'root', '', 'bus_reservation_system');
    $bid=$_GET['bid'];
    $seat=$_GET['seat_number'];
    $seat=explode(',',$seat);

    foreach ($seat as $s){
        $qry="UPDATE seat_data SET unavailable=1 WHERE SNumber=$s AND bid=$bid";
        $result=mysqli_query($db,$qry);

    }

//add data to ticket_data table
    $query = "SELECT * FROM ticket_data ORDER BY TID DESC LIMIT 1";
    $result = mysqli_query($db,$query);
    $id = 0;
    if($row = mysqli_fetch_array($result)){
        $id = $row[0] + 1;
    }

    $name = $_SESSION['username'];
    $start = $_GET['startCity'];
    $end = $_GET['endCity'];
    $snumber = $_GET['seat_number'];
    $time = $_GET['departureTime'];
    $amount = $_GET['amount'];

    $cardNumber = $_GET['cardNumber'];
    $cvc = $_GET['cvc'];
    $query = "select * from bank_data where cardNumber = '$cardNumber' and cardCvc = $cvc";
    $result = mysqli_query($db,$query);

    if(mysqli_num_rows($result)>0){
        $balance='';

        foreach ($result as $r){
            $balance=$r['amount'];
        }
        if($balance>$amount) {

            $qry = "INSERT INTO ticket_data values($id,'$name','$start','$end','$snumber','$time',$amount)";
            mysqli_query($db, $qry);
            $update_amount = 0;
//            if ($row = mysqli_fetch_array($result)) {
//                $update_amount = $row[3] - $amount;
//            }
            foreach($result as $res){
                $update_amount = $res['amount'] - $amount;
            }
            $qry = "update bank_data set amount = $update_amount where cardNumber = $cardNumber and cardCvc=$cvc";
            mysqli_query($db, $qry);

            $query = "select * from transaction_data order by trxid desc limit 1";
            $result = mysqli_query($db, $query);
            $trxid = 0;
            if ($row = mysqli_fetch_array($result)) {
                $trxid = $row[0] + 1;
            }
            $query = " insert into transaction_data values($trxid,'$cardNumber','ACE',$amount)";
            mysqli_query($db, $query);
            header('Location:takeout.php?bid=' . $bid . '&startCity=' . $start . '&endCity=' . $end . '&departureTime=' . $time . '&seat_number=' . $snumber . '&amount=' . $amount . '');
        }
        else{
            echo '<script>alert("Balance not enough")</script>';

        }
    }
    else{
        echo "<script>alert('Invalid credit number')</script>";

    }
    mysqli_close($db);


}

?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>ACE Express</title>
  
  
  
      <link rel="stylesheet" href="css/payment.css">

  
</head>

<body>

  <div class="container">
  
  <div class="card-body">
    
    <div class="breadcrumb">    
      <div class="active">Payment Method</div>
    </div>
    
    <div class="payment">
      
      <div class="creditcard">
        <div class="thecard">
          <div class="top-card">
            <div class="circle"></div>
            <div class="card-title">
             ACE Bank &nbsp; &nbsp;  VISA
            </div>
          </div>
          <div class="card-info">
            <div class="card-number">
            4 0 6 2 &nbsp;&nbsp; 6 2 5 5 &nbsp;&nbsp; 9 7 9 6 &nbsp;&nbsp; 7 2 5 7
            </div>
            <div class="exp-date">
              VALID TILL : 12 / 2023
            </div>
            <div class="card-holder">
              SYI THU SOE
            </div>
          </div>
        </div>
      </div>
    
      <div class="form">
        <form action="payment.php" method="get">
          <label for="cardnumber">Card Number</label>
          <input type="text" name="cardNumber" id="cardnumber" placeholder="4062 6255 9796 7257" required>
          
          
          <label for="exp">Expiration Date</label>
          <div class="date">
              <select name="month" id="month">
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
              </select>
              <select name="Year">
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2024">2025</option>
                <option value="2024">2026</option>
                <option value="2024">2027</option>
              </select>
            </div>
          <div class="small">
            <div class="cvc">
              <label for="cvc">CVC</label>
              <input type="text" name="cvc" id="cvc" maxlength="3" size="4" placeholder="123" required>
            </div>
              <?php


              echo' <input type="hidden" name="bid" value='.$_GET['bid'].'>';
              echo' <input type="hidden" name="startCity" value='.$_GET['startCity'].'>';
              echo' <input type="hidden" name="endCity" value='.$_GET['endCity'].'>';
              echo' <input type="hidden" name="amount" value='.$_GET['amount'].'>';
              echo '<input type="hidden" name="departureTime" value="'. $_GET['departureTime'].'">';
              echo' <input type="hidden" name="seat_number" value='.$_GET['seat_number'].'>';
              ?>
            <p>Three or four digits, usually found on the back of the card</p>
          </div>
            <button type="submit" name="submit">Proceed</button>
        </form>
      </div>
      
    </div>
    
  </div>
  
</div>
  
  

</body>

</html>
