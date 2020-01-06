<?php
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
<link rel="stylesheet" href="css/login.css">
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
