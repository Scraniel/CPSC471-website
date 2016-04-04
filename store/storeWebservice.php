<?php

include '../utility/databaseConnect.php';
include 'modifyStore.php';


/*
 * REQUIRES: $name
 */
if($_POST["action"] == "delete")
{
    $name = $_POST["name"];

    if(deleteStore($con, $name))
    {
        echo "Deleted store '$name' successfully!";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }

}
/*
 * REQUIRES: $name, $email, $password
 */
else if($_POST["action"] == "add")
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(addStore($con, $name, $email, $password))
    {
        echo "Successfully added store '$name'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
/*
 * REQUIRES: $name
 * OPTIONAL: $email, $password
 */
else if($_POST["action"] == "update")
{
    $updating = array();
    $name = $_POST["name"];

    if(!empty($_POST["email"]))
        $updating["email"] =  $_POST["email"];
    if(!empty($_POST["password"]))
        $updating["password"] = $_POST["password"];

    if(updateStore($con, $name, $updating))
    {
        echo "Successfully updated store '$name'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}

mysqli_close($con);