<?php
session_start();
?>

<?php
error_reporting(E_ERROR);
include '../utility/databaseConnect.php';
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

// Number for results into $count

$count = mysqli_num_rows($result);

// Look for 1 valid result
if ($count == 1) {

    $_SESSION['username'] = $username;

    echo "<script> alert(\"$username logged in successfully! Press OK to continue\") </script>";

    // check if user logged in is a customer or a store and redirect accordingly
    //echo "<script> location.href = \"../homeLoggedInCustomer.php\"; </script>";
    echo "<script> location.href = \"../homeLoggedInStore.php\"; </script>";
    //header("location:companion-finder.php"); // Redirect page upon successful authentication
}
else if (!isset($_SESSION["username"]))
{
    echo "Please Login Below";
} else {
    echo "<script> alert(\"Invalid Username or Password. Please try again\") </script>";
    echo "<script> location.href = \"../login.html\"; </script>";
}

?>