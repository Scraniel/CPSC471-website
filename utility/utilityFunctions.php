<?php

    function getTable($con, $table)
    {
        $sql = "SELECT * FROM ".$table;
        $result = mysqli_query($con,$sql);
        if(!$result)
        {
            echo "Query: $sql<br>";
            var_dump($_POST);
            return false;
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
