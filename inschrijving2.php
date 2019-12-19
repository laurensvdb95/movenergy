<?php
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
<link rel="stylesheet" href="css/inschrijving.css">
</head>
<body>
<?php
if ($_SESSION['lid']['lid_lesgever']=="Lesgever"){
    $template=loadTemplate("intranav");
} else{
    $template=loadTemplate("intranav2");
}
print $template;
$sql= "select les_datumtijd from lesdag inner join groepsles2 g on lesdag.les_grl_id = g.grl_id where grl_fullname='".$_POST['grl_fullname']."'limit 3;";
$data= GetData($sql);
$template = LoadTemplate("inschrijving2");
print ($template);
$template =LoadTemplate("options");
ReplaceContent( $data, $template);
$template = LoadTemplate("inschrijving3");
print ($template);
?>
</body>

