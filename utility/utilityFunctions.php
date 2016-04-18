<?php

    function getTable($con, $table, $qualifications = "")
    {
        $sql = "SELECT * FROM $table $qualifications";
        $result = mysqli_query($con,$sql);
        if(!$result)
        {
            echo "Query: $sql<br>";
            var_dump($_POST);
            return false;
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function getLocations($con, $store)     // gets all locations for a given store
    {
        return getTable($con, "LOCATION", "WHERE name='$store'");
    }
    
    function getContains($con, $id)     // gets all contains for given id
    {
        return getTable($con, "CONTAINS", "WHERE id='$id'");
    }
    
    function getReservations($con, $username)     // gets all contains for given id
    {
        return getTable($con, "RESERVES", "WHERE username='$username'");
    }

    function getItem($con, $id)
    {
        $result = mysqli_query($con, "SELECT * FROM ITEM WHERE id = '$id'");
        if(mysqli_num_rows($result) != 1)
            return false;
        else
            return mysqli_fetch_assoc($result);
    }


?>