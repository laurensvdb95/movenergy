<?php
session_start();
$_SESSION["head_printed"] = false;

require_once "pdo.php"; //database functies
require_once "password.php"; //password voor database
require_once "view_functions.php";      //basic_head, load_template, replacecontent...
require_once "authorisation.php";      //controle login e.d.
require_once "show_messages.php";

//redirect naar NO ACCESS pagina als de gebruiker niet ingelogd is en niet naar
//de loginpagina gaat
if ( ! isset($_SESSION['lid']) AND ! $login_form AND ! $register_form AND ! $no_access)
{
    header("Location: /movenergy/login.php");
    $_SESSION["msg"][] = "U hebt geen toegang tot deze pagina!";
}


