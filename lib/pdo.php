<?php
function GetConnection()
{
    global $dbhost, $dbname, $dbuser, $dbpassword;
    require_once "password.php";
    $arr_connection = GetConnectionData();
    $dbhost = $arr_connection['dbhost'];
    $dbname = $arr_connection['dbname'];
    $dbuser = $arr_connection['dbuser'];
    $dbpassword = $arr_connection['dbpassword'];
    $dsn = "mysql:host=$dbhost;dbname=$dbname";
    $pdo = new PDO($dsn, $dbuser,$dbpassword);
    return $pdo;
}

function GetData( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);
    $stm->execute();

    $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function ExecuteSQL( $sql )
{
    $pdo = GetConnection();

    $stm = $pdo->prepare($sql);

    if ( $stm->execute() ) return true;
    else return false;
}

