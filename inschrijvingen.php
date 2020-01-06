<?php
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
where gli_les_id = " . $_SERVER['QUERY_STRING'] . " ; ";
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
