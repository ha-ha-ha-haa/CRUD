<?php
//including the database connection file
include_once(".\config\config.php");

$result = mysqli_query($mysqli, "SELECT * FROM employees;"); // using mysqli_query instead
$query_reportsTo = mysqli_query($mysqli, "SELECT CONCAT(B.firstName, ' ', B.lastName) 'Name', B.jobTitle 'Title' FROM employees A JOIN employees B ON (A.reportsTo = B.employeeNumber)");
$query_address = mysqli_query($mysqli, "SELECT city, state, country, addressLine1, addressLine2 FROM offices o join employees e ON (e.officeCode = o.officeCode)");
?>

<html>
<head>	
	<title>Homepage</title>
</head>
<style>
	td a{
		color:#000000;text-decoration:none;padding:10px;
	}
	button{
		
		background-color: #4CAF50;
		border: none;
		color: white;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		float: left;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
	}
	.styled-table{
		width:100%;
    font-size: 0.9em;
    font-family: sans-serif;
	}
	.styled-table thead tr {
    background-color: #4CAF50;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
	background-color: #f8fcf8;
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
.styled-table tbody tr:hover{
	background-color: #e9f5e9;
}
button:hover{
	background-color: #3e8e41;
}
td a:hover{
	background-color: #c6e6c8;
}

</style>
<body>

<a href="./add_form.php">
	<button>Add New Data</button>
</a>
<a href="./cookie.php">
	<button>Cookies</button>
</a>
<a href="./session.php">
	<button style = "float:none">Session info</button>
</a>
<br>
<h1 style='color:gray;padding:20px 0px;font-family: sans-serif;text-align:center;border:2px solid #4CAF50;margin-left: 40%;margin-right: 40%'> User Table </h1>
<table class="styled-table">
	<thead>
		<tr class="header">
			<th>Picture</th>
			<th>Name</th>
			<th>Email</th>
			<th>Job Title</th>
			<th>Reports To</th>
			<th>Emp Office Address</th>
			<th>Update</th>
		</tr>
	</thead>
	<?php 
	echo "<tbody>";
		while($res = mysqli_fetch_array($result)) { 		
			echo "<tr>";
			if($res['picPath'] != NULL){
				echo "<td> <a href=edit.php?id=$res[employeeNumber]>";
				echo "<img src='".$res['picPath']."' alt='Employee Picture' width = '80px' height = '80px'>";
				echo "</a></td>";
			}
			else{
				echo "<td> <a href='edit.php?id=$res[employeeNumber]'>";
				echo "<img src='https://dreamvilla.life/wp-content/uploads/2017/07/dummy-profile-pic.png' alt='Default Picture' width = '80px' height = '80px'>";
				echo "</a></td>";
			}
			echo "<td>".$res['firstName']." ".$res['lastName']."</td>";
			echo "<td>".$res['email']."</td>";
			echo "<td>".$res['jobTitle']."</td>";
			$rep = mysqli_fetch_array($query_reportsTo);
			if($rep != NULL){
				echo "<td>".$rep['Name'].", ".$rep['Title']."</td>";	
			}
			else{
				echo "<td>NULL</td>";	
			}
			$add = mysqli_fetch_array($query_address);
			echo "<td>".$add['addressLine1'].", ".$add['addressLine2'].", ".$add['city'].", ".$add['state'].", ".$add['country']."</td>";
			echo "<td><a href=\"edit.php?id=$res[employeeNumber]\">Edit</a> | <a href=\"delete.php?id=$res[employeeNumber]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		echo "</tbody>";
		$mysqli->close();
	?>
	</table>
</body>
</html>