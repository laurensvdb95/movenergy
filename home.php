<?php
$no_access=true;
require_once "lib/autoload.php";
basicHead();
?>
<meta charset="utf-8">
<link rel="stylesheet" href="css/home.css">
<script src="js/script.js" defer></script>
<body>
<?php
    $template=loadTemplate("mainnavigatie");
    print $template;
    $template=loadTemplate("home");
    print $template;
?>
</body>


