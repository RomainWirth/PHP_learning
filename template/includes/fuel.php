<div class="flex-column justify-start align-center">
    <h1>REQUÊTES SQL</h1>
    <div>
        <h2>Question 1.</h2>
        <p>Stations services qui possèdent le service 'vente de gaz domestique'</p>
        <table>
            <thead>
                <tr>
                    <th>VILLE</th>
                    <th>ADRESSE</th>
                    <th>CODE POSTAL</th>
                    <th>AUTOMATE 24/24</th>
                    <th>SERVICE</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $queryVenteGazDomestique = $pdo->prepare(
                "SELECT * FROM point_de_vente AS pdv
                    JOIN service_point_de_vente AS spdv
                        ON pdv.id = spdv.point_de_vente_id
                    JOIN service AS s
                        ON spdv.service_id = s.id
                        WHERE s.nom = 'Vente de gaz domestique'
                    LIMIT 10;"
                );
                $queryVenteGazDomestique->execute();
//                if ($queryVenteGazDomestique === false){
//                    var_dump($pdo->errorInfo());
//                    die('Erreur SQL');
//                }
                $ventesGazDomestique = $queryVenteGazDomestique->fetchAll();
            ?>
            <?php foreach ($ventesGazDomestique as $venteGazDomestique):?>
                <tr>
                    <td><?php echo $venteGazDomestique['ville'];?></td>
                    <td><?php echo $venteGazDomestique['adresse'];?></td>
                    <td><?php echo $venteGazDomestique['code_postal'];?></td>
                    <td><?php echo $venteGazDomestique['automate_24_24'];?></td>
                    <td><?php echo $venteGazDomestique['nom'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 1.a</h2>
        <p>Code Postal des stations services qui possèdent le service 'vente de gaz domestique'</p>
        <table>
            <thead>
            <tr>
                <th>CODE POSTAL</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryCPVenteGazDomestique = $pdo->prepare(
                "SELECT code_postal
                FROM point_de_vente AS pdv
                JOIN service_point_de_vente AS spdv
                    ON pdv.id = spdv.point_de_vente_id
                JOIN service AS s
                    ON spdv.service_id = s.id
                    WHERE s.nom = 'Vente de gaz domestique'
                LIMIT 10;"
            );
            $queryCPVenteGazDomestique->execute();
            $ventesCPGazDomestique = $queryCPVenteGazDomestique->fetchAll();
            ?>
            <?php foreach ($ventesCPGazDomestique as $venteCPGazDomestique):?>
                <tr>
                    <td><?php echo $venteCPGazDomestique['code_postal'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 1.b</h2>
        <p>Stations services qui possèdent le service 'vente de gaz domestique' et retirer les doublons</p>
        <table>
            <thead>
            <tr>
                <th>CODE POSTAL</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryCPUniqueVenteGazDomestique = $pdo->prepare(
                "SELECT DISTINCT code_postal
                FROM point_de_vente AS pdv
                JOIN service_point_de_vente AS spdv
                    ON pdv.id = spdv.point_de_vente_id
                JOIN service AS s
                    ON spdv.service_id = s.id
                    WHERE s.nom = 'Vente de gaz domestique'
                LIMIT 10;"
            );
            $queryCPUniqueVenteGazDomestique->execute();
            $ventesCPUniqueGazDomestique = $queryCPUniqueVenteGazDomestique->fetchAll();
            ?>
            <?php foreach ($ventesCPUniqueGazDomestique as $venteCPUniqueGazDomestique):?>
                <tr>
                    <td><?php echo $venteCPUniqueGazDomestique['code_postal'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 2</h2>
        <p>Sélectionner le nombre de stations se trouvant à Annecy</p>
        <table>
            <thead>
            <tr>
                <th>ADRESSE</th>
                <th>CODE POSTAL</th>
                <th>VILLE</th>
                <th>AUTOMATE 24/24</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryGasStationAnnecy = $pdo->query(
                "SELECT * FROM point_de_vente
                WHERE ville = 'ANNECY'
                LIMIT 10;"
            );
            if ($queryGasStationAnnecy === false){
                var_dump($pdo->errorInfo());
                die('Erreur SQL');
            }
            $ventesGasStationAnnecy = $queryGasStationAnnecy->fetchAll();
            ?>
            <?php foreach ($ventesGasStationAnnecy as $venteGasStationAnnecy):?>
                <tr>
                    <td><?php echo $venteGasStationAnnecy['adresse'];?></td>
                    <td><?php echo $venteGasStationAnnecy['code_postal'];?></td>
                    <td><?php echo $venteGasStationAnnecy['ville'];?></td>
                    <td><?php echo $venteGasStationAnnecy['automate_24_24'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 2.a</h2>
        <p>Stations services à Annecy 24h/24h</p>
        <table>
            <thead>
            <tr>
                <th>ADRESSE</th>
                <th>CODE POSTAL</th>
                <th>VILLE</th>
                <th>AUTOMATE 24/24</th>
                <th>SERVICE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryAnnecy2424 = $pdo->prepare(
                "SELECT * FROM point_de_vente
                WHERE ville = 'ANNECY'
                    AND automate_24_24 = True
                    LIMIT 10;"
            );
            $queryAnnecy2424->execute();
            if ($queryAnnecy2424 === false){
                var_dump($pdo->errorInfo());
                die('Erreur SQL');
            }
            $annecys2424 = $queryAnnecy2424->fetchAll();
            ?>
            <?php foreach ($annecys2424 as $annecy2424):?>
                <tr>
                    <td><?php echo $annecy2424['adresse'];?></td>
                    <td><?php echo $annecy2424['code_postal'];?></td>
                    <td><?php echo $annecy2424['ville'];?></td>
                    <td><?php echo $annecy2424['automate_24_24'];?></td>
                    <td><?php echo $annecy2424['nom'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 3</h2>
        <p>Nombre total de stations service en France</p>
        <table>
            <thead>
            <tr>
                <th>TOTAL STATIONS SERVICE FRANCE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryTotalGasStations = $pdo->prepare(
                "SELECT COUNT(*) FROM point_de_vente;"
            );
            $queryTotalGasStations->execute();
            $totalGasStations = $queryTotalGasStations->fetchAll();
            ?>
            <?php foreach ($totalGasStations as $totalGasStation):?>
                <tr>
                    <td><?php echo $totalGasStation['count'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 3.a</h2>
        <p>Nombre total de stations service en France dans les départements 29, 23 et 69</p>
        <table>
            <thead>
            <tr>
                <th>TOTAL STATIONS SERVICE FRANCE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryTotalGasStationsDpt = $pdo->prepare(
                "SELECT COUNT(*) FROM point_de_vente
                WHERE code_postal LIKE '29%'
                    OR code_postal LIKE '23%'
                    OR code_postal LIKE '69%';"
            );
            $queryTotalGasStationsDpt->execute();
            $totalGasStationsDpt = $queryTotalGasStationsDpt->fetchAll();
            ?>
            <?php foreach ($totalGasStationsDpt as $totalGasStationDpt):?>
                <tr>
                    <td><?php echo $totalGasStationDpt['count'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 4</h2>
        <p>Moyenne des prix du gazole en France</p>
        <table>
            <thead>
            <tr>
                <th>Prix moyen Diesel en France</th>
            </tr>
            <tr>
                <th>a. 2007</th>
                <th>b. 2014</th>
                <th>c. 2023</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $queryAvgGasole2007 = $pdo->prepare(
                            "SELECT CAST(
                                (SELECT AVG(valeur) FROM prix AS p
                                JOIN carburant AS c
                                ON p.carburant_id = c.id
                                    AND c.nom = 'Gazole'
                                    AND p.date::TEXT LIKE '2007%')
                            AS numeric (10,3));"
                        );
                        $queryAvgGasole2007->execute();
                        $avgsGasole2007 = $queryAvgGasole2007->fetchAll();
                        ?>
                        <?php foreach ($avgsGasole2007 as $avgGasole2007):?>
                        <p><?php echo $avgGasole2007['avg'];?></p>
                        <?php endforeach;?>
                    </td>
                    <td>
                        <?php
                        $queryAvgGasole2014 = $pdo->prepare(
                            "SELECT CAST(
                                (SELECT AVG(valeur) FROM prix AS p
                                JOIN carburant AS c
                                ON  p.carburant_id = c.id
                                    AND c.nom = 'Gazole'
                                    AND p.date::TEXT LIKE '2014%')
                            AS numeric (10,3));"
                        );
                        $queryAvgGasole2014->execute();
                        $avgsGasole2014 = $queryAvgGasole2014->fetchAll();
                        ?>
                        <?php foreach ($avgsGasole2014 as $avgGasole2014):?>
                        <p><?php echo $avgGasole2014['avg'];?></p>
                        <?php endforeach;?>
                    </td>
                    <td>
                        <?php
                        $queryAvgGasole2023 = $pdo->prepare(
                            "SELECT CAST(
                                (SELECT AVG(valeur) FROM prix AS p
                                JOIN carburant AS c
                                    ON p.carburant_id = c.id
                                    AND c.nom = 'Gazole'
                                    AND p.date::TEXT LIKE '2023%')
                            AS numeric(10,3));"
                        );
                        $queryAvgGasole2023->execute();
                        $avgsGasole2023 = $queryAvgGasole2023->fetchAll();
                        ?>
                        <?php foreach ($avgsGasole2023 as $avgGasole2023):?>
                            <p><?php echo $avgGasole2023['avg'];?></p>
                        <?php endforeach;?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 5.</h2>
        <p>Moyenne des prix du gazole par département</p>
        <table>
            <thead>
            <tr>
                <th>Département</th>
                <th>Moyenne des prix du gazole</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryAvgGasoleDpt = $pdo->prepare(
                "SELECT LEFT(code_postal, 2) AS departement, AVG(valeur) AS avg_diesel FROM point_de_vente AS pdv
                JOIN prix AS p ON pdv.id = p.point_de_vente_id
                JOIN carburant AS c ON p.carburant_id = c.id
                    WHERE c.nom = 'Gazole'
                    GROUP BY departement
                    ORDER BY departement
                LIMIT 10;"
            );
            $queryAvgGasoleDpt->execute();
            $avgsGasoleDpt = $queryAvgGasoleDpt->fetchAll();
            ?>
            <?php foreach ($avgsGasoleDpt as $avgGasoleDpt):?>
                <tr>
                    <td><?php echo $avgGasoleDpt['departement'];?></td>
                    <td><?php echo $avgGasoleDpt['avg_diesel'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 6.a</h2>
        <p>Carburant le plus souvent en rupture entre Janvier 2023 et Mars 2023 à ANNECY</p>
        <table>
            <thead>
            <tr>
                <th>Carburant</th>
                <th>Nombre de fois en rupture</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryGasOutAnnecy = $pdo->prepare(
                "SELECT nom AS type_carburant, COUNT(nom) AS en_rupture FROM carburant AS c
                JOIN rupture AS r ON c.id = r.carburant_id
                JOIN point_de_vente AS pdv ON r.point_de_vente_id = pdv.id
                WHERE r.debut::TEXT > '2023-01%'
                    AND r.fin::TEXT < '2023-04%'
                    AND pdv.ville = 'ANNECY'
                GROUP BY type_carburant
                ORDER BY en_rupture DESC
                LIMIT 1;"
            );
            $queryGasOutAnnecy->execute();
            $gasOutAnnecy = $queryGasOutAnnecy->fetchAll();
            ?>
            <?php foreach ($gasOutAnnecy as $gasOutAnnecyshow):?>
                <tr>
                    <td><?php echo $gasOutAnnecyshow['type_carburant'];?></td>
                    <td><?php echo $gasOutAnnecyshow['en_rupture'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 6.b</h2>
        <p>Département ou il y a eu le plus de ruptures de carburant entre Janvier 2023 et Mars 2023</p>
        <table>
            <thead>
            <tr>
                <th>Département</th>
                <th>Nombre de fois en rupture</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryGasOutDpt = $pdo->prepare(
                "SELECT LEFT(pdv.code_postal, 2) AS dpt, COUNT(nom) AS en_rupture FROM carburant AS c
                    JOIN rupture AS r ON c.id = r.carburant_id
                    JOIN point_de_vente AS pdv ON r.point_de_vente_id = pdv.id
                WHERE r.debut::TEXT > '2023-02%'
                    AND r.fin::TEXT < '2023-04%'
                GROUP BY dpt
                ORDER BY en_rupture DESC
                LIMIT 1;"
            );
            $queryGasOutDpt->execute();
            $gasOutDpt = $queryGasOutDpt->fetchAll();
            ?>
            <?php foreach ($gasOutDpt as $gasOutDptshow):?>
                <tr>
                    <td><?php echo $gasOutDptshow['dpt'];?></td>
                    <td><?php echo $gasOutDptshow['en_rupture'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 7.</h2>
        <p>Point de vente et date où le prix de l'E10 a été le plus élevé</p>
        <table>
            <thead>
            <tr>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Date</th>
                <th>Prix</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryHighPriceDate = $pdo->prepare(
                "SELECT adresse, ville, date, p.valeur FROM point_de_vente AS pdv
                    JOIN prix AS p ON pdv.id = p.point_de_vente_id
                    JOIN carburant AS c ON c.id = p.carburant_id
                WHERE c.nom = 'E10'
                GROUP BY adresse, ville, date, p.valeur
                ORDER BY max(p.valeur) DESC
                LIMIT 1;"
            );
            $queryHighPriceDate->execute();
            $highPricesDate = $queryHighPriceDate->fetchAll();
            ?>
            <?php foreach ($highPricesDate as $highPriceDate):?>
                <tr>
                    <td><?php echo $highPriceDate['adresse'];?></td>
                    <td><?php echo $highPriceDate['ville'];?></td>
                    <td><?php echo $highPriceDate['date'];?></td>
                    <td><?php echo $highPriceDate['valeur'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 8.</h2>
        <p>Point de vente et date où le prix de l'E10 a été le plus élevé</p>
        <table>
            <thead>
            <tr>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Ouvert 24h/24h</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryHighwayGasStations = $pdo->prepare(
                "SELECT * FROM point_de_vente
                WHERE type = 'A'
                LIMIT 10;"
            );
            $queryHighwayGasStations->execute();
            $highwayGasStations = $queryHighwayGasStations->fetchAll();
            ?>
            <?php foreach ($highwayGasStations as $highwayGasStation):?>
                <tr>
                    <td><?php echo $highwayGasStation['adresse'];?></td>
                    <td><?php echo $highwayGasStation['ville'];?></td>
                    <td><?php echo $highwayGasStation['automate_24_24'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 8.</h2>
        <p>Stations essences sur autoroute</p>
        <table>
            <thead>
            <tr>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Ouvert 24h/24h</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryHighwayGasStations = $pdo->prepare(
                "SELECT * FROM point_de_vente
                WHERE type = 'A'
                LIMIT 10;"
            );
            $queryHighwayGasStations->execute();
            $highwayGasStations = $queryHighwayGasStations->fetchAll();
            ?>
            <?php foreach ($highwayGasStations as $highwayGasStation):?>
                <tr>
                    <td><?php echo $highwayGasStation['adresse'];?></td>
                    <td><?php echo $highwayGasStation['ville'];?></td>
                    <td><?php echo $highwayGasStation['automate_24_24'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 8.a</h2>
        <p>Nombre de stations essences d'autoroute par département</p>
        <table>
            <thead>
            <tr>
                <th>Département</th>
                <th>Nombre de points de vente</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryHighwayGasStationsByDpt = $pdo->prepare(
                "SELECT LEFT(code_postal, 2) AS cp, COUNT(*) AS nbr_pdv FROM point_de_vente
                WHERE type = 'A'
                GROUP BY cp
                ORDER BY cp
                LIMIT 10;"
            );
            $queryHighwayGasStationsByDpt->execute();
            $highwayGasStationsByDpt = $queryHighwayGasStationsByDpt->fetchAll();
            ?>
            <?php foreach ($highwayGasStationsByDpt as $highwayGasStationByDpt):?>
                <tr>
                    <td><?php echo $highwayGasStationByDpt['cp'];?></td>
                    <td><?php echo $highwayGasStationByDpt['nbr_pdv'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 9</h2>
        <p>Comparaison prix diesel autoroute vs route en 2023</p>
        <table>
            <thead>
            <tr>
                <th>Lieu</th>
                <th>Nombre de points de vente</th>
                <th>Prix Moyen</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryDieselComparison2023 = $pdo->prepare(
                "SELECT type, (SELECT nom FROM carburant WHERE nom = 'Gazole') AS gas, AVG(valeur) AS price FROM prix AS p
                JOIN carburant AS c ON p.carburant_id = c.id
                JOIN point_de_vente AS pdv ON p.point_de_vente_id = pdv.id
                    WHERE c.nom = 'Gazole'
                    AND p.date > '2023-01-01'
                    GROUP BY pdv.type;
"
            );
            $queryDieselComparison2023->execute();
            $dieselComparisons2023 = $queryDieselComparison2023->fetchAll();
            ?>
            <?php foreach ($dieselComparisons2023 as $dieselComparison2023):?>
                <tr>
                    <td><?php echo $dieselComparison2023['type'];?></td>
                    <td><?php echo $dieselComparison2023['gas'];?></td>
                    <td><?php echo $dieselComparison2023['price'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 10.a</h2>
        <p>Sélection du nombre de jours ou un carburant coûtait entre 1.50€ et 1.80€ en 2014</p>
        <table>
            <thead>
            <tr>
                <th>Carburant</th>
                <th>Nombre de jours</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryDays2014 = $pdo->prepare(
                "SELECT c.nom AS gas, COUNT(DISTINCT DATE_TRUNC('day', p.date)) AS dayscount2014 FROM prix AS p
                JOIN carburant AS c ON p.carburant_id = c.id
                WHERE p.valeur >= '1.50'
                    AND p.valeur <= '1.80'
                    AND extract(YEAR FROM p.date) = 2014
                GROUP BY c.nom;"
            );
            $queryDays2014->execute();
            $days2014 = $queryDays2014->fetchAll();
            ?>
            <?php foreach ($days2014 as $day2014):?>
                <tr>
                    <td><?php echo $day2014['gas'];?></td>
                    <td><?php echo $day2014['dayscount2014'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 10.b</h2>
        <p>Sélection du nombre de jours ou un carburant coûtait entre 1.50€ et 1.80€ en 2023</p>
        <table>
            <thead>
            <tr>
                <th>Carburant</th>
                <th>Nombre de jours</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryDays2023 = $pdo->prepare(
                "SELECT c.nom AS gas, COUNT(DISTINCT DATE_TRUNC('day', p.date)) AS dayscount2023 FROM prix AS p
                JOIN carburant AS c ON p.carburant_id = c.id
                WHERE p.valeur >= '1.50'
                    AND p.valeur <= '1.80'
                    AND extract(YEAR FROM p.date) = 2023
                GROUP BY c.nom;"
            );
            $queryDays2023->execute();
            $days2023 = $queryDays2023->fetchAll();
            ?>
            <?php foreach ($days2023 as $day2023):?>
                <tr>
                    <td><?php echo $day2023['gas'];?></td>
                    <td><?php echo $day2023['dayscount2023'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div>
        <h2>Question 11</h2>
        <p>Trouver une station essence sur l'autoroute autour de Lyon qui propose du Diesel et des toilettes publiques le 23/05/2023</p>
        <table>
            <thead>
            <tr>
                <th>Rue</th>
                <th>Ville</th>
                <th>Endroit</th>
                <th>Service proposé</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $queryOpenSellpoint = $pdo->prepare(
                "SELECT DISTINCT pdv.adresse AS street, pdv.ville AS city, pdv.type AS type, s.nom AS wc FROM point_de_vente AS pdv
                JOIN prix AS p ON pdv.id = p.point_de_vente_id
                JOIN carburant AS c ON p.carburant_id = c.id
                JOIN service_point_de_vente AS spdv ON pdv.id = spdv.point_de_vente_id
                JOIN service AS s ON spdv.service_id = s.id
                WHERE LEFT(code_postal, 2) = '69'
                    AND pdv.type = 'A'
                    AND c.nom = 'Gazole'
                    AND s.nom = 'Toilettes publiques';"
            );
            $queryOpenSellpoint->execute();
            $openSellpoints = $queryOpenSellpoint->fetchAll();
            ?>
            <?php foreach ($openSellpoints as $openSellpoint):?>
                <tr>
                    <td><?php echo $openSellpoint['street'];?></td>
                    <td><?php echo $openSellpoint['city'];?></td>
                    <td><?php echo $openSellpoint['type'];?></td>
                    <td><?php echo $openSellpoint['wc'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
<!--    <div>-->
<!--        <h2>Question 12</h2>-->
<!--        <p>Trouver une station essence sur l'autoroute autour de Lyon qui propose du Diesel et des toilettes publiques le 23/05/2023</p>-->
<!--        <table>-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th>Rue</th>-->
<!--                <th>Ville</th>-->
<!--                <th>Endroit</th>-->
<!--                <th>Service proposé</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            --><?php
//            $queryOpenSellpoint = $pdo->prepare(
//                "SELECT DISTINCT pdv.adresse AS street, pdv.ville AS city, pdv.type AS type, s.nom AS wc FROM point_de_vente AS pdv
//                JOIN prix AS p ON pdv.id = p.point_de_vente_id
//                JOIN carburant AS c ON p.carburant_id = c.id
//                JOIN service_point_de_vente AS spdv ON pdv.id = spdv.point_de_vente_id
//                JOIN service AS s ON spdv.service_id = s.id
//                WHERE LEFT(code_postal, 2) = '69'
//                    AND pdv.type = 'A'
//                    AND c.nom = 'Gazole'
//                    AND s.nom = 'Toilettes publiques';"
//            );
//            $queryOpenSellpoint->execute();
//            $openSellpoints = $queryOpenSellpoint->fetchAll();
//            ?>
<!--            --><?php //foreach ($openSellpoints as $openSellpoint):?>
<!--                <tr>-->
<!--                    <td>--><?php //echo $openSellpoint['street'];?><!--</td>-->
<!--                    <td>--><?php //echo $openSellpoint['city'];?><!--</td>-->
<!--                    <td>--><?php //echo $openSellpoint['type'];?><!--</td>-->
<!--                    <td>--><?php //echo $openSellpoint['wc'];?><!--</td>-->
<!--                </tr>-->
<!--            --><?php //endforeach;?>
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
    <div>
        <h2>Question 13</h2>
        <p>Sélection des stations service et les dates au mois d'Avril 2023 ou le prix du SP95 < moyenne prix du gazole</p>
        <table>
            <thead>
            <tr>
                <th>Rue</th>
                <th>Ville</th>
                <th>Prix SP95</th>
                <th>Prix moyen diesel</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $querySp95price = $pdo->prepare(
                "SELECT pdv.adresse AS street, pdv.ville AS city, p.valeur AS sp95, (
                    SELECT AVG(p.valeur) FROM prix AS p
                    JOIN carburant AS c on p.carburant_id = c.id
                    WHERE c.nom = 'Gazole'
                    AND p.date >= '2023-04-01' AND p.date < '2023-05-01') AS diesel 
                FROM point_de_vente AS pdv
                JOIN prix AS p ON pdv.id = p.point_de_vente_id
                JOIN carburant AS c ON p.carburant_id = c.id
                WHERE c.nom = 'SP95'
                AND p.date >= '2023-04-01' AND p.date < '2023-05-01'
                AND p.valeur < (
                    SELECT AVG(p.valeur) FROM prix AS p
                    JOIN carburant AS c on p.carburant_id = c.id
                    WHERE c.nom = 'Gazole'
                    AND p.date >= '2023-04-01' AND p.date < '2023-05-01');"
            );
            $querySp95price->execute();
            $sp95prices = $querySp95price->fetchAll();
            ?>
            <?php foreach ($sp95prices as $sp95price):?>
                <tr>
                    <td><?php echo $sp95price['street'];?></td>
                    <td><?php echo $sp95price['city'];?></td>
                    <td><?php echo $sp95price['sp95'];?></td>
                    <td><?php echo $sp95price['diesel'];?></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>

