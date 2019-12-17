<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = "lesdag";
$pkey = $_POST["pkey"];

if ( $formname == "nieuweles_form" AND $_POST['inschrijfbutton'] == "Aanmaken" ) {
    //controle of les al bestaat
    $sql = "SELECT * FROM lesdag WHERE les_datetime='" . $_POST['les_datetime'] . "' ";
    $data = GetData($sql);

    if (count($data) > 0) {
        $_SESSION["msg"][] = "Er staat al eeen les gepland probeer op een ander moment.";
        header("Location: ../nieweles.php");
    } else {
        $sql = "INSERT INTO $tablename SET " .
            " les_grl_id=(select grl_id from groepsles2 where grl_naam = '" . htmlentities($_POST['grl_naam'], ENT_QUOTES) . "') , " .
            "les_datumtijd='" . htmlentities($_POST['les_datumtijd'], ENT_QUOTES);
        "';";
        var_dump($sql);
    }

    if (ExecuteSQL($sql)) $_SESSION["msg"][] = "Bedankt voor uw nieuwe les!";


    else {
        $_SESSION["msg"][] = "Sorry, er liep iets fout. Uw gegevens werden niet goed opgeslagen";
    }
}
?>