<?php
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php
    $template=loadTemplate("mainnavigatie");
    print $template;
    $template=loadTemplate("login");
    print $template;
?>
</body>


