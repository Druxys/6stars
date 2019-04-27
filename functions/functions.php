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




function validationText($error,$data,$min,$max,$key,$empty = true){
    if(!empty($data)){
        if(strlen($data)<$min){
            $error[$key]= 'Minimum '.$min .' caractères';
        }
        elseif (strlen($data)>$max) {
            $error[$key]= 'Maximum '.$max.' caractères';
        }
    }
    else{
        if($empty){
            $error[$key]='Veuillez renseigner ce champ';
        }
    }
    return $error;
}
