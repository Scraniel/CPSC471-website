<?php
include '../utility/databaseConnect.php';
include 'modifyItem.php';

    //TODO: All 'die' statements should be replaced with proper error handling
    //       Sidenote: We should do input validation on the html side too

    function handlePictureAdd($returnValue, $filename)
    {
        // NOTE: Error handling here is dubious at best.
        switch($returnValue)
        {
            case 0:
                echo "File '$filename' uploaded successfully!";
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
    }

if($_POST["action"] == "delete")
{
    $id = $_POST["id"];

    if(deleteItem($con, $id))
    {
        echo "Deleted item with ID '$id' successfully!";
    }
    else
    {
        echo "Error: " . mysqli_error($con);
    }

}
else if($_POST["action"] == "add")
{
    $fileToUpload = $_FILES["fileToUpload"];
    $id = $_POST["id"];
    $description = $_POST["description"];
    $name = $_POST["name"];
    $made_in = $_POST["made_in"];

    $pictureResult = addItemPicture($fileToUpload);
    handlePictureAdd($pictureResult, $fileToUpload["name"]);

    if(addItem($con, $id, $fileToUpload["name"], $description, $name, $made_in))
    {
        echo "Successfully added item '$name'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
else  if($_POST["action"] == "update")
{
    $updating = array();
    $id = $_POST["id"];

    // TODO: HERE IS WHERE TO ADD REAL ERROR HANDLING IF ITEM DOESN'T EXIST
    if(!checkExists($con, $id))
        die("Error: No item with ID $id exists.");

    if(!empty($_POST["name"]))
        $updating["name"] =  $_POST["name"];
    if(!empty($_POST["description"]))
        $updating["description"] = $_POST["description"];
    if(!empty($_POST["made_in"]))
        $updating["made_in"] = $_POST["made_in"];
    if(!empty($_FILES["fileToUpload"]["name"]))
    {
        $pictureResult = addItemPicture($_FILES["fileToUpload"]);
        handlePictureAdd($pictureResult, $_FILES["fileToUpload"]["name"]);
        $picturePath = getItemPicturePath($con, $id);
        if(!$picturePath)
            die("Error getting the old file");
        chmod($picturePath, 0777);
        if(!unlink($picturePath))
           die("There was an error removing the old picture for the item with ID $id");

        $updating["picture"] = $_FILES["fileToUpload"]["name"];
    }

    if(updateItem($con, $id, $updating))
    {
        echo "Successfully updated item with ID '$id'!";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }
}
