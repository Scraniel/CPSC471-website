<?php
// Start the session
session_start();
?>

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
        echo "<script> alert(\"Thank you for registering, $username! Press OK to continue\") </script>";
        $_SESSION["username"] = $username;
        // same thing... check whether they are customer or store
        // echo "<script> location.href = \"../homeLoggedInStore.php\"; </script>";
        echo "<script> location.href = \"../homeLoggedInCustomer.php\"; </script>";
        
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
/*
 * REQUIRES: $username from session
 * OPTIONAL: $email, $password
 */
else if($_POST["action"] == "update")
{
    $updating = array();
    $username = $_SESSION["username"];

    if(!empty($_POST["email"]))
        $updating["email"] =  $_POST["email"];
    if(!empty($_POST["password"]))
        $updating["password"] = $_POST["password"];

    if(updateCustomer($con, $username, $updating))
    {
        echo "<script> alert(\"Info changed! Press OK to continue\") </script>";
        echo "<script> location.href = \"../manageAccount.php\"; </script>";
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
else if($_POST["action"] == "reserve")
{
    $username = $_POST["username"];
    $id = $_POST["id"];
    $address = $_POST["address"];
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];

    if(reserveItem($con, $username, $id, $address, $name, $quantity))
    {
        echo "Successfully reserved item with ID '$id' from the '$address' location of '$name'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
else if($_POST["action"] == "cancelReservation")
{
    $username = $_POST["username"];
    $id = $_POST["id"];
    $address = $_POST["address"];
    $name = $_POST["name"];

    if(cancelReservation($con, $username, $id, $address, $name))
    {
        echo "Successfully cancelled reservation of item with ID '$id' from the '$address' location of '$name'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}



mysqli_close($con);