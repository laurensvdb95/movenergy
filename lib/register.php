<?php

$register_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$tablename = "lid";
$pkey = $_POST["pkey"];

if ( $formname == "registration_form" AND $_POST['registerbutton'] == "Bevestigen" ) {
    //controle of gebruiker al bestaat
    $sql = "SELECT * FROM lid WHERE lid_login='" . $_POST['lid_login'] . "' ";
    $data = GetData($sql);
    if (count($data) > 0){
        $_SESSION["msg"][] = "Deze gebruiker bestaat reeds! Gelieve een andere login te gebruiken." ;
        header("Location: ../register.php");
        die;
    }

    //controle wachtwoord minimaal 8 tekens
    if (strlen($_POST["lid_password"]) < 8){
        $_SESSION["msg"][] = "Uw wachtwoord moet minstens 8 tekens bevatten!" ;
        header("Location: ../register.php");
        die;
    }

    //controle geldig e-mailadres
    if (!filter_var($_POST["lid_login"], FILTER_VALIDATE_EMAIL)){
        $_SESSION["msg"][] = "Ongeldig email formaat voor login" ;
        header("Location: ../register.php");
        die;
    }

    //wachtwoord coderen
    $password_encrypted = password_hash($_POST["lid_password"], PASSWORD_DEFAULT);


    $sql = "INSERT INTO $tablename SET " .
        " lid_naam='" . htmlentities($_POST['lid_naam'], ENT_QUOTES) . "' , " .
        " lid_lesgever='" . htmlentities($_POST['lid_lesgever'], ENT_QUOTES) . "' , " .
        " lid_voornaam='" . htmlentities($_POST['lid_voornaam'], ENT_QUOTES) . "' , " .
        " lid_geboortedatum='" . htmlentities($_POST['lid_geboortedatum'], ENT_QUOTES) . "' , " .
        " lid_straat='" . htmlentities($_POST['lid_straat'], ENT_QUOTES) . "' , " .
        " lid_huisnr='" . htmlentities($_POST['lid_huisnr'], ENT_QUOTES) . "' , " .
        " lid_stad='" . htmlentities($_POST['lid_stad'], ENT_QUOTES) . "' , " .
        " lid_postcode='" . htmlentities($_POST['lid_postcode'], ENT_QUOTES) . "' , " .
        " lid_login='" . $_POST['lid_login'] . "' , " .
        " lid_password='" . $password_encrypted . "'  ";

    if ( ExecuteSQL($sql) )
    {
        $_SESSION["msg"][] = "Bedankt voor uw registratie!" ;

        if ( ControleLoginWachtwoord( $_POST["lid_login"] , $_POST["lid_password"]) )
        {
            header("Location: ../gegevens.php");
        }
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