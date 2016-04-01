<?php
include 'databaseConnect.php';

//TODO: put this in a webservice file and return an array instead of printing stuff

$table = $_POST["table"];
$result = mysqli_query($con,"SELECT * FROM ".$table);

echo "<h2>Viewing $table table:</h2>";
echo "<table>";
while ($row = mysqli_fetch_array($result)) {
    echo '<tr>';
    foreach($row as $field => $value) {
        if(!is_int($field))
            echo "<td>$field -> $value</td>";
    }
    echo '</tr>';
}
echo "</table>";
mysqli_close($con);
?>