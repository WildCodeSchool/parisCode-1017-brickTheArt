<?php

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;
use BrickTheArt\Model\Repository\InformationManager;
use BrickTheArt\Model\Repository\MarkerManager;
use BrickTheArt\Model\Repository\MasterpieceManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class SessionController extends DefaultController
{
    /**
     * //permet de me trouver sur la page de login côté admin
     * @return string
     */
    public function loginAction()
    {

        return $this->twig->render('admin/login_admin.html.twig');

    }

    /**permet de me trouver sur la première page du BO
     * @return string
     */
    public function loginSuccessAction()
    {

        $contactManager = new ContactManager();
        $informationManager = new InformationManager();
        $masterpieceManager = new MasterpieceManager();
        $markerManager = new MarkerManager();

        $coordonnees = $contactManager->getCoordonnees();
        $homeinformation = $informationManager->getHomeInformations();
        $conceptinformation = $informationManager->getConceptInformations();
        $masterpiece = $masterpieceManager->getMasterpiece();
        $marker = $markerManager->getMarker();


        return $this->twig->render('admin/back_office_page1.html.twig', array(
            "coordonnees" => $coordonnees,
            "information_home" => $homeinformation,
            "information_concept" => $conceptinformation,
            "masterpiece" => $masterpiece,
            "marker" => $marker
        ));

    }


    /**permet de me trouver sur le formulaire pour éditer les coordonnées
     * @return string
     */
    public function editcontactAction(){

        $contactManager = new ContactManager();
        //$errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $phone = $_POST['phone'];
            $adress = $_POST['address'];
            $opening = $_POST['hours'];

            /*gestion des erreurs A VOIR AVEC FLORIAN
            if (!preg_match('#^0[1-68][0-9]{8}$#', $phone)) {
                $errors['phone'] = "Merci de saisir un téléphone valide";
            }*/

            $contactManager->updateCoordonnees($phone, $adress, $opening);
            header("Location: index.php?page=admin");

        } else {
            $coordonnees = $contactManager->getCoordonnees();
            return $this->twig->render('admin/edit_contact.html.twig', array(
                "coordonnees" => $coordonnees,
            ));
        }
    }


    /**permet de me trouver sur le formulaire pour éditer les informations de la page home
     * @return string
     */
    public function edithomeAction() {

        $informationManager = new InformationManager();
        $homeinformation = $informationManager->getHomeInformations();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $content = $_POST['content'];

            $informationManager->updateInformation($content);
            header("Location: index.php?page=admin");
        } else {

            return $this->twig->render('admin/edithome_admin.html.twig', array(
                "information_home" => $homeinformation,

            ));
        }
    }


    /**permet de me trouver sur le formulaire pour éditer les informations de la page home
     * @return string
     */
    public function editconceptAction() {

        $informationManager = new InformationManager();
        $conceptinformation = $informationManager->getConceptInformations();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $content = $_POST['content'];

            $informationManager->updateInformationContent($content);
            header("Location: index.php?page=admin");
        } else {

            return $this->twig->render('admin/edit_concept.html.twig', array(
                "information_concept" => $conceptinformation,
            ));
        }
    }



        /**permet de me trouver sur une page de succès
     * @return string
     */
    public function logoutAction(){

        return $this->twig->render('admin/successlogout.html.twig');
    }

}