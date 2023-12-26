
<!DOCTYPE html>
<html lang="en">
<head>
    <title> ACE Express </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/takeout.css">
    <link rel="stylesheet" href="css/print.css">

</head>
<body>
    
        <div class="col-md-8 print">
            <div class="float-container">
                <div><h2>Ticket Information</h2></div>

            </div>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td>Operator:</td>  
                            <td>ACE Express</td>
                        </tr>
                        <tr>
                            <td>Bus ID:</td>
                            <td><?php echo $_GET['bid']?></td>
                        </tr>
                        <tr>
                            <td>Route:</td>
                            <td><?php echo $_GET['startCity']; ?> - <?php echo $_GET['endCity']; ?> </td>
                        </tr>
                        <tr>
                            <td>Departure Time</td>
                            <td><?php echo $_GET['departureTime']?></td>
                        </tr>
                        <tr>
                            <td>Seat Number:</td>
                            <td><?php echo $_GET['seat_number']?></td>
                        </tr>
                        <tr>
                            <td>Total Price</td>
                            <td><?php echo $_GET['amount']?>Ks</td>
                        </tr>
                    </tbody>
        
                 </table>
         </div>
                <hr>
                <h4 class="print"><i>Important Information</i></h4>
                Each passenger is allowed once carry-on luggage.<br>
                <span class="print" style="color:red;"><em>*** Ticket is not refundable ***</em></span>
                <hr>
                <div class="print" style="text-align: center;"><h5>Thank for using our service, ACE Express</h5></div>

                </div>
		<a href="#!" class="button" style="text-decoration: none;">
			Download Ticket
		</a>
        <a href="index.php" style="text-decoration: none;">Return Home</a>
                
    
    </div>
    
</body>
</html>
<script src="css/print.js"></script>


