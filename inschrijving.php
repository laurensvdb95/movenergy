<?php

require_once "lib/view_functions.php";
basicHead();
?>
<link rel="stylesheet" href="css/inschrijving.css">
</head>
<body>
<?php
$template=loadTemplate("navigatie");
print $template;
$template=loadTemplate("inschrijving");
print $template;
?>
</body>
