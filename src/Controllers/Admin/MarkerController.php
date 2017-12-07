<?php
/**
 * Created by PhpStorm.
 * User: cindy
 * Date: 06/12/17
 * Time: 17:30
 */

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\MarkerManager;


class MarkerController extends DefaultController
{
    /**
     * Ajoute un marker à la carte The Brick Tour
     * @return
     */
    public function addMarkerAction()
    {


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = [];
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez renseigner le champ" . $key;
                }

            }

            if (!empty($errors)) {
                return $this->twig->render('admin/add_marker.html.twig', array(
                    'errors' => $errors
                ));

            } else {
                $event = $_POST['event'];
                $description = $_POST['description'];
                $latitude = $_POST['latitude'];
                $longitude = $_POST['longitude'];

                //On envoie le nouveau marker en base de données en instanciant un nouvel objet/élément de la classe/entité 'Marker'
                $markerManager = new MarkerManager();
                $markerManager->addMarker($event, $description, $latitude, $longitude);

                header('Location: index.php?page=admin');
            }

        } else {
            return $this->twig->render('admin/add_marker.html.twig');

        }


    }


    public function deleteMarkerAction(){
        //Récupération de l'id du marker à supprimer
        $id = $_GET['id'];
        //Vérification que le paramètre 'id' est bien un nombre (sécurité) et si c'est un nombre on traite la requête
        if (is_numeric($id)) {
            $markerManager = new MarkerManager();
            $markerManager->deleteMarker($id);

            //renvoi à la page admin si succès
            header('Location: index.php?page=admin');
        } else {
            header('Location: index.php');
        }
    }
}