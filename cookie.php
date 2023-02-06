<?php
$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])) {
  $cookie_set = "Cookie named '" . $cookie_name . "' is not set!";
} else {
  $cookie_set = "Cookie '" . $cookie_name . "' is set!<br>";
  $cookie_value = "Value is: " . $_COOKIE[$cookie_name];
}
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
<h1 style='color:gray;padding:20px 0px;font-family: sans-serif;text-align:center;border:2px solid #4CAF50;margin-left: 40%;margin-right: 40%'> COOKIES </h1>
    <p><b><i><?php echo $cookie_set; ?></i></b></p>
    <p><b><i><?php echo $cookie_name; ?></i></b></p>
</body>
</html>