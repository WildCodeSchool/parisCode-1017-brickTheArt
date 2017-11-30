<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class ContactController extends DefaultController
{
    /**
     * @return string
     */
    public function displayAction(){

        $contactManager = new ContactManager();
        $coordonnees = $contactManager->getCoordonnees();
        return $this->twig->render('user/contact.html.twig',array(
            "coordonnees"=>$coordonnees
        ));

        //gestion des erreurs, avec au départ $errors = 0. (header:"Location:index.php?page=success", etc)

    }

    /**
     * @return string
     */
    public function contactAction(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $errors = [];
            foreach ($_POST as $key => $value){
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez renseigner le champ " . $key;
                }
            }
            if (!empty($errors)){
                return $this->twig->render('contact.html.twig', array(
                    'errors' => $errors
                ));
            }

            /*
            else{
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $city = $_POST['city'];
                $message = $_POST['message'];
            */



            }
        }
        return $this->twig->render('contact_success.html.twig');
    }

}