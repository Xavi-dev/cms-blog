<?php 

// Formatejar la data sense hora //

function dateFormat($date){
    return date('d-m-Y' , strtotime($date));
}

// Formatejar la data amb hora //

function dateFormatHour($date){
    return date('d-m-Y h:i:s' , strtotime($date));
}

?>

