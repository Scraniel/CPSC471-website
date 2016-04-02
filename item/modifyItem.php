<?php
    function addItemPicture($fileToUpload)
    {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($fileToUpload["name"]);
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($fileToUpload["tmp_name"]);
            if($check == false) {
                return 1;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            return 2;
        }
        // Check file size (limit is 500kb atm)
        if ($fileToUpload["size"] > 500000) {
            return 3;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            return 4;
        }
        // if everything is ok, try to upload file

        if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
            return 0;
        } else {
            return 5;
        }
    }

    function addItem($con, $id, $picture, $description, $name, $made_in)
    {
        $sql = "INSERT INTO ITEM (id, picture, description, name, made_in) VALUES ('$id', '$picture', '$description', '$name', '$made_in')";
        if (!mysqli_query($con,$sql))
            return false;
        else
            return true;
    }

?>