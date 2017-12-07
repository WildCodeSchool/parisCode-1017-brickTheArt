<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
require_once '../app/config.php';

use BrickTheArt\Controllers\Website\HomeController;
use BrickTheArt\Controllers\Website\ConceptController;
use BrickTheArt\Controllers\Website\BricktourController;
use BrickTheArt\Controllers\Website\ContactController;
use BrickTheArt\Controllers\Admin\SessionController;
use BrickTheArt\Controllers\Admin\ArticleController;
use BrickTheArt\Controllers\Admin\MarkerController;

session_start();

if (empty($_GET)){
	$homeController = new HomeController();
    echo $homeController->displayAction();
}
if (isset ($_GET['page'])) {

        if ($_GET['page'] == 'concept') {
        $conceptController = new ConceptController();
        echo $conceptController->displayAction();
        }

        if ($_GET['page'] == 'bricktour') {
        $bricktourController = new BricktourController();
        echo $bricktourController->displayAction();
        }

        if ($_GET['page'] == 'contact') {
        $contactController = new ContactController();
        echo $contactController->displayAction();
        }

        if ($_GET['page'] == 'send') {
        $contactController = new ContactController();
        echo $contactController->contactAction();
        }

        if ($_GET['page'] == 'login') {
        $sessionController = new SessionController();
        echo $sessionController->loginAction();
        }

        if(isset($_SESSION['login'])&& isset($_GET['section'])){

        if ($_GET['page'] == 'admin') {
        $sessionController = new SessionController();
        echo $sessionController->loginsuccessAction();
        }

        if ($_GET['page'] == 'edithome_admin') {
        $sessionController = new SessionController();
        echo $sessionController->edithomeAction();
        }

        if ($_GET['page'] == 'edit_concept') {
        $sessionController = new SessionController();
        echo $sessionController->editconceptAction();
        }

        if ($_GET['page'] == 'edit_contact') {
        $sessionController = new SessionController();
        echo $sessionController->editcontactAction();
        }

        if ($_GET['page'] == 'add_masterpiece') {
        $articleController = new ArticleController();
        echo $articleController->addMasterpieceAction();
        }

        if ($_GET['page'] == 'edit_masterpiece') {
        $articleController = new ArticleController();
        echo $articleController->editMasterpieceAction();
        }

        if($_GET['page'] == 'delete_masterpiece'){
        $articleController = new ArticleController();
        echo $articleController->deleteMasterpieceAction();
        }
        }

        if ($_GET['page'] == 'add_marker') {
            $markerController = new MarkerController();
            echo $markerController->addMarkerAction();
        }

        if ($_GET['page'] == 'delete_marker') {
           $markerController = new MarkerController();
           echo $markerController->deleteMarkerAction();
        }

        if ($_GET['page'] == 'logout') {
        $sessionController = new SessionController();
        echo $sessionController->logoutAction();
        }

}