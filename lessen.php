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
$sql= "select grl_fullname, les_datumtijd, les_id from groepsles2
inner join lesdag l on groepsles2.grl_id = l.les_grl_id
where grl_lid_id=  ".$_SESSION['lid']['lid_id']." ;";
$data = GetData($sql);
$template=loadTemplate("lessen");
?>
<div class="tabel">
    <table>
        <thead>
        <tr>
            <th>Les</th>
            <th>Tijdstip</th>
            <th></th>
        </tr>
        </thead>
        <?php
        ReplaceContent( $data, $template);
        ?>
    </table>
</div>
<a href="nieuweles.php">Nieuwe les</a>
</body>
