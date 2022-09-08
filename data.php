<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";
	
// connect the database with the server
$conn = new mysqli($servername,$username,$password,$dbname);
	
	// if error occurs
	if ($conn -> connect_errno)
	{
	echo "Failed to connect to MySQL: " . $conn -> connect_error;
	exit();
	}

	$sql = "select * from user";
	$result = ($conn->query($sql));
	//declare array to store the data of database
	$row = [];

	if ($result->num_rows > 0)
	{
		// fetch all data from db into array
		$row = $result->fetch_all(MYSQLI_ASSOC);
	}
?>

<!DOCTYPE html>
<html>
<style>
	
    table,td,tr {
        
        padding: 10px;
        margin: 5px;
        text-align: center;
    }
    
</style>

<body>
	<table >
		<thead>
			<tr>
                <th>Id</th>
				<th>firstname</th>
				<th>lastname</th>
                <th>country</th>
				<th>subject</th>
			</tr>
		</thead>
		<tbody style="border: 1px solid black">
			<?php
			if(!empty($row))
			foreach($row as $rows)
			{
			?>
            
			<tr style="border: 1px solid black">
            
                <td><?php echo $rows['id']; ?></td>
				<td><?php echo $rows['firstname']; ?></td>
				<td><?php echo $rows['lastname']; ?></td>
				<td><?php echo $rows['country']; ?></td>
                <td><?php echo $rows['subject']; ?></td>
                </div>    
			</tr>

            
			<?php } ?>
		</tbody>
	</table>
</body>
</html>

<?php
	mysqli_close($conn);
?>
