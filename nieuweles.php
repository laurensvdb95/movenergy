<?php
require_once "lib/view_functions.php";
basicHead();
ShowMessages();
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
    $template=loadTemplate("nieuweles");
    print $template;
    ?>
    </body>
<?php
