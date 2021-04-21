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

header
{
	background-color: blue;
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
		table
		{
			margin-left:15%;
		}
		.cust-table 
		{
			width:70%;

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
  			padding: 12px 15px;
		}
		.cust-table th
		{
			background-color: #86aaf0;
			font-size: 30px;
		}
		input
		{
		 	width:50%;
		 	height: 50px;
		 	font-size: 22px;
		 	text-align: center;
		}
		.cd,.amt-sub 	
		{
			font-size: 20px;
		}

		.amt-sub #sub,#amt
		{
			width:200px;
		}
		.amt-sub
		{
			margin-left: 23%
		}
		#amt
		{
			width:250px;
			margin-left:110%;
		}
		#sub
		{
			margin-left:110%;
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

#sname,#sacc
{
	margin-left:6%;
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
<form action='success.php' method='get'  name='form'>
	<table class='cust-table'>
		<th style='background-color: #00E5AA;font-size: 30px;'>Transferring Money To:</th>
		<tr><td class='cd'>Name of Account Holder</td><td><input autocomplete='off' name='name' type='text' id='sname'></td></tr>
		<tr><td class='cd'>Account Number</td><td><input name='accno' type='text' id='sacc'></td></tr>
	</table>
	
	<?php


		if(isset($_GET['submit_cust']))
		{
			$name=$_GET['name'];
			$email=$_GET['email'];
			$accno=$_GET['accno'];

			echo "
					<br><br>
					<table class='cust-table'>
						<th style='background-color: #00E5AA;font-size: 30px;'>Transferring Money From:</th>
						<tr><td class='cd'>Name</td><td><input  name='self_name' type='text' id='name' value='".$name."' readonly></td></tr>
						<tr><td class='cd'>Account Number</td><td><input name='self_accno' type='text' id='acc' value='".$accno."' readonly></td></tr>

					</table>
				";
		}

	?>
		<br><br>
		<table class='amt-sub'>
			<th class='cd'>Amount to Transfer</th><th><input autocomplete='off' name='amt' type='text' id='amt' placeholder='₹'></th>
			<tr>
			<th><input id='sub' name='transfer_amt' type='submit' value='Click to Transfer'></th>
		</table>
	</form>
	<body>
</html>