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
$template=loadTemplate("inschrijving");
print $template;
?>
</body>
