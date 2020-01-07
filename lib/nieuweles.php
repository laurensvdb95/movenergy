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

    //controle of de les in het verleden ligt
    $d=strtotime("today");
    $datum=date("Y-m-d h:i:s", $d);
    if ($datumtijd < $datum){
        $_SESSION["msg"][] = "Deze datum ligt in het verleden, kies een datum in de toekomst";
        header("Location: ../nieuweles.php");
        die;
        }

    //controle of les al bestaat
    $sql = "SELECT * FROM lesdag WHERE les_datumtijd='" . $datumtijd . "' ";
    $data = GetData($sql);
    if (count($data) > 0) {
        $_SESSION["msg"][] = "Er staat al eeen les gepland probeer op een ander moment.";
        header("Location: ../nieuweles.php");
        die;

    } else {
        $sql = "INSERT INTO $tablename SET " .
            " les_grl_id='" . $content . "' , " .
            " les_datumtijd='" . $datumtijd . "';";
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