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
    $sql= "select grl_fullname, les_datumtijd, gli_les_id from groepsles2 
    inner join lesdag l on groepsles2.grl_id = l.les_grl_id
    inner join les_lid ll on l.les_id = ll.gli_les_id
    where gli_lid_id = ".$_SESSION['lid']['lid_id']." order by les_datumtijd;";
    $data = GetData($sql);
    $template=loadTemplate("mijnreservaties");
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
    </body>
