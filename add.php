<html>
<head>
	<title>Add Data</title>
</head>
<body>
<?php
//including the database connection file
include_once(".\config\config.php");

$filled = 0;

$dir = "uploads/";	//specifies the directory where the file is going to be placed
$picPath = $dir . basename($_FILES["profilePic"]["name"]);	//specifies the path of the file to be uploaded
$uploadOk = 1;	//flag for checking file integrity
$imageFileType = strtolower(pathinfo($picPath,PATHINFO_EXTENSION));	//holds the file extension of the file

if(isset($_POST['Submit'])) {	
	$firstName = mysqli_real_escape_string($mysqli, $_POST['firstName']);
	$lastName = mysqli_real_escape_string($mysqli, $_POST['lastName']);
	$extension = mysqli_real_escape_string($mysqli, $_POST['extension']);
	$employeeNumber = mysqli_real_escape_string($mysqli, $_POST['employeeNumber']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$office = mysqli_real_escape_string($mysqli, $_POST['officeCode']);
	$jobTitle = mysqli_real_escape_string($mysqli, $_POST['jobTitle']);

	$cookie_name = "user";
	$cookie_value = $firstName." ".$lastName;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

	session_start();
	$_SESSION["username"] = $firstName. " " .$lastName;
	$_SESSION["empNo"] = $employeeNumber;
	$_SESSION["email"] = $email;
		
	// checking empty fields
	if(empty($firstName) || empty($lastName) || empty($extension) || empty($employeeNumber) || empty($office) || empty($jobTitle) ||  empty($email)) {
				
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
		$filled = 0;
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else {	// if all the fields are filled (not empty) 
		$filled = 1;
	}

	//checking image integrity
	if($_FILES["profilePic"]["name"] != NULL){
		$check = getimagesize($_FILES["profilePic"]["tmp_name"]);
		if($check !== false) {
	 		$uploadOk = 1;
	 		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}else{
				move_uploaded_file($_FILES['profilePic']["tmp_name"],$picPath);
			}
		} else {
	 	 echo "File is not an image.";
		  $uploadOk = 0;
		}
	}
	
	if($filled == 1 && $uploadOk == 1){
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO employees(employeeNumber, lastName, firstName, extension, email, officeCode, jobTitle,picPath) VALUES('$employeeNumber','$lastName','$firstName','$extension','$email','$office','$jobTitle','$picPath')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
	
	$mysqli->close();
}
?>
</body>
</html>
