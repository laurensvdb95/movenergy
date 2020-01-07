<?php
require_once "autoload.php";
$lid= $_SESSION['lid']['lid_id'];
$datumtijd= GetData("select les_datumtijd from lesdag
inner join les_lid ll on lesdag.les_id = ll.gli_les_id
where gli_les_id = " . $_SERVER['QUERY_STRING'] . " and gli_lid_id=" . $lid . ";");


    $sql= "delete from les_lid where gli_les_id=" . $_SERVER['QUERY_STRING'] . " and gli_lid_id=" . $lid . ";";
    var_dump($sql);


    if ( ExecuteSQL($sql) )
    {
        $_SESSION["msg"][] = "De les is verwijderd!" ;
        header("Location: ../mijnreservaties.php");
    }
