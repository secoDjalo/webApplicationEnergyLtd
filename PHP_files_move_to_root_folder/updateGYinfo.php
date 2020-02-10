<?php

// this file handles the update of information in the database

include 'ConfigDB.php';

$conn=mysqli_connect("$host","$username","$password","$database") or die ('Cannot connect to db');

    //Get the entries from the form
    $name=mysqli_real_escape_string($conn, $_REQUEST['name']);
    $dateOfBirth= mysqli_real_escape_string($conn, $_REQUEST['dateOfBirth']);
    $address=mysqli_real_escape_string($conn, $_REQUEST['address']);
    $postCode=mysqli_real_escape_string($conn, $_REQUEST['postCode']);
    $city= mysqli_real_escape_string($conn, $_REQUEST['city']);
    $email=mysqli_real_escape_string($conn, $_REQUEST['email']);
    $mobileNumber=mysqli_real_escape_string($conn, $_REQUEST['mobileNumber']);
    $idCustomer=mysqli_real_escape_string($conn, $_REQUEST['idCustomer']);

    //creates an sql command to update data in the data base

$updateQuery = "UPDATE customer SET name='$name', dateOfBirth='$dateOfBirth', address='$address', postCode='$postCode', city='$city',
email='$email', mobileNumber='$mobileNumber' WHERE idCustomer='$idCustomer'";


    //Update the Data
    if(mysqli_query($conn, $updateQuery)){
        echo "<br><br><br><h1 align='center'> Details Updated Successfully </h1>";
        } else{
        echo "<h1 align='center'>ERROR: Could not execute the command ", $updateQuery.mysqli_error($conn)."</h1>";
        }
    mysqli_close($con);  //closes connection

?>
