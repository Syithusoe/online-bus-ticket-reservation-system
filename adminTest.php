<?php 
$server="localhost";
$user="root";
$pwd="";
$data="bus_reservation_system";

$con=new mysqli($server,$user,$pwd,$data);

if ($con-> connect_error){
	die("Connection failed:". $con->connect_error);
}

$sql="select BID,BName,departureTime,price from bus_data";
$result= $con->query($sql);

if($result-> num_rows > 0){
	while($row=$result -> fetch_assoc()){
		echo "id=".$row["BID"]." BusName= ".$row["BName"]." Time=".$row["departureTime"]." Price=".$row["price"]."<br/>";
	}
}
else {
	echo "Data is empty";
}
$con->close();
$con=new mysqli($server,$user,$pwd,$data);

/*
<!DOCTYPE html>
<html>
<head>
	<meta name="Tables" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<style>
		*{
			box-sizing: border-box;
		}
		body{
			font-family: "Times-NewRoman",sans-serif;
		}
		.tab{
			float: left;
			border: 1px solid black;
			background-color: green;
			width: 30%;
			height: 50%;

		}
		.tab button{
			display: block;
			background-color: inherit;
			color: black;
			padding: 20px 10px;
			width: 100%;
			text-align: left;
			font-size: 22px;
		}
		.tabcontent{
			float: left;
			padding: 0px 12px;
			border: 1px solid #ccc;
			width:70%;
			height: 80%;
		}
	</style>
</head>
<body>
<h1>Hello ...</h1>
<div class="tab">
	<button class="array" onclick="openPage(event,'table1')" id="defaultOpen">Transaction</button>
	<button class="array" onclick="openPage(event,'table2')">Tacket information</button>
	<button class="array" onclick="openPage(event,'table3')">Bus data</button>

</div>

<div id="table1" class="tabcontent">
	<h1>Page1</h1>
	<h2>table query</h2>
</div>
<div id="table2" class="tabcontent">
	<h1>Page2</h1>
	<h2>table query</h2>
</div>
<div id="table3" class="tabcontent">
	<h1>Page3</h1>
	<h2>table query</h2>
</div>
<script type="text/javascript">
	document.getElementById("defaultOpen").click();
	function openPage(evt,name) {
		var i,tabcontent,tablinks;
		tabcontent=document.getElementsByClassName("tabcontent");
		for (i =0; tabcontent.length;i++){
			tabcontent[i].style.display="none";
		}
		tablinks=document.getElementsByClassName("array");
		for (i =0;tablinks.length; i++) {
			tablinks[i].className=tablinks[i].className.replace("active","");
		}
		document.getElementById(name).style.display="block";
		evt.currentTarget.className+="active";
	}

</script>
</body>
</html>
*/
?>