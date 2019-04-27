<?php



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
