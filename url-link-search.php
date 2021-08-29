<?php
function HandleHeaderLine( $curl, $header_line ) {
    echo "<br>YEAH: ".$header_line; // or do whatever
    return strlen($header_line);
}

$folders = Array();
function search($url){
    

    
    $content=file_get_contents($url);
    $subString = preg_split("/<\/a>/",$content);
    foreach ( $subString as $val ){
        if( strpos($val, "<a href=") !== FALSE ){
            $val = preg_replace("/.*<a\s+href=\"/sm","",$val);
            $val = preg_replace("/\".*/","",$val);
            if(strpos($val, ".jpg")){
                print $url.$val."\n";
            }else{
                print $url.$val."\n";
            }
        
        }
    }
    
}

search("http://10.8.0.116:8000/");

?>