<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;
use BrickTheArt\Model\Repository\MarkerManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class BricktourController extends DefaultController
{
    /**
     * Render Bricktour
     */
    public function displayAction()
    {
        $contactManager = new ContactManager();
        $markerManager = new MarkerManager();

        $coordonnees = $contactManager->getCoordonnees();
        $markers = $markerManager->getMarker();
        return $this->twig->render('user/bricktour.html.twig', array(
            "coordonnees" => $coordonnees,
            "markers" => $markers
        ));

    }



}