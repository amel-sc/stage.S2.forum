<?php
    require('connexion.php');

    function getAll($nom_table)
    {
        $sql = "select * from %s";
        $sql = sprintf($sql, $nom_table);
        $query = mysqli_query(dbconnect(), $sql);
        $result = [];
        while($row = mysqli_fetch_assoc($query))
        {
            $result[] = $row;
        }
        mysqli_free_result($query);

        return $result;
    }

    function getTravail($id_personne)
    {
        $sql = "select * from Travail where id_personne = %s";
        $sql = sprintf($sql, $id_personne);
        $query = mysqli_query(dbconnect(), $sql);
        $result = [];
        while($row = mysqli_fetch_assoc($query))
        {
            $result[] = $row;
        }
        mysqli_free_result($query);

        return $result;
    }
?>