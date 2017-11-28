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
	$defaultController = new HomeController();
	echo $defaultController->displayAction();
}
if (isset ($_GET['page'])) {

        if ($_GET['page'] == 'concept') {
        $defaultController = new ConceptController();
        echo $defaultController->displayAction();
        }

        if ($_GET['page'] == 'bricktour') {
            $defaultController = new BricktourController();
            echo $defaultController->displayAction();
        }

        if ($_GET['page'] == 'contact') {
        $defaultController = new ContactController();
        echo $defaultController->displayAction();
        }

        if ($_GET['page'] == 'success') {
        $defaultController = new ContactController();
        echo $defaultController->successAction();
        }

        if ($_GET['page'] == 'login') {
        $defaultController = new SessionController();
        echo $defaultController->loginAction();
        }

        if ($_GET['page'] == 'admin') {
        $defaultController = new SessionController();
        echo $defaultController->loginsuccessAction();
        }

        if ($_GET['page'] == 'logout') {
            $defaultController = new SessionController();
            echo $defaultController->logoutAction();
        }

        if ($_GET['page'] == 'admin2') {
            $defaultController = new SessionController();
            echo $defaultController->adminAction();
        }
}