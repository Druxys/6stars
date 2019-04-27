<?php
include('../functions/functions.php');
include('../functions/request.php');
include('../inc/header.php');

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


?>

<form class="" method="post">
    <h1>Commenter cette entreprise</h1>
    <textarea class="" id="commentaire" rows="3" name="commentaire"></textarea>
    <span class=""><?php if(!empty($error['commentaire'])){echo $error['commentaire'];}?></span>
    <input type="submit" name="submitted" value="Envoyer">
</form>
<?php include('inc/footer.php');