<?php

// Get Vendor autoload
require_once '../vendor/autoload.php';
require_once '../app/config.php';

use BrickTheArt\Controllers\DefaultController;

if (empty($_GET)){
	$defaultController = new DefaultController();
	echo $defaultController->indexAction();
}
if (isset ($_GET['page'])) {

    if ($_GET['page'] == 'concept') {
        $defaultController = new DefaultController();
        echo $defaultController->conceptAction();

    }
        if ($_GET['page'] == 'bricktour') {
            $defaultController = new DefaultController();
            echo $defaultController->bricktourAction();

        }

        if ($_GET['page'] == 'contact') {
        $defaultController = new DefaultController();
        echo $defaultController->contactAction();

    }

    }