<?php
require_once "lib/autoload.php"; //yyy
basicHead();
ShowMessages();
$login_form=true;
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


