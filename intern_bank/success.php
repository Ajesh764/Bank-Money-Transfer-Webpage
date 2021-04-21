<html>
<head>
	<meta http-equiv="refresh" content="5;URL=customer.php">
	<style>
		p
		{
			text-align: center;
			font-size:45px;
			font-family: sans-serif;
			margin-left:400px;
			margin-right: 400px;
			margin-top: 300px;
		}
		body
		{
			background-color: #86aaff;
		}
		input
		{
			margin-left: 40%;
		 	width:20%;
		 	height: 10%;
		 	font-size: 22px;
		 	text-align: center;
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
	</style>
</head>


<body >
	<script>
	ProgressCountdown(5,'pageBeginCountdownText').
	then(value => alert('Redirecting...'));

function ProgressCountdown(timeleft,  text) {
  return new Promise((resolve, reject) => {
    var countdownTimer = setInterval(() => {
      timeleft--;
      document.getElementById(text).textContent = timeleft;

      if (timeleft <= 0) {
        clearInterval(countdownTimer);
        resolve(true);
      }
    }, 1000);
  });
}
	</script>
<span style='font-size: 18px;'> The Page will re-direct in <span id="pageBeginCountdownText">5 </span> seconds</span>
<?php

	if(isset($_GET['transfer_amt']))
	{

		$rname="";$racc="";


		$sname=$_GET['self_name'];
		$sacc=$_GET['self_accno'];
		$rname=$_GET['name'];
		$racc=$_GET['accno'];
		$amt=$_GET['amt'];
		if($rname==""||$racc=="")
		{
			echo"<p>Please Enter valid Name and Account Number</p><br>


<a href='customer.php'>
<input type='submit' value='View All Customers'>
</a>

			";

		}
		else
		{
		if($sname==$rname)
		{
			echo"<p>Transferring Money to same Account</p>
			

<a href='customer.php'>
<input type='submit' value='View All Customers'>
</a>

			";


		}
		else
		{

		$con=mysqli_connect("localhost","root","","ibank");
		if($con-> connect_error)
		{
			die("Connection Failed:".$con->connect_error);
		}

		$sql = "SELECT * from customer where accno='".$racc."'";
		$result = $con-> query($sql);
		if($result->num_rows>0)
		{
			while($row = $result->fetch_assoc())
			{
				$name_db=$row["name"];
				$acc_no_db=$row["accno"];
			}
		}
		$sql1 = "SELECT * from customer where accno='".$sacc."'";
		$result1 = $con-> query($sql1);
		if($result1->num_rows>0)
		{
			while($row = $result1->fetch_assoc())
			{
				$currbal_db=$row["currbal"];
			}
		}
		if($acc_no_db==$racc)
		{
			if($name_db==$rname)
			{
				if($amt>$currbal_db)
				{
					echo "<p>Insufficient Balance</p>


<a href='customer.php'>
<input id='sub'type='submit' value='View All Customers'>
</a>


					";
				}
				else
				{
					$result_SENDER = mysqli_query($con, "UPDATE customer SET currbal=currbal-'$amt' WHERE accno=$sacc");

					$result_RECEIVER = mysqli_query($con, "UPDATE customer SET currbal=currbal+'$amt' WHERE accno=$racc");
					
					$seql = "INSERT INTO transfer(facc,tacc,amt) VALUES (".$sacc.",".$racc.",".$amt.")";
					if ($con->query($seql) === TRUE) 
					{
  						echo "<p>Amount Transferred Succesfully!
  						".$sname."<span style='font-size:45px;'>&#8594;</span>".$rname."</p>

<a href='customer.php'>
<input id='sub'type='submit' value='View All Customers'>
</a>

  						";
					}
					else
					{
						  echo "Error: " . $sql . "<br>" . $con->error;
					}
					
				}
			}
			else
			{
				echo "<p>Account Exists but Name Incorrect</p>

<a href='customer.php'>
<input id='sub' type='submit' value='View All Customers'>
</a>


				";
			}
			
		}
		else
		{
			echo "<p>Receiver Account does not exist</p>

<a href='customer.php'>
<input id='sub'type='submit' value='View All Customers'>
</a>



			";
		}
	}

	}
}
	
?>

</body>
</html>
