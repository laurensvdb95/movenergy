<?php
require_once "autoload.php";

$formname = $_POST["formname"];
$buttonvalue = $_POST['inschrijfbutton'];

$output="";

$sql="select les_grl_id, les_datumtijd from lesdag inner join groepsles2 g on lesdag.les_grl_id = g.grl_id where grl_naam ='".$_POST["grl_naam"]."';";
var_dump($sql);

