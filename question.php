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


<form class="" action="" method="post">

    <?php

        foreach ($tableaux as $tableau){
            ?>
            <label><?php echo $tableau['question'] ?></label>
            <input type="text" name="reponse">
            <label>note</label>
            <input type="integer" name="note">
            <br>

            <?php

        }
?>

    <input type="submit" name='submitted'>



</form>











<?php

include ('inc/footer.php');
