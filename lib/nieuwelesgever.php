<?php
$register_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = "groepsles2";


if ( $formname == "lesgever_form" AND $_POST['bevestigenbutton'] == "Bevestigen" ) {

    //controle of gebruiker bestaat
    $sql = "SELECT * FROM lid WHERE lid_login='" . $_POST['lid_login'] . "' ";
    $data = GetData($sql);
    if (count($data) <= 0) {
        echo("Deze gebruiker bestaat niet! Gelieve een andere login te gebruiken.");
    }

    $sql = "update lid, groepsles2 SET lid_lesgever ='Lesgever', grl_lid_id = lid_id
where lid_login='". $_POST["lid_login"] ."' and grl_fullname='". $_POST["grl_fullname"] ."';";

    if ( ExecuteSQL($sql) )
    {
        $_SESSION["msg"][] = "Bedankt voor uw registratie!" ;
        header("Location: ../lesgevers.php");
        }
    else
    {
        $_SESSION["msg"][] = "Sorry, er liep iets fout. Uw gegevens werden niet goed opgeslagen" ;
    }
}
else{
    echo ("er liep iets fout");
}
?>