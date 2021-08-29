<?php

function search($url){    
    $content=file_get_contents($url);
    $subString = preg_split("/<\/a>/",$content);
    foreach ( $subString as $val ){
        if( strpos($val, "<a href=") !== FALSE ){
            $val = preg_replace("/.*<a\s+href=\"/sm","",$val);
            $val = preg_replace("/\".*/","",$val);
            echo $url.$val . "\n";
        
        }
    }    
}

search("input your URL here");

?>
