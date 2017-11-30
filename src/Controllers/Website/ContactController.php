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


            else {

            //On envoie les infos de contact par email
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $city = $_POST['city'];
                $message = $_POST['message'];


                // Create the Transport
                $transport = (new \Swift_SmtpTransport('smtp.mailtrap.io', 2525))
                    ->setUsername('3cbb483438cb93')
                    ->setPassword('9550b5a8c720b6')
                    ->setAuthMode('cram-md5')
                ;

                // Create the Mailer using your created Transport
                $mailer = new \Swift_Mailer($transport);

                // Create a message
                $message = (new \Swift_Message('Another brick in the wall'))
                ->setFrom([$email => $firstname . $lastname])
                ->setTo(['receiver@domain.org', 'other@domain.org' => 'Brick The Art'])
                ->setBody($firstname. 'de'. $city. 'vous a écrit :'.$message )
                ;

                // Send the message
                $result = $mailer->send($message);


            }
        }
        return $this->twig->render('contact_success.html.twig');
    }

}