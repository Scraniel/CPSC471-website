<?php
include 'databaseConnect.php';

//TODO: put this in a webservice file and return an array instead of printing stuff

$table = $_POST["table"];
$sql = "SELECT * FROM ".$table;
$result = mysqli_query($con,$sql);
if(!$result)
{
    echo "Query: $sql<br>";
    var_dump($_POST);
    die("Error: ".mysqli_error($con));
}

echo "<h2>Viewing $table table:</h2>";
echo "<table>";
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    foreach($row as $field => $value) {
        if(!is_int($field))
        {
            echo "<td><b>$field</b> ->";
            if($field == "picture")
            {
                echo "<img src='../item/uploads/$value' alt='$value' style='width:304px;height:228px;'>";
            }
            else
            {
                echo "$value";
            }
        }

    }
    echo '</tr>';
}
echo "</table>";
mysqli_close($con);
?>