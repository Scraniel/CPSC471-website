<?php
include '../utility/databaseConnect.php';
include 'modifyCustomer.php';

if($_POST["action"] == "delete")
{
    $username = $_POST["username"];
    if(deleteCustomer($con, $username))
    {
        echo "Deleted user '$username' successfully!";
    }
    else 
    {
        echo "Error: " . mysqli_error($con);
    }

}
else if($_POST["action"] == "add")
{
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(addCustomer($con, $username, $email, $password))
    {
        echo "Successfully added user '$username'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
else if($_POST["action"] == "update")
{
    $updating = array();
    $username = $_POST["username"];

    if(!empty($_POST["email"]))
        $updating["email"] =  $_POST["email"];
    if(!empty($_POST["password"]))
        $updating["password"] = $_POST["password"];

    if(updateCustomer($con, $username, $updating))
    {
        echo "Successfully updated user '$username'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}

mysqli_close($con);