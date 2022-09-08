<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<div>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "form");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		//
		
		// Taking all 5 values from the form data(input)
        
		$firstname = $_REQUEST['firstname'];
		$lastname = $_REQUEST['lastname'];
		$country = $_REQUEST['country'];
		$subject = $_REQUEST['subject'];
		
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO user VALUES ('$firstname',
			'$lastname','$country','$subject')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n $firstname\n $lastname\n "
				. "$country\n $subject");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</div>
</body>

</html>
