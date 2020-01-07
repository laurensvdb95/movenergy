<?php
session_start();
if ($_SESSION['lid']['lid_lesgever']=="Lesgever"){
    $no_access=true;
}
else{
    session_destroy();
    header("Location: login.php");
}
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
</head>
<body>
<?php
$template= loadNav();
print $template;
$sql= "select lid_naam, lid_voornaam, lid_login from lid
inner join les_lid ll on lid.lid_id = ll.gli_lid_id
inner join lesdag l on ll.gli_les_id = l.les_id
inner join groepsles2 g on l.les_grl_id = g.grl_id
where gli_les_id = '" . $_SERVER['QUERY_STRING'] ."' and grl_lid_id= ".$_SESSION['lid']['lid_id'].";";
$data = GetData($sql);
$template=loadTemplate("inschrijvingen");
?>
<div class="tabel">
    <table>
        <thead>
        <tr>
            <th>Naam</th>
            <th>Voornaam</th>
            <th>E-mail</th>
        </tr>
        </thead>
        <?php
        ReplaceContent( $data, $template);
        ?>
    </table>
</div>
</body>
