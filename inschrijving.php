<?php
require_once "lib/autoload.php";
basicHead();
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
$template=loadTemplate("inschrijving");
print $template;
?>
</body>
