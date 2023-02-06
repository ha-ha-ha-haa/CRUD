<?php
// including the database connection file
include_once(".\config\config.php");

if(isset($_POST['update'])){    

    $dataEntered = 0;

    $dir = "uploads/"; //specifies the directory where the file is going to be placed
    $picPath = $dir . basename($_FILES["profilePic"]["name"]);   //specifies the path of the file to be uploaded
    
    move_uploaded_file($_FILES['profilePic']["tmp_name"],$picPath);
    $firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
    $extension = mysqli_real_escape_string($mysqli, $_POST['extension']);
    $employeeNumber = mysqli_real_escape_string($mysqli, $_POST['employeeNumber']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $office = mysqli_real_escape_string($mysqli, $_POST['officeCode']);
    $jobTitle = mysqli_real_escape_string($mysqli, $_POST['jobTitle']);
        
    
    // checking empty fields
    if(empty($firstName) || empty($lastName) || empty($extension) || empty($employeeNumber) || empty($office) || empty($jobTitle) ||  empty($email)) {
        $_GET['id'] = $employeeNumber;  
        if(empty($firstName)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
        if(empty($lastName)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
        if(empty($extension)) {
            echo "<font color='red'>Extension field is empty.</font><br/>";
        }
        if(empty($employeeNumber)) {
            echo "<font color='red'>Employee Number field is empty.</font><br/>";
        }
        if(empty($office)) {
            echo "<font color='red'>Office Code field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($jobTitle)) {
            echo "<font color='red'>Job Title is empty.</font><br/>";
        }
        $dataEntered = 0;
    } else {    
        $dataEntered = 1;
    }
    if($dataEntered == 1){
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE employees SET lastName='$lastName', firstName='$firstName', extension='$extension', 
        email='$email', officeCode=$office, jobTitle='$jobTitle', picPath = '$picPath' WHERE employeeNumber=$employeeNumber");
        
        $mysqli->close();
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>

<?php
//getting id from url
$employeeNumber = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM employees WHERE employeeNumber=$employeeNumber");

while($res = mysqli_fetch_array($result)){
    $firstName = $res['firstName'];
    $lastName = $res['lastName'];
    $extension = $res['extension'];
    $email = $res['email'];
    $officeCode = $res['officeCode'];
    $jobTitle = $res['jobTitle'];
}
$mysqli->close();
?>

<html>
<head>  
    <title>Edit Data</title>
    <style>
		body{
			font-family: sans-serif;
            background-color: #f2f2f2;
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
    <h1 style='color:gray;padding:20px 0px;font-family: sans-serif;text-align:center;border:2px solid #4CAF50;margin-left: 40%;margin-right: 40%'> EDIT USER </h1>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php"  enctype="multipart/form-data">
    <table width="30%" border="0" style="margin:0 auto;">
			<tr> 
                <td>Employee Number</td>
                <td><input type="text" name="employeeNumber" value="<?php echo $employeeNumber;?>"></td>
            </tr>
            <tr> 
                <td>First Name</td>
                <td><input type="text" name="firstName" value="<?php echo $firstName;?>"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="lastName" value="<?php echo $lastName;?>"></td>
            </tr>
            <tr> 
                <td>Extension</td>
                <td><input type="text" name="extension" value="<?php echo $extension;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr> 
            <td>Office Code</td>
				<td>				
					<select name="officeCode" id="officeCode" value="<?php echo $officeCode;?>">
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
                <td><input type="text" name="jobTitle" value="<?php echo $jobTitle;?>"></td>
            </tr>
            <tr>
                <td>Profile Picture</td>
                <td><input type="file" name="profilePic" id="profilePic"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="employeeNumber" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
