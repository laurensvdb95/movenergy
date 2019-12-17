<?php
require_once "lib/autoload.php";
basicHead();
ShowMessages();
var_dump($_SESSION['lid']);
?>
<link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
    if ($_SESSION['lid']['lid_lesgever']=="Lesgever"){
        $template=loadTemplate("intranav");
    } else{
        $template=loadTemplate("intranav2");
    }
    print $template;
    $data = GetData("select * from lid where lid_id = ".$_SESSION['lid']['lid_id'].";");
    $template=loadTemplate("update");
    ReplaceContent( $data, $template);
?>

</body>
