<?php
    
    //this file retrieves information form the data base

    include 'ConfigDB.php';
    $con=mysqli_connect("$host","$username","$password","$database");
    
    //Set Variables from post and SQL Statement
    $idNumber=$_POST["idNumber"];

    $i=0;   //counts the records found
    
    $sql="SELECT * FROM customer where idCustomer=\"$idNumber\"";
    
    $result = mysqli_query($con,$sql);

    echo "<br><br><br><table align='center' cellspacing='8' cellpadding='6'>";

    //Writes the result
    while($row = mysqli_fetch_array($result))
    {
        echo '<form name="updateInfo" method="post" action="updateGYinfo.php">'; 
        $i++;  //increments the records
       

            echo '<tr>';
            echo '<td> <b>Name </b><br><input type ="text" name="name" value="' .$row['name']. '" /> </td>';
            echo '<td> <b> Date Of Birth </b><br> <input type="text" name="dateOfBirth" value="' .$row['dateOfBirth']. '" /> </td>';
            echo '<td> <b>Address </b><br> <input type="text" name="address" value="' .$row['address']. '"/> </td>';
            echo '<td> <b>Post Code </b><br> <input type="text" name="postCode" value="' .$row['postCode']. '"/> </td>';
            echo '<td> <b>City </b><br> <input type="text" name="city" value="' .$row['city']. '"/> </td>';
            echo '<td> <b>Email </b><br> <input type="text" name="email" value="' .$row['email']. '"/> </td>';
            echo '<td> <b>Mobile Number</b><br> <input type="text" name="mobileNumber" value="' .$row['mobileNumber']. '"/> </td>';
            echo '</tr>';
            echo "<br><br> <tr>";
                echo "<td> </td> <td> </td> <td> </td> <td> </td> <td> </td> <td> </td>";
                echo "<td align='right'><input type='submit' name='update' value='Update' style='background-color: #7fd3f9; 
                color: white; padding: 14px 20px; margin: 8px 0; border: none;  cursor: pointer;
                font-size: 24px; border-radius: 25px; font-weight: bold'/> </td>";
            echo "</tr>";
            echo '</form>';
    }
        echo "</table>";
        mysqli_close($con);

        //if not record is found meaning if the user does not exist, a message is printed
        if ($i==0){
            echo"<br><br><h1 align='center'> Your ID was not found in the Database </h1>";
        }

    ?>