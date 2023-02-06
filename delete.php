
<?php
//including the database connection file
include(".\config\config.php");

//getting id of the data from url
$employeeNumber = $_GET['id'];

if ($employeeNumber == 1002)
{
    echo '<script type="text/javascript">';
    echo 'if (confirm("You cant delete the CEO MF")) {
        document.location = "index.php";
    }else{
        document.location = "index.php";
    }';
    echo '</script>';
}
else
{
    $sql = "UPDATE customers SET salesRepEmployeeNumber = NULL WHERE salesRepEmployeeNumber = $employeeNumber;UPDATE employees SET reportsTo = 1002 WHERE reportsTo = $employeeNumber;DELETE FROM employees WHERE employeeNumber = $employeeNumber";
    //deleting the row from table
    $result = mysqli_multi_query($mysqli, $sql);
    
    $mysqli->close();
    
    //redirecting to the display page (index.php in our case)
    header("Location:index.php");
}

?>

