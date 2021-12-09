<?php 

// Formatejar la data sense hora //

function dateFormat($date){
    return date('d-m-Y' , strtotime($date));
}

// Formatejar la data amb hora //

function dateFormatHour($date){
    return date('d-m-Y h:i:s' , strtotime($date));
}

function cutText($text, $limit=250){
    $text = trim($text);
    $text = strip_tags($text);
    $size = strlen($text);
    $result = '';
    if($size <= $limit){
        return $text;
    }else{
        $text = substr($text, 0, $limit);
        $words = explode(' ', $text);
        $result = implode(' ', $words);
        $result .= '...';
    }
    return $result;
}
?>

