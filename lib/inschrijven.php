<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = "les_lid";
$pkey = $_POST["pkey"];

if ( $formname == "registration_form" AND $_POST['registerbutton'] == "Bevestigen" ) {
//controle of gebruiker al bestaat
    /*
    $sql = "SELECT * FROM les_lid WHERE gli_lid_id='".$_SESSION['lid']['lid_id']. "' ";
    $data = GetData($sql);
    if (count($data) > 0) die("Je bent al ingeschreven voor deze les.");*/


}
?>
