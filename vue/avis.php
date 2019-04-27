<?
include('../functions/functions.php');
include('../functions/request.php');

$error=array();
// Prototype : variable en dur
$id = 1;
$idEnt = 1;

if( !empty($_POST['submitted']) )
{
    //Champ commentaire
    $comment=trim(strip_tags($_POST['commentaire']));
    $error=validationText($error,$comment,2,500,'commentaire');

    writeComment($id, $comment, $idEnt);

}


include('../inc/header.php');
?>
    <div class="" style="background: url('../assets/img/home.jpg') no-repeat center center fixed;padding-top:10%!important;">
        <form class="" method="post">
            <h1>Quelques choses à rajouter?</h1>
            <textarea class="" id="commentaire" rows="3" name="commentaire"></textarea>
            <span class=""><?php if(!empty($error['commentaire'])){echo $error['commentaire'];}?></span>
            <input type="submit" name="submitted" value="Envoyer">
        </form>
    </div>
<?php
include('../inc/footer.php');