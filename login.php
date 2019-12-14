<?php
require_once "lib/autoload.php";
basicHead();
?>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php
    $template=loadTemplate("navigatie");
    print $template;
    $template=loadTemplate("login");
    print $template;
?>
</body>


