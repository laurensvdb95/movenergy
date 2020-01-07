<?php
$no_access=false;
require_once "lib/autoload.php";
basicHead();
ShowMessages();
?>
</head>
<body>
<?php
$template= loadNav();
print $template;
$d=strtotime("today");
$datum=date("Y-m-d h:i:s", $d);
$sql= "select grl_fullname, les_datumtijd from groepsles2
inner join lesdag l on groepsles2.grl_id = l.les_grl_id
order by les_datumtijd
limit 10;";
$data = GetData($sql);
$template=loadTemplate("agenda");
?>
<div class="tabel">
    <table>
        <thead>
        <tr>
            <th>Les</th>
            <th>Tijdstip</th>
        </tr>
        </thead>
        <?php
        ReplaceContent( $data, $template);
        ?>
    </table>
</div>
</body>
