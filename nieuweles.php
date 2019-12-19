<?php
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
    <link rel="stylesheet" href="css/inschrijving.css">
    </head>
    <body>
    <?php
    $template= loadNav();
    print $template;
    $template=loadTemplate("nieuweles");
    print $template;
    ?>
    </body>
<?php
