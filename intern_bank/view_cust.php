<html>

<head>
	<style>

p {
    line-height: 20px;
    margin-bottom: 20px;
}
h1 {
    font-family: 'Crete Round', serif;
    font-weight: bold;
    color: #444;
    font-size: 45px;
    margin-bottom: 20px;
}
a {
    text-decoration: none;
    color: #444;
}
a:hover {
    color: blue;
}
header {
    height: 120px;
}
header h1 {
    float: left;
    margin-top: 32px;
}
header h1 .color {
    color: #02b8dd;
}
header nav {
    float: right;
}
header nav ul li {
    float: left;
    display: inline-block;
    margin-top: 50px;
}
header nav ul li a {
    color: #444;
    text-transform: uppercase;
    font-weight: bold;
    display: block;
    margin-right: 20px;
}
body
{
	background-image: linear-gradient(to right, #81D8D0 ,lightgreen);

}





		h2,h3
		{
			text-align: center;
			font-size:35px;
		}
		* 
		{
  			font-family: sans-serif;
		}		
		.cust-table 
		{
			width:70%;

 		 	border-collapse: collapse;
  			text-align: center;
  			vertical-align: middle;
  			font-size: 0.9em;
  			min-width: 400px;
  			border-radius: 5px 5px 0 0;
  			overflow: hidden;
  			box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
		}	
		.cust-table th,
		.cust-table td 
		{
  			padding: 12px 15px;
		}
		th
		{
			background-color: #00E5AA;
			font-size: 30px;
		}
		input
		{
		 	width:100%;
		 	height: 50px;
		 	font-size: 18px;
		 	text-align: center;
		}
		input:focus {outline: none;}
		.table
		{
			margin-left:22%;
		}
		#name,#email,#accno
		{

		background: transparent;
    		border: none;
    	}

#sub
{
	background-color: lightcyan;
    transition: all 0.2s ease 0s;
}


#sub:hover {
	background-color: lightblue;
  box-shadow: inset 0 0 0 7px lightblue
  ;
}
h3
 { 
 	color: black; font-family: 'Raleway',sans-serif; 
 	font-size:40px; font-weight: 800; line-height: 40px; 
 	margin: 0 0 24px; text-align: center; 
 }

	</style>
</head>
<body>
<header>
        <a href='index.html'><h1>Inter-N Bank</h1></a>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="customer.php">View All Customers</a></li>
            </ul>
           </nav>
    </header>

<h3 >Account to Pay From Selected</h3>
<?php
if(isset($_GET['submit']))
{
	$name=$_GET['name'];
	
	$con=mysqli_connect("localhost","root","","ibank");
	if($con-> connect_error)
	{
		die("Connection Failed:".$con->connect_error);
	}
	
	
	$sql = "SELECT * from customer where name='".$name."'";
	$result = $con-> query($sql);

	if($result->num_rows>0)
	{
		echo "<form action='transfer.php' method='get'><div class='table'><table class='cust-table'><th>Name</th><th>Email</th><th>Account Number</th>";
		while($row = $result->fetch_assoc())
		{
			echo "<tr><td><input name='name' type='text' id='name' value='".$row["name"]."' readonly></td><td><input name='email' type='text' id='email' value='".$row["email"]."' readonly></td></td><td><input name='accno' type='text' id='accno' value='".$row["accno"]."' readonly></td></tr>";
		}
		echo "<tr><td></td><td><input name='submit_cust' type='submit' id='sub' value='Transfer Money'></td><td></td></tr></table></div></form>";

	}
	else
	{
		echo "No Record Found!";
	}
}

?>

</body>
</html>