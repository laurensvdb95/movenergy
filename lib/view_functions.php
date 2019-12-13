<?php
/* Deze functie laadt de <head> sectie */
function BasicHead()
{
    print LoadTemplate("basic_head");

    $_SESSION["head_printed"] = true;
}

/* Deze functie laadt de opgegeven template */
function LoadTemplate( $name )
{
    if ( file_exists("$name.html") ) return file_get_contents("$name.html");
    if ( file_exists("templates/$name.html") ) return file_get_contents("templates/$name.html");
    if ( file_exists("../templates/$name.html") ) return file_get_contents("../templates/$name.html");
}

/* Deze functie voegt data en template samen en print het resultaat */

function ReplaceContent( $data, $template_html )
{
    foreach ( $data as $row )
    {
        //replace fields with values in template
        $content = $template_html;
        foreach($row as $field => $value)
        {
            $content = str_replace("@@$field@@", $value, $content);
        }

        print $content;
    }
}

function ReplaceImages($row, $template_html)
{
    $content = $template_html;
    foreach ($row as $field=> $value)
    {
        $content = str_replace("@@$field@@", $value, $content);
    }
    print $content;
}

/* Deze functie voegt data en template samen en print het resultaat */
function ReplaceContentOneRow( $row, $template_html )
{
        //replace fields with values in template
        $content = $template_html;
        foreach($row as $field => $value)
        {
            $content = str_replace("@@$field@@", $value, $content);
        }

    return $content;
}

function loadSub()
{
    $template=loadTemplate("navigatie");
    print $template;
    /*$data = GetData("select * from groepsles2 where grl_naam like '".$_SERVER['QUERY_STRING']."';");*/
    $data = GetData("select * from images2 inner join groepsles2 g on images2.img_grl_id = g.grl_id where grl_naam like '".$_SERVER['QUERY_STRING']."';");
    $template = LoadTemplate("subpage");
    ReplaceContent( $data, $template);
}