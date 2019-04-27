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

<div class="row my-4 note">
    <div class="col-md-2">
    </div>
    <div class="col-md-8 text-center page-header">
        <h2>Donner mon avis sur une entreprise</h2>
        <p>
            Contribuez en renseignant votre expérience au sein de cette entreprise.
        </p>
    </div>
    <div class="col-md-2">
    </div>
</div>

<div class="row my-4">
    <div class="col-md-4">
        <img class="sidepic" src="assets/img/home.jpg" alt="Ciel étoilé">
    </div>
    <div class="col-md-8" style="padding-right:10%;">
        <div class="result">
            <h3>Vous avez attribué le score de <span>5/5</span></h3>
            <!--METTRE LE VISUEL DES ETOILES QUAND CA MARCHERA ENFIN UN JOUR-->
        </div>
        <form class="sideline" method="post">
            <h3>Ajouter un commentaire sur le score de l'entreprise</h3>
            <p>N'hésitez pas à ajouter tout élément complémentaire.</p>
            <textarea class="" id="commentaire" rows="9" name="commentaire" style="width:100%;"></textarea>
            <span class=""><?php if(!empty($error['commentaire'])){echo $error['commentaire'];}?></span>
            <br/>
            <input class="btn btn-dark my-2 my-sm-0 form" type="submit" name="submitted" value="Envoyer">
        </form>
    </div>
</div>
<?php include('../inc/footer.php');

