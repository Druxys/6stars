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


    function writeComment($idUser, $content, $idEnt)
    {
        global $pdo;
        $sql= "INSERT INTO avis(comment, id_user, id_ent) VALUES (:comment,:id_user,:id_ent)";
        $query=$pdo->prepare($sql);
        $query->bindValue(':comment',$content,PDO::PARAM_STR);
        $query->bindValue(':id_user',$idUser,PDO::PARAM_INT);
        $query->bindValue(':id_ent',$idEnt,PDO::PARAM_INT);
        $query->execute();
    }

    function getInfoCharQuestion($question)
    {
        global $pdo;
        $sql = "SELECT valeur_retour FROM question WHERE question = :question AND valeur_retour = 'varchar'";
        $query = $pdo -> prepare($sql);
        $query->bindValue(':question',$question,PDO::PARAM_STR);
        $query-> execute();
        return $query -> fetchAll();
    }

    function getInfoIntQuestion($question)
    {
        global $pdo;
        $sql = "SELECT valeur_retour FROM question WHERE question = :question AND valeur_retour = 'int'";
        $query = $pdo -> prepare($sql);
        $query->bindValue(':question',$question,PDO::PARAM_STR);
        $query-> execute();
        return $query -> fetchAll();
    }

    function getInfoRadioQuestion($question)
    {
        global $pdo;
        $sql = "SELECT valeur_retour FROM question WHERE question = :question AND valeur_retour = 'radio'";
        $query = $pdo -> prepare($sql);
        $query->bindValue(':question',$question,PDO::PARAM_STR);
        $query-> execute();
        return $query -> fetchAll();
    }

    function getInfoCheckBoxQuestion($question)
    {
        global $pdo;
        $sql = "SELECT valeur_retour FROM question WHERE question = :question AND valeur_retour = 'checkbox'";
        $query = $pdo -> prepare($sql);
        $query->bindValue(':question',$question,PDO::PARAM_STR);
        $query-> execute();
        return $query -> fetchAll();
    }


