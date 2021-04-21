<html>
<head>
	<style>

		h2,h3
		{
			text-align: center;
			font-size:35px;
		}
		* 
		{
  			font-family: sans-serif;
		}		
		.table
		{
			margin-left:16%;
		}
		.cust-table 
		{
			width:80%;

 		 	border-collapse: collapse;
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
  			padding:15px 15px;
		}
		.cust-table td
		{
			padding-left: 100px;
		}
		th
		{
			background-color: #00E5AA;
			font-size: 30px;
		}
		.cust-table tbody tr:nth-of-type(odd) 
		{
  			background-image: linear-gradient(to right, lightblue , lightcyan);
		}
		.cust-table tbody tr:nth-of-type(even) 
		{
  			background-image: linear-gradient(to right, lightgreen ,lightblue);
		}
		input
		{
		 	width:50%;
		 	height: 50px;
		 	font-size: 22px;
		 	text-align: center;
		}
		#name
		{

		 	 background: transparent;
    		border: none;
		}

#sub
{

    transition: all 0.2s ease 0s;
}


#sub:hover {
	background-color: lightblue;
  box-shadow: inset 0 0 0 7px lightblue
  ;
}







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

	</style>
</head>
<body>
	<header>
        <a href='index.html'><h1>Inter-N Bank</h1></a>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="customer.php">View All Customers</a></li>
            </nav>
    </header>
	<div class='table'>
	<table class='cust-table'>
		<tr>			
			<th>Name of Customer</th>
			<th></th>
		</tr>
		<?php //localhost is server name ibank is db name
			$con=mysqli_connect("localhost","root","","ibank");
			if($con-> connect_error)
			{
				die("Connection Failed:".$con->connect_error);
			}
			$sql = "SELECT name from customer";
			$result = $con-> query($sql);

			if($result->num_rows>0)
			{
				while($row = $result->fetch_assoc())
				{
					echo "<tr><td><form action='view_cust.php' method='GET'><input name='name' type='text' id='name' value='".$row["name"]."' readonly></td><td><input id='sub' name='submit' type='submit' value='View Details'></form></td></tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "No Records Found!";
			}
			$con->close();
		?>
	</div>
</body>
</html>

