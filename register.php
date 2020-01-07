<?php
$register_form= true;
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
<link rel="stylesheet" href="css/intra.css">
</head>
<body>
<?php
    $template=loadTemplate("mainnavigatie");
    print $template;
    $template=loadTemplate("registreer");
    print $template;
?>

</body>
