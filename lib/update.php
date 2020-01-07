<?php

require_once "autoload.php";
$tablename = "lid";

if ($_POST["savebutton"] == "Save") {
    $sql_body = array();

    $sql = "SELECT * FROM lid WHERE lid_login='" . $_POST['lid_login'] . "' ";
    $data = GetData($sql);
    if (count($data) > 0) die("Deze login bestaat reeds! Gelieve een andere login te gebruiken.");

    foreach ($_POST as $field => $value) {
        if ($field <> "lid_id" AND $field <> "savebutton") {
            $sql_body[] = " $field = '" . htmlentities($value, ENT_QUOTES) . "' ";
        }
    }

    $password_encrypted = password_hash($_POST["lid_password"], PASSWORD_DEFAULT);

    $sql = "UPDATE $tablename SET " .
        " lid_naam='" . htmlentities($_POST['lid_naam'], ENT_QUOTES) . "' , " .
        " lid_voornaam='" . htmlentities($_POST['lid_voornaam'], ENT_QUOTES) . "' , " .
        " lid_geboortedatum='" . htmlentities($_POST['lid_geboortedatum'], ENT_QUOTES) . "' , " .
        " lid_straat='" . htmlentities($_POST['lid_straat'], ENT_QUOTES) . "' , " .
        " lid_huisnr='" . htmlentities($_POST['lid_huisnr'], ENT_QUOTES) . "' , " .
        " lid_stad='" . htmlentities($_POST['lid_stad'], ENT_QUOTES) . "' , " .
        " lid_postcode='" . htmlentities($_POST['lid_postcode'], ENT_QUOTES) . "' , " .
        " lid_login='" . $_POST['lid_login'] . "' , " .
        " lid_password='" . $password_encrypted . "' "."WHERE lid_id=".$_SERVER['QUERY_STRING'].";";
    echo $sql;

    ExecuteSQL($sql);
    header("Location: ../gegevens.php");
    $_SESSION["msg"][] = "Gegevens zijn gewijzigd";
}

else{
    echo "Er liep iets mis";
}
