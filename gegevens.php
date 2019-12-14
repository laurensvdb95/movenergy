<?php
require_once "lib/autoload.php";
basicHead();
?>
<link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
    $data = GetData("select * from lid where lid_id like '".$_SERVER['QUERY_STRING']."';");
    $template=loadTemplate("update");
    ReplaceContent( $data, $template);
?>

</body>
