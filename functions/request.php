<?php

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