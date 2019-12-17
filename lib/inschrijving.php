<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = "les_lid";
$pkey = $_POST["pkey"];
$lid= $_SESSION["lid"]["lid_id"];

if ( $formname == "inschrijving_form" AND $_POST['inschrijfbutton'] == "Bevestigen" ) {
//controle of gebruiker al bestaat
    /*
    $sql = "SELECT * FROM les_lid WHERE gli_lid_id='".$_SESSION['lid']['lid_id']. "' ";
    $data = GetData($sql);
    if (count($data) > 0) die("Je bent al ingeschreven voor deze les.");*/
    $sql= "select les_id from lesdag where les_datumtijd='". $_POST["les_datumtijd"] ."';";
    $les= GetData($sql);

    $content=GetLes($les);

    $sql= "INSERT INTO les_lid SET gli_les_id=".$content.", gli_lid_id=".$lid.";";
    if ( ExecuteSQL($sql) )
    {
        $_SESSION["msg"][] = "Bedankt voor uw reservatie!" ;
        header("Location: ../inschrijving.php");

    }

}

?>
