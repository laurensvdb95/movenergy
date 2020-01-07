<?php
$no_access=false;
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
<link rel="stylesheet" href="css/intra.css">
</head>
<body>
<?php
    $template= loadNav();
    print $template;
    $data = GetData("select * from lid where lid_id = ".$_SESSION['lid']['lid_id'].";");
    $template=loadTemplate("update");
    ReplaceContent( $data, $template);
?>

</body>
