<?php

function select_question(){
    global $pdo;
    $sql = "SELECT * FROM question";
    $query = $pdo -> prepare($sql);
    $query-> execute();
    return $query -> fetchAll();

}

function insert_reponse($iduser, $ident, $idquestion,$reponse, $note){
    global $pdo;

    $sql=  "INSERT INTO reponse (id_ent, id_user, id_question, reponse, note) VALUES  (:iduser, :ident, :idquestion, :reponse, :note)";
    $query= $pdo->prepare($sql);
    $query-> bindvalue(':iduser' , $iduser , PDO::PARAM_INT );
    $query-> bindvalue(':ident' , $ident , PDO::PARAM_INT );
    $query-> bindvalue(':idquestion' , $idquestion , PDO::PARAM_INT );
    $query-> bindvalue(':reponse' , $reponse , PDO::PARAM_STR );
    $query-> bindvalue(':note' , $note , PDO::PARAM_INT );
    $query-> execute();
}

