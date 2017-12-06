<?php

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\MasterpieceManager;
use BrickTheArt\Services\UploadedFile;
use BrickTheArt\Services\Uploads;


/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class ArticleController extends DefaultController
{
    /**
     * Ajoute une masterpiece
     * @return
     */
    public function addMasterpieceAction(){

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $errors = [];
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez renseigner le champ " . $key;
                }
            }

            if (empty($_FILES['image']['name'])) {
                $errors['name'] = "Veuillez ajouter une image";
            }

            if (!empty($errors)) {
                return $this->twig->render('admin/add_masterpiece.html.twig', array(
                    'errors' => $errors
                ));
            } else {
                $title = $_POST['titre'];
                $content = $_POST['description'];
                $image = $_FILES['image'];

                $uploadedfile = new UploadedFile($image['name'], $image['tmp_name'], $image['size']);

                //upload du fichier dans la méthode définie dans le service

                $upload = new Uploads();

                $result = $upload->upload($uploadedfile);
                if (!empty($result)){
                    return $this->twig->render('admin/add_masterpiece.html.twig', array(
                        'erreur_image'=>$result
                    ));
                } else{
                    //requete BDD
                    $masterpiecemanager = new MasterpieceManager();
                    $masterpiecemanager->addMasterpiece($title, $content, $uploadedfile->getFileName());

                    header('Location: index.php?section=admin&page=admin');
                }
            }
        } else{
            return $this->twig->render('admin/add_masterpiece.html.twig');
        }
    }


    /**
     * Update d'une masterpiece
     * @return
     */
    public function editMasterpieceAction()
    {
        // Récupération de l'id d'image à updater
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $title = $_POST['titre'];
            $content = $_POST['description'];

            $masterpiecemanager = new MasterpieceManager();
            $masterpiecemanager->updateMasterpiece($id, $title, $content);
            //renvoi à la page admin si succès
            header('Location: index.php?section=admin&section=admin&page=admin');

//GESTION DES ERREURS
            //SI MESSAGE DERREUR
            //JE RENVOIE VERS EDIT MASTERPIECE EN AFFICHANT LES ERREURS
            //SINON JINSTANCIE OBJET MASTERPIECEMANAGER
            //JUPDATE EN BDD
            //JE RETOURNE SUR LA PAGE ADMIN

        } else {
            $masterpiecemanager = new MasterpieceManager();
            $masterpiece=$masterpiecemanager->getOneMasterpiece($id);


            return $this->twig->render('admin/edit_masterpiece.html.twig', array(
                'masterpiece'=>$masterpiece
            ));
        }

//        // Vérification que le paramètre id est bien un nombre (sécurité) et Si c'est bien un nombre, on traite la demande
//        if (is_numeric($id)) {
//            // Appel de la fonction du model permettant de updater une masterpiece
//            $masterpiecemanager = new MasterpieceManager();
//            $masterpiecemanager->updateMasterpiece($id, $title, $image, $content);
//            //renvoi à la page admin si succès
//            header('Location: index.php?section=admin&page=admin');
//        } else {
//            header('Location: index.php');
//        }
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
            header('Location: index.php?section=admin&page=admin');
        } else {
            header('Location: index.php');
        }
    }}
