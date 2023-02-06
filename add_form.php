<html>
<head>
	<title>Add Data</title>
	<style>
		body{
			font-family: sans-serif;
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
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=file] {
  width: 100%;
  background-color: #f3f3f3;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover{
	background-color: #3e8e41;
}
input[type=submit]:hover {
  background-color: #45a049;
}
td{
	display: block;
}
	</style>
</head>

<body>
	<a href="index.php"><button>Home</button></a>
	<h1 style='color:gray;padding:20px 0px;font-family: sans-serif;text-align:center;border:2px solid #4CAF50;margin-left: 40%;margin-right: 40%'> ADD USER </h1>
	<br/><br/>

	<form action="add.php" method="post" name="form1" enctype="multipart/form-data">
		<table width="30%" border="0" style="margin:0 auto;">
			<tr> 
				<td>Employee Number</td>
				<td><input type="text" name="employeeNumber"></td>
			</tr>
			<tr> 
				<td>First Name</td>
				<td><input type="text" name="firstName"></td>
			</tr>
			<tr> 
				<td>Last Name</td>
				<td><input type="text" name="lastName"></td>
			</tr>
			<tr> 
				<td>Extension</td>
				<td><input type="text" name="extension"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td>Office Code</td>
				<td>				
					<select name="officeCode" id="officeCode">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
					</select>
				</td>
			</tr>
			<tr> 
				<td>Job Title</td>
				<td><input type="text" name="jobTitle"></td>
			</tr>
			<tr>
				<td>Profile Picture</td>
				<td><input type="file" name="profilePic" id="profilePic"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

