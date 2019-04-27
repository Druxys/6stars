<?php
function br(){
    echo '<br>';
}
//Affiche un tableau de façon claire
function debug($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
function clean($key){
    return trim(strip_tags($_POST[$key]));
}