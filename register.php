<?php
require_once "lib/autoload.php";
basicHead();
?>
<link rel="stylesheet" href="css/register.css">
</head>
<body>
<?php
    $template=loadTemplate("mainnavigatie");
    print $template;
    $template=loadTemplate("registreer");
    print $template;
?>

</body>
