<?php
function ControleLoginWachtwoord( $login, $paswd )
{
    //gebruiker opzoeken ahv zijn login (e-mail)
    $sql = "SELECT * FROM lid WHERE lid_login='" . $login . "' ";
    $data = GetData($sql);
    if ( count($data) == 1 )
    {
        $row = $data[0];
        //password controleren
        if ( password_verify( $paswd, $row['lid_password'] ) ) $login_ok = true;
    }

    if ( $login_ok )
    {
        session_start();
        $_SESSION['lid'] = $row;
        var_dump($_SESSION['lid']);
        return true;
    }


    return false;
}