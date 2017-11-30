<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
require_once '../app/config.php';

use BrickTheArt\Controllers\Website\HomeController;
use BrickTheArt\Controllers\Website\ConceptController;
use BrickTheArt\Controllers\Website\BricktourController;
use BrickTheArt\Controllers\Website\ContactController;
use BrickTheArt\Controllers\Admin\SessionController;


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

        /*
        if ($_GET['page'] == 'success') {
        $contactController = new ContactController();
        echo $contactController->successAction();
        }
        */

        if ($_GET['page'] == 'login') {
        $sessionController = new SessionController();
        echo $sessionController->loginAction();
        }

        if ($_GET['page'] == 'admin') {
        $sessionController = new SessionController();
        echo $sessionController->loginsuccessAction();
        }

        if ($_GET['page'] == 'logout') {
            $sessionController = new SessionController();
            echo $sessionController->logoutAction();
        }

        if ($_GET['page'] == 'admin2') {
            $sessionController = new SessionController();
            echo $sessionController->adminAction();
        }
}