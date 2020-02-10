<?php
    // this file handles the submission of payment to the database

    //This is the DB connection information
    include 'configdb.php';
    $conn=mysqli_connect("$host","$username","$password","$database") or die ('Cannot connect to db');

    //Get the entries from the form
    $date=mysqli_real_escape_string($conn, $_REQUEST['date']);
    $Customer_idCustomer= mysqli_real_escape_string($conn, $_REQUEST['Customer_idCustomer']);
    $cardNumber=mysqli_real_escape_string($conn, $_REQUEST['cardNumber']);
    $threeDigit=mysqli_real_escape_string($conn, $_REQUEST['threeDigit']);
    $expireDate= mysqli_real_escape_string($conn, $_REQUEST['expireDate']);
    $Bill_idBill=mysqli_real_escape_string($conn, $_REQUEST['Bill_idBill']);

    $sql = "INSERT INTO payment VALUES (NULL,'$date','$Customer_idCustomer','$cardNumber','$threeDigit','$expireDate','$Bill_idBill')";


    //Insert the Data
    if(mysqli_query($conn, $sql)){
        echo "<br><br><br><h1 align='center'> Payment Registered Successfully <br> Please do not refresh the page as 
        it may result in the payment to be registered twice!!! </h1>";
        } else{
        echo "<h1 align='center'>ERROR: Could not execute the command $sql.".mysqli_error($conn)."</h1>";
        } 

        mysqli_close($con);  //closes connection
?>