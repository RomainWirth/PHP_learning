<div class="flex-column justify-start align-center">
    <h1>REQUÊTES SQL</h1>
    <div>
        <h2>Question 1.</h2>
        <p>Stations services qui possèdent le service 'vente de gaz domestique'</p>
        <?php
        $queryVenteGazDomestique = $pdo->query(
                "SELECT * FROM point_de_vente AS pdv
                JOIN service_point_de_vente AS spdv
                    ON pdv.id = spdv.point_de_vente_id
                JOIN service AS s
                    ON spdv.service_id = s.id
                    WHERE s.nom = 'Vente de gaz domestique';"
        );
        if ($queryVenteGazDomestique === false){
            var_dump($pdo->errorInfo());
            die('Erreur SQL');
        }
        $ventesGazDomestique = $queryVenteGazDomestique->fetchAll(PDO::FETCH_ASSOC);
//        echo '<pre>';
//        print_r($ventesGazDomestique);
//        echo '</pre>';
        ?>
        <?php foreach ($ventesGazDomestique as $venteGazDomestique):?>
        <?php endforeach;?>

    </div>
</div>