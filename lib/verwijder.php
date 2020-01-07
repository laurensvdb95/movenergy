<?php
require_once "autoload.php";
$lid= $_SESSION['lid']['lid_id'];

    $sql= "delete from les_lid where gli_les_id=" . $_SERVER['QUERY_STRING'] . " and gli_lid_id=" . $lid . ";";


    if ( ExecuteSQL($sql) )
    {
        $_SESSION["msg"][] = "De les is verwijderd!" ;
        header("Location: ../mijnreservaties.php");
    }
