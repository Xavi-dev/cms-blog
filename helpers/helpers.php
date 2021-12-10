<?php 

// Function to display date 

function dateFormat($date){
    return date('d-m-Y' , strtotime($date));
}

// Function to display date with time

function dateFormatHour($date){
    return date('d-m-Y h:i:s' , strtotime($date));
}

?>

