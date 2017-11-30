<?php

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;
use BrickTheArt\Model\Repository\InformationManager;
use BrickTheArt\Model\Repository\MasterpieceManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class SessionController extends DefaultController
{
    /**
     * @return string
     */
    public function loginAction(){

        return $this->twig->render('admin/login_admin.html.twig');
        //permet de me trouver sur la page de login côté admin
    }

    /**permet de me trouver sur la première page du BO
     * @return string
     */
    public function loginSuccessAction(){

        $contactManager = new ContactManager();
        $informationManager = new InformationManager();
        $masterpieceManager = new MasterpieceManager();

        $coordonnees = $contactManager->getCoordonnees();
        $homeinformation = $informationManager->getHomeInformations();
        $conceptinformation = $informationManager->getConceptInformations();
        $masterpiece = $masterpieceManager->getMasterpiece();


        return $this->twig->render('admin/back_office_page1.html.twig', array(
            "coordonnees"=>$coordonnees,
            "information_home" => $homeinformation,
            "information_concept" => $conceptinformation,
            "masterpiece" => $masterpiece
        ));

    }

    /**permet de me trouver sur la page
     * @return string
     */
    public function edithomeAction(){

        return $this->twig->render('admin/edithome_admin.html.twig');

    }

    /**permet de me trouver sur la
     * @return string
     */
    public function editcontactAction(){

        $contactManager = new ContactManager();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
           $phone = $_POST['phone'];
           $adress = $_POST['address'];
           $opening= $_POST['hours'];
            //gestion des erreurs à faire

            $contactManager->updateCoordonnees($phone,$adress,$opening);
            header ("Location: index.php?page=admin");

        }else{
            $coordonnees = $contactManager->getCoordonnees();
            return $this->twig->render('admin/edit_contact.html.twig',array(
                "coordonnees"=>$coordonnees,
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