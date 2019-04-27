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


$somme_notes = count($note);
$i = 0;
$n = 0;

//debug($note);

//
foreach($note as $cle=>$valeur)
{
    $i++;
    $n+=$valeur['note'];
}
$moyenne = $n / $i;


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
                <h3><?php $v = 0;foreach ($id_questions as $id_question) {

                        $noteQuestion = noteQuestion($id_question['id']);


                        $somme_notes_question = count($noteQuestion);

                        $i = 0;

                        $n = 0;
//                        debug($id_question);
                        foreach($noteQuestion as $cle=>$valeur)
                        {
                            $i++;
                            $n +=  $valeur['note'];
                        }

                        $moyenne_question = $n / $i;

                        if(!empty($moyenne_question) && !is_nan($moyenne_question))
                        {
                            ?>
                            La question <?php echo $nbr++ ;?> : <?php
                            echo $moyenne_question; br();

                        }

                    }?> </h3>




            </div>
        </div>
    </div>



</div>
</div>
<?php
include ("../inc/footer.php");