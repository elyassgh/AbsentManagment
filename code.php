<?php

require_once('db/connexion.inc.php');

try {

    $pdostat = $pdo->query("Select * from Etudiant");
    $pdostat->setFetchMode(PDO::FETCH_OBJ);

    $sql = "Select etudiant.Apogee,etudiant.Nom,etudiant.Classe,examen.num,module.libelle,examen.Session,module.Semestre,lignesexam.Etat FROM etudiant,examen,lignesexam,module WHERE etudiant.Apogee=examen.apogee and examen.num=lignesexam.Num and lignesexam.Id=module.id;";
    $all = $pdo->query($sql);
    $all->setFetchMode(PDO::FETCH_OBJ);

    $Classes = $pdo->query("Select Distinct classe from Etudiant");
    $Classes->setFetchMode(PDO::FETCH_OBJ);

    $Sessions = $pdo->query("Select Distinct Session from Examen");
    $Sessions->setFetchMode(PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo "Erreur lors de la connexion à la base de données ! " . $e->getMessage();
}


if (isset($_POST['sub'])) {

    $filtred = array();

    switch ($_POST['classe']) {

        case 'tous':

            switch ($_POST['session']) {

                case 'tous':

                    switch ($_POST['module']) {

                        case 'tous':

                            switch ($_POST['filtre']) {

                                case 'tous':
                                    foreach ($all as $element) {
                                        array_push($filtred, $element);
                                    }
                                    break;
                                default:
                                    foreach ($all as $element) {
                                        if ($element->Etat == $_POST['filtre']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                            }
                            break;

                        default:
                            switch ($_POST['filtre']) {

                                case 'tous':
                                    foreach ($all as $element) {
                                        if ($element->libelle == $_POST['module']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                                default:
                                    foreach ($all as $element) {
                                        if ($element->libelle == $_POST['module'] && $element->Etat == $_POST['filtre']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                            }
                            break;
                    }

                    break;

                default:

                    switch ($_POST['module']) {

                        case 'tous':

                            switch ($_POST['filtre']) {

                                case 'tous':

                                    foreach ($all as $element) {
                                        if ($element->Session == $_POST['session']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                                default:
                                    foreach ($all as $element) {
                                        if ($element->Session == $_POST['session'] && $element->Etat == $_POST['filtre']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                            }
                            break;

                        default:
                            switch ($_POST['filtre']) {

                                case 'tous':
                                    foreach ($all as $element) {
                                        if ($element->Session == $_POST['session'] && $element->libelle == $_POST['module']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                                default:
                                    foreach ($all as $element) {
                                        if ($element->Session == $_POST['session'] && $element->libelle == $_POST['module'] && $element->Etat == $_POST['filtre']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                            }
                            break;
                    }
                    break;
            }

        default:

            switch ($_POST['session']) {

                case 'tous':

                    switch ($_POST['module']) {

                        case 'tous':

                            switch ($_POST['filtre']) {

                                case 'tous':

                                    foreach ($all as $element) {
                                        if ($element->Classe == $_POST['classe']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                                default:
                                    foreach ($all as $element) {
                                        if ($element->Classe == $_POST['classe'] && $element->Etat == $_POST['filtre']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                            }
                            break;

                        default:
                            switch ($_POST['filtre']) {

                                case 'tous':
                                    foreach ($all as $element) {
                                        if ($element->Classe == $_POST['classe'] && $element->libelle == $_POST['module']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                                default:
                                    foreach ($all as $element) {
                                        if ($element->Classe == $_POST['classe'] && $element->libelle == $_POST['module'] && $element->Etat == $_POST['filtre']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                            }
                            break;
                    }

                    break;

                default:

                    switch ($_POST['module']) {

                        case 'tous':

                            switch ($_POST['filtre']) {

                                case 'tous':

                                    foreach ($all as $element) {
                                        if ($element->Classe == $_POST['classe'] && $element->Session == $_POST['session']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                                default:
                                    foreach ($all as $element) {
                                        if ($element->Classe == $_POST['classe'] && $element->Session == $_POST['session'] && $element->Etat == $_POST['filtre']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                            }
                            break;

                        default:
                            switch ($_POST['filtre']) {

                                case 'tous':
                                    foreach ($all as $element) {
                                        if ($element->Classe == $_POST['classe'] && $element->Session == $_POST['session'] && $element->libelle == $_POST['module']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                                default:
                                    foreach ($all as $element) {
                                        if ($element->Classe == $_POST['classe'] && $element->Session == $_POST['session'] && $element->libelle == $_POST['module'] && $element->Etat == $_POST['filtre']) {
                                            array_push($filtred, $element);
                                        }
                                    }
                                    break;
                            }
                            break;
                    }
                    break;
            }
            break;
    }
}


if (isset($_POST['update'])) {

    try {

        $id = $pdo->query("Select Id from module where libelle like '" . $_POST['module'] . "';");
        $id->setFetchMode(PDO::FETCH_OBJ);

        $num = $pdo->query("Select num from examen where Apogee like " . $_POST['apogee'] . " and Session like '" . $_POST['session'] . "';");
        $num->setFetchMode(PDO::FETCH_OBJ);

        foreach ($id as $i) {
            foreach ($num as $n) {
                $update = $pdo->query("Update lignesexam set Etat ='Présent' where Id like " . $i->Id . " and num like " . $n->num . ";");
            }
        }
    } catch (Exception $e) {

        echo "Erreur lors de la connexion avec la base de données ! " . $e->getMessage();
    }

}

?>