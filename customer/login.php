<?php
session_start();
?>

<?php
error_reporting(E_ERROR);
include '../utility/databaseConnect.php';

if($_POST["action"] == "customer")
{
// Extracting employee creds from Login page (input names)
    $username = $_POST['username'];
    $password = $_POST['password'];

// Safe input manipulation
    $username = stripslashes($username);
    $password = stripslashes($password);

    $sql = "SELECT *
          FROM customer 
          WHERE (username='$username') AND (password ='$password');";

    $result = mysqli_query($con,$sql);
    
    $count = mysqli_num_rows($result);
}
else if($_POST["action"] == "store")
{
    $username = $_POST['name'];
    $password = $_POST['password'];

    $sqlStore = "SELECT *
          FROM store 
          WHERE (name='$username') AND (password ='$password');";

    $resultStore = mysqli_query($con, $sqlStore);

// Number for results into $count
    $countStore = mysqli_num_rows($resultStore);
}

// Look for 1 valid result
if ($count == 1) {

    $_SESSION['username'] = $username;

    echo "<script> alert(\"$username logged in successfully as customer! Press OK to continue\") </script>";

    // check if user logged in is a customer or a store and redirect accordingly
    //echo "<script> location.href = \"../homeLoggedInCustomer.php\"; </script>";
    echo "<script> location.href = \"../homeLoggedInCustomer.php\"; </script>";
    //header("location:companion-finder.php"); // Redirect page upon successful authentication
}
else if ($countStore == 1) {
    $_SESSION['storename'] = $username;
    
    echo "<script> alert(\"$username logged in successfully as a store! Press OK to continue\") </script>";
    
    echo "<script> location.href = \"../homeLoggedInStore.php\"; </script>";
}
else {
    echo "<script> alert(\"Invalid Username or Password. Please try again\") </script>";
    echo "<script> location.href = \"../login.html\"; </script>";
}

?>