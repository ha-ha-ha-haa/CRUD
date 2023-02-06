<?php
    session_start();
    $user = $_SESSION["username"];
    $emp_num = $_SESSION["empNo"];
    $email=$_SESSION["email"];

?>
<html>
<head>
    <title>Session</title>
    <style>
        body{
            background-color: #f2f2f2;}
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
    button:hover{
	background-color: #3e8e41;
}
p  {
    text-align: center;
  color: gray;
  font-family: sans-serif;
  font-size: 120%;
}
    </style>
</head>
<body>
<a href="index.php"><button>Go Back</button></a>
<h1 style='color:gray;padding:20px 0px;font-family: sans-serif;text-align:center;border:2px solid #4CAF50;margin-left: 40%;margin-right: 40%'> SESSION INFO </h1>
    <p>User : <b><i><?php echo $user; ?></i></b></p>
    <p>User number: <b><i><?php echo $emp_num; ?></i></b></p>
    <p>Email : <b><i><?php echo $email; ?></i></b></p>

    
    
</body>
</html>