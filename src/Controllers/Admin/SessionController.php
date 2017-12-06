<?php

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;
use BrickTheArt\Model\Repository\InformationManager;
use BrickTheArt\Model\Repository\MasterpieceManager;
use BrickTheArt\Model\Repository\UserManager;

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


        //On fait appel à la base
        //on initialise nos messages d’ erreurs
        //On vérifie les input
        //Si le login et password inséré correspondent à un login et mot de passe trouvé en base ( $data[‘login’] ), alors on ouvre une session avec les valeurs assignées
        //On affiche un message de succès et on redirige vers la partie admin
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        var_dump($_POST);die();
            //$userManager = new UserManager();
            //$passwordUser = $userManager->getPassword($password);
            //$loginUser = $userManager->getLogin($login);

            $errors = [];
            foreach ($_POST as $key => $value) {
                if (empty($_POST[$key])) {
                    $errors[$key] = "Veuillez renseigner le champ " . $key;
                }
            }

            if (!empty($errors)) {
                return $this->twig->render('admin/login_admin.html.twig', array(
                    'errors' => $errors
                ));
            }else {
                $login = $_POST['login'];
                $password = $_POST ['password'];




            /*if ($valid) {
                if ($passwordUser['password'] == $password && $loginUser['login'] == $login ) // Acces OK ! s'il y a des données et qu'elle correspondent
                {
                    session_start(); //on ouvre la session
                    $_SESSION['login'] = $loginUser['login'];//on assigne nos valeurs
                    $_SESSION['password'] = $passwordUser['password'];

                    echo '<p>Bienvenue '.$loginUser['login'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="#">ici</a> 
			pour revenir à la page d accueil</p>';
                    header('location:index.php'); //et on renvoie vers l'index
                }


                else // Acces refusé on reste sur la page!
                {
                    echo '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="./login.php">ici</a>';


                }}}*/

    }}return $this->twig->render('admin/login_admin.html.twig');

    }


    /**permet de me trouver sur la première page du BO
     * @return string
     */
    public function loginSuccessAction()
    {

        $contactManager = new ContactManager();
        $informationManager = new InformationManager();
        $masterpieceManager = new MasterpieceManager();

        $coordonnees = $contactManager->getCoordonnees();
        $homeinformation = $informationManager->getHomeInformations();
        $conceptinformation = $informationManager->getConceptInformations();
        $masterpiece = $masterpieceManager->getMasterpiece();


        return $this->twig->render('admin/back_office_page1.html.twig', array(
            "coordonnees" => $coordonnees,
            "information_home" => $homeinformation,
            "information_concept" => $conceptinformation,
            "masterpiece" => $masterpiece
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