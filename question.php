<?php
/**
 * Created by PhpStorm.
 * User: 17359
 * Date: 27/04/2019
 * Time: 01:43
 */
include('../inc/pdo.php');
include('../functions/request.php');
include('../functions/functions.php');

$tableaux = select_question();

if (!empty($_POST['submitted'])) {

        for ($i =1; $i<15; $i++) {

            $iduser = 1;
            $ident = 1;
            $note = 5;
            $idreponse = clean('reponse');
            $idquestion = $i;
            insert_reponse($iduser, $ident, $idquestion, $idreponse, $note);

        }
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
        <form class="" action="" method="post">

            <?php

                foreach ($tableaux as $tableau){
                    $i = 0;

                    ?>
            <div class="sideline">
                    <label><?php echo $tableau['question'] ?></label>
                    <?php br();
                    $repVar = getInfoCharQuestion($tableau['question']);
                    $repRadio = getInforadioQuestion($tableau['question']);
                    $repInt = getInfoIntQuestion($tableau['question']);
                    $repCheckbox = getInfoCheckBoxQuestion($tableau['question']);

//                    var_dump($repVar);
                    if(!empty($repVar)) {
                        ?>
                        <input type="text" name="reponse">
                        <?php
                        }elseif (!empty($repInt)){
                        ?>

                        <div class="row">
                            <label>Note</label>
                            <fieldset class="rate">
                                <input id="rate1-star5" type="radio" name="rate1" value="5" />
                                <label for="rate1-star5" title="Excellent">5</label>

                                <input id="rate1-star4" type="radio" name="rate1" value="4" />
                                <label for="rate1-star4" title="Good">4</label>

                                <input id="rate1-star3" type="radio" name="rate1" value="3" />
                                <label for="rate1-star3" title="Satisfactory">3</label>

                                <input id="rate1-star2" type="radio" name="rate1" value="2" />
                                <label for="rate1-star2" title="Bad">2</label>

                                <input id="rate1-star1" type="radio" name="rate1" value="1" />
                                <label for="rate1-star1" title="Very bad">1</label>
                            </fieldset>
                        </div>
                        <?php
                        }elseif(!empty($repRadio)){?>
                        <label>OUI</label>
                        <input type="radio" name="radioY<?php echo $i;?>" >
                        <label>NON</label>
                        <?php $i++; ?>
                        <input type="radio" name="radioN<?php echo $i;?>  ">
                        <?php
                            }

                        ?>


            </div>
                    <br>

                    <?php

                }
        ?>

            <input type="submit" name='submitted' class="btn btn-dark my-2 my-sm-0 form">

        </form>
    </div>
</div>











<?php

include('../inc/footer.php');
