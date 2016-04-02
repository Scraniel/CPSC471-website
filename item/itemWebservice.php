<?php
include '../utility/databaseConnect.php';
include 'modifyItem.php';

if($_POST["action"] == "add")
{
    $fileToUpload = $_FILES["fileToUpload"];
    $id = $_POST["id"];
    $description = $_POST["description"];
    $name = $_POST["name"];
    $made_in = $_POST["made_in"];

    $pictureResult = addItemPicture($fileToUpload);

    // NOTE: Error handling here is dubious at best.
    switch($pictureResult)
    {
        case 0:
            echo "File '".$fileToUpload["name"]."' uploaded successfully!";
            break;
        case 1:
            die( "Error: File chosen is not an image.");
            break;
        case 2:
            die( "Error: File already exists.");
            break;
        case 3:
            die( "Error: File exceeds the limit of 500kb.");
            break;
        case 4:
            die( "Error: Only JPG, JPEG, PNG & GIF files are allowed.");
            break;
        case 5:
            die("Error: An unknown error occurred when uploading.");
            break;
    }
    echo "<br>";

    if(addItem($con, $id, $fileToUpload["name"], $description, $name, $made_in))
    {
        echo "Successfully added item '$name'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}