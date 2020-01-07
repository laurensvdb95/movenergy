<?php
$no_access=false;
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php
$template= loadNav();
print $template;
$d=strtotime("today");
$datum=date("Y-m-d h:i:s", $d);
$sql= "select les_id, les_datumtijd from lesdag
inner join groepsles2 g on lesdag.les_grl_id = g.grl_id
where grl_fullname= '".$_POST['grl_fullname']."' and les_datumtijd>'".$datum."'
group by les_id, les_datumtijd
limit 5;";
$data= GetData($sql);
$template = LoadTemplate("inschrijving2");
print ($template);
$template =LoadTemplate("options");
ReplaceContent( $data, $template);
$template = LoadTemplate("inschrijving3");
print ($template);
?>
</body>

