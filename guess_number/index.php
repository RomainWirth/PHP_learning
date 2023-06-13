<?php
    var_dump('saisir un nombre pour définir le maximum et générer un nombre aléatoire (ne sois pas trop gourmand... haha');
    $maximumNumber = fgets(STDIN);
    $userNumber = NULL;
    $randomNumber = rand(0, $maximumNumber);
    var_dump('le nombre aléatoire est défini entre 0 et '.$maximumNumber);
    var_dump('saisis maintenant un nombre entre 0 et '.$maximumNumber);
    $numberOfTry = NULL;
    while ($userNumber !== $randomNumber) {
        fscanf(STDIN, '%d', $userNumber);
        var_dump('saisis maintenant un nombre entre 0 et '.$maximumNumber);
        var_dump('tu a saisi le nombre : '.$userNumber);
        $numberOfTry++;
        $calcul = abs($userNumber - $randomNumber);
//        var_dump('valeur absolue : '.$calcul);
        if ($calcul > 500) {
            var_dump('ouh... glacial! cherche encore (plus de 500 d\'écart)');
        }
        if ($calcul <= 500 && $calcul > 100) {
            var_dump('Toujours froid! cherche encore (entre 100 et 500 d\'écart)');
        }
        if ($calcul <= 100 && $calcul > 50) {
            var_dump('la piste se réchauffe... mais ce n\'est pas encore ça (entre 50 et 100 d\'écart)');
        }
        if ($calcul <= 50 && $calcul > 10) {
            var_dump('tu chauffes, continue ! (entre 10 et 50 d\'écart)');
        }
        if ($calcul <= 10 && $calcul > 5) {
            var_dump('On y est presque ! (entre 5 et 10 d\'écart)');
        }
        if ($calcul <= 5 && $calcul >= 1) {
            var_dump('On y est preeeeeeeesque ! encore un effort ! (entre 1 et 5 d\'écart)');
        }
        if ($calcul === 0) {
            var_dump('VICTORY !!!');
        }
    }
    var_dump('tu as réussi au bout de '.$numberOfTry.' essais');
?>