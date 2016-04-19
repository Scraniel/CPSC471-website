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
    
    function getReservationsStore($con, $name)     // gets all contains for given id
    {
        return getTable($con, "RESERVES", "WHERE name='$name'");
    }

    function getItem($con, $id)
    {

        return getTable($con, "ITEM", "WHERE id = '$id'")[0];
    }

    function getStoreItems($con)
    {
        $sql = 'SELECT i.name, i.id, i.description, i.made_in, i.picture, s.name AS sname FROM ITEM as i, STORE as s, CONTAINS as c WHERE i.id = c.id AND c.name = s.name ORDER BY s.name';
        $result = mysqli_query($con,$sql);
        if(!$result)
        {
            echo "Query: $sql<br>";
            var_dump($_POST);
            return false;
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


?>