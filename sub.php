<?php
require_once "lib/autoload.php";

basicHead();
?>
<link rel="stylesheet" href="css/subpagina.css">
</head>
<body>
<?php
    $template=loadTemplate("mainnavigatie");
    print $template;
    /*$data = GetData("select * from groepsles2 where grl_naam like '".$_SERVER['QUERY_STRING']."';");*/
    $data = GetData("select * from images2 inner join groepsles2 g on images2.img_grl_id = g.grl_id where grl_naam like '".$_SERVER['QUERY_STRING']."';");
    $template = LoadTemplate("subpage");
    ReplaceContent( $data, $template);
?>
</body>


