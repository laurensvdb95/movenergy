<?php
$login_form = true;
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['loginbutton'];

if ( $formname == "login_form" AND $buttonvalue == "Log in" )
{
    if ( ControleLoginWachtwoord( $_POST['lid_login'], $_POST['lid_password'] ) )
    {
        header("Location: ../gegevens.php");
        $_SESSION["msg"][] = "Welkom, " . $_SESSION['lid']['lid_voornaam'] . "!" ;
    }
    else
    {
        header("Location:../login.php");
        $_SESSION["msg"][] = "Sorry! Verkeerde login of wachtwoord!";
    }
}
else
{
    $_SESSION["msg"][] = "Foute formname of buttonvalue";

}
?>