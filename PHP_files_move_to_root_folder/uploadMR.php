
<?php
/*
    This page gets the information from the form and stores it in the MySQL database.
*/

//This is the DB connection information
include 'configdb.php';
$conn=mysqli_connect("$host","$username","$password","$database") or die ('Cannot connect to db');

//Get the entries from the form
$Customer_idCustomer=mysqli_real_escape_string($conn, $_REQUEST['Customer_idCustomer']);
$meter=mysqli_real_escape_string($conn, $_REQUEST['meter']);
$date= mysqli_real_escape_string($conn, $_REQUEST['date']);

//Sql statement
$sql = "INSERT INTO meterreading VALUES (NULL,'$meter','$date','$Customer_idCustomer')";


//Insert the Data
if(mysqli_query($conn, $sql)){
    echo "<h1 align='center'>Meter ".$meter." Submitted Successfully!</h1>";
    } else{
    echo "<h1>ERROR: Could not execute the command $sql.".mysqli_error($conn)."</h1>";
    } 

?>