<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = "lesdag";
$pkey = $_POST["pkey"];
$sql= "select grl_id from groepsles2 where grl_lid_id =".$_SESSION['lid']['lid_id'].";";
$les= GetData($sql);
$content=GetLes($les);
$datumtijd= $_POST['les_datumtijd'];

if ( $formname == "nieuweles_form" AND $_POST['inschrijfbutton'] == "Aanmaken" ) {
    //controle of les al bestaat
    $sql = "SELECT * FROM lesdag WHERE les_datumtijd='" . $datumtijd . "' ";
    $data = GetData($sql);
    var_dump($data);

    if (count($data) > 0) {
        $_SESSION["msg"][] = "Er staat al eeen les gepland probeer op een ander moment.";
        header("Location: ../nieuweles.php");

    } else {
        $sql = "INSERT INTO $tablename SET " .
            " les_grl_id='" . $content . "' , " .
            " les_datumtijd='" . $datumtijd . "';";
        var_dump($sql);
    }

    if (ExecuteSQL($sql)){
        $_SESSION["msg"][] = "Bedankt voor uw nieuwe les!";
        header("Location: ../nieuweles.php");
    }

    else {
        $_SESSION["msg"][] = "Sorry, er liep iets fout. Uw gegevens werden niet goed opgeslagen";
        header("Location: ../nieuweles.php");
    }
}
?>