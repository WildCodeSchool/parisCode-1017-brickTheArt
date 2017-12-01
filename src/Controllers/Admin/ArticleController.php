<?php

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\InformationManager;
use BrickTheArt\Model\Repository\MasterpieceManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class ArticleController extends DefaultController
{
    /**
     * @return
     */
    public function addMasterpieceAction(){

        /*$masterpiece = $addmasterpieceManager->addMasterpiece();*/
        $allowed_mimes = ['image/png','image/jpg'];

        if (is_uploaded_file($tmp_name)){

            $mime = mime_content_type($tmp_name);

            if(in_array($mime, $allowed_mimes)){

                $extension = pathinfo($_FILES['userfile']['name'],PATHINFO_EXTENSION);

                $final_name = uniqid().".".$extension;

                $destination = "uploads/".$final_name;

                $result = move_uploaded_file($tmp_name, $destination);

                if($result){
                    echo"déplacement fichier ok";
                } else{
                    echo"déplacement pas ok";
                }
            }else{
                echo"pas la bonne extension";
            }
        }else{
            echo"fichier non téléchargé";
        }

        return $this->twig->render('admin/add_masterpiece.html.twig');

        }

    /**
     * Suppression d'une image
     * @return
     */
    public function deleteMasterpieceAction()
    {

        // Récupération de l'id d'image à supprimer
        $id = $_GET['id'];
        // Vérification que le paramètre id est bien un nombre (sécurité) et Si c'est bien un nombre, on traite la demande
        if (is_numeric($id)) {
            // Appel de la fonction du model permettant de supprimer une image précise
            $masterpiecemanager = new MasterpieceManager();
            $masterpiecemanager->deleteMasterpiece($id);

            //renvoi à la page admin si succès
            header('Location: index.php?page=admin');
        } else {
            header('Location: index.php');
        }
    }}
