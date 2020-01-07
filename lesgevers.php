<?php
session_start();
if ($_SESSION['lid']['lid_lesgever']=="Admin"){
    $no_access=true;
}
else{
    session_destroy();
    header("Location: login.php");
}
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
$template=loadTemplate("lesgevers");
print $template;
?>
</body>
