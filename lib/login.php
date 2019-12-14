<?php
$login_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "login_form" AND $buttonvalue == "Log in" )
{
    if ( ControleLoginWachtwoord( $_POST['lid_login'], $_POST['lid_password'] ) )
    {
        $_SESSION["msg"][] = "Welkom, " . $_SESSION['lid']['lid_voornaam'] . "!" ;
        header("Location: ../gegevens.php");

    }
    else
    {
        $_SESSION["msg"][] = "Sorry! Verkeerde login of wachtwoord!";
        header("Location:../login.php");
    }
}
else
{
    $_SESSION["msg"][] = "Foute formname of buttonvalue";

}
?>