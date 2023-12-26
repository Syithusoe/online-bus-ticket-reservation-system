<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Booking Form HTML Template</title>




	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/bus-search.css" />





</head>

<body>

	<div id="booking" class="section">
              <!--------------animation section---------------------->
    <div class="animation-area">
    <ul class="box-area">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        </ul>
    </div>
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="form-header">
							<h1>Make your reservation</h1>
						</div>
						<form action="select-bus.php" method="get">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Leaving From</span>
										<select name="startCity" class="form-control">
                                        <option value>Select Location</option>
                                        <option value="Mandalay">Mandalay</option>
                                             <option name="startCity" value="Yangon">Yangon</option>
                                             <option name="startCity" value="Meiktila">Meiktila</option>
                                        </select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Going To</span>
										<select id="" name="endCity" class="form-control">
                                        <option value>Select Location</option>
                                        <option name="endCity" value="Mandalay">Mandalay</option>
                                             <option name="endCity" value="Yangon">Yangon</option>
                                             <option name="endCity" value="Meiktila">Meiktila</option>
                                        </select>
									</div>
								</div>
							</div>
                            <div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<span class="form-label">Depature Date</span>
										<input required name="departureTime" type="date" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-btn">
								<input type="submit" class="submit-btn" value="search">
							</div>
						</form>


					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
