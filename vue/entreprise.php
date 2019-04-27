<?php
/**
 * Created by PhpStorm.
 * User: 17359
 * Date: 27/04/2019
 * Time: 08:08
 */
include ("../inc/pdo.php");
include ("../functions/functions.php");
include ("../functions/request.php");


$id_questions = select_question();
$nbr = 1;

$note = note();
$j = count($note);

$somme_notes = count($note);
$i = 0;
foreach($note as $cle=>$valeur)
{
    $i++;
    $somme_notes+=$valeur['note'];
}
$moyenne = $somme_notes / $i;


include ("../inc/header.php");
?>


<div class="content">
    <div class="row my-4 note">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 text-center page-header">
            <h2>NFACTORY</h2>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <div class="row my-4">
        <div class="col-md-4">
            <img class="sidepic" src="../assets/img/home.jpg" alt="Ciel étoilé">
        </div>
        <div class="col-md-8" style="padding-right:10%;">
            <div class="result">
                <h3>Note de l'entreprise <span>6/6</span></h3>
                <h3>Note des utilisateurs <span><?php echo $moyenne;?></span></h3>
                <h3><?php foreach ($id_questions as $id_question) {

                        $noteQuestion = noteQuestion($id_questions);

                        $j = count($note);

                        $somme_notes_question = count($noteQuestion);
                        $i = 0;
                        foreach($noteQuestion as $cle=>$valeur)
                        {
                            $i++;
                            $somme_notes_question+=$valeur['note'];
                        }
                        $moyenne_question = $somme_notes_question / $i;
                        ?> Note question <?php echo $nbr++ ;?> : <?php echo $moyenne_question; br();

                    }?> </h3>



            </div>
        </div>
    </div>



</div>
</div>
<?php
include ("../inc/footer.php");