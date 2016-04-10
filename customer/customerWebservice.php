<?php
include '../utility/databaseConnect.php';
include 'modifyCustomer.php';

/*
 * REQUIRES: $username
 */
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
/*
 * REQUIRES: $username, $email, $password
 */
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
/*
 * REQUIRES: $username
 * OPTIONAL: $email, $password
 */
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
else if($_POST["action"] == "subscribe")
{
    $username = $_POST["username"];
    $name = $_POST["name"];
    $emailNotifications = !empty($_POST["emailNotifications"]) ? true : false;

    if(addSubscription($con, $username, $name, $emailNotifications))
    {
        echo "Successfully subscribed '$username' to '$name'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }

}
else if($_POST["action"] == "unsubscribe")
{
    $username = $_POST["username"];
    $name = $_POST["name"];

    if(deleteSubscription($con, $username, $name))
    {
        echo "Successfully unsubscribed '$username' from '$name'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
else if($_POST["action"] == "toggleNotifications")
{
    $username = $_POST["username"];
    $name = $_POST["name"];

    if(toggleNotifications($con, $username, $name))
    {
        echo "Successfully turned off email notifications from '$name' for '$username'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}



mysqli_close($con);