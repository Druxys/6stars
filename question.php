<?php
/**
 * Created by PhpStorm.
 * User: 17359
 * Date: 27/04/2019
 * Time: 01:43
 */
include('inc/pdo.php');
include ('functions/request.php');
include ('functions/functions.php');

$tableaux = select_question();

if (!empty($_POST['submitted'])) {

        for ($i =1; $i<15; $i++) {

            $iduser = 1;
            $ident = 1;
            $note = clean('note');
            $idreponse = clean('reponse');
            $idquestion = $i;
            insert_reponse($iduser, $ident, $idquestion, $idreponse, $note);

        }
}
include ('inc/header.php');

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
        <img src="assets/img/dylan-gillis-533818-unsplash.jpg" alt="Personnes travaillant sur une table" style="width:inherit;">
    </div>
    <div class="col-md-8">
        <form class="" action="" method="post">

            <?php

                foreach ($tableaux as $tableau){
                    ?>
                    <label><?php echo $tableau['question'] ?></label>
                    <?php br(); ?>
                    <input type="text" name="reponse">

                    <label>note</label>
                    <input type="number" name="note">
                    <br>

                    <?php

                }
        ?>

            <input type="submit" name='submitted'>

        </form>
    </div>
</div>











<?php

include ('inc/footer.php');
