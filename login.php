<?php
session_start();
?>

<?php
error_reporting(E_ERROR);
include '/utility/databaseConnect.php';
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
    
    echo "<script> location.href = \"../homepage.php\"; </script>";
    //header("location:companion-finder.php"); // Redirect page upon successful authentication
}
else if (!isset($_SESSION["username"]))
{
    echo "Please Login Below";
} else {

    echo "Invalid Username or Password";
    //echo "<script> location.href = \"index.php\"; </script>";
}

?>


<!DOCTYPE html>
<html>
<body>

<div class="login-block">
    <h1>Login</h1>
    <form name ="login" style="display : inline" action="login.php" method="post" onsubmit = "return validateForm()">
        <input type="text" name="username" placeholder="Username" id="username" />
        <input type="password" name="password" placeholder="Password" id="password" />
        <button> Submit </button>

    </form> 
</div>

<script>    
    function validateForm() {
    var username = document.forms["login"]["email"].value;
    var password = document.forms["login"]["hashed_pass"].value;
    if (username == null || username.replace(/^\s+/, '').replace(/\s+$/, '') == "") {
        alert("Name must be filled out");
        return false;
    }
    else if (password == null || password ==""){
        alert("Password must be filled out");
        return false;
    }
}

</script>


</body>
</html>