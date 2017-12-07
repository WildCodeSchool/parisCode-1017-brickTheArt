<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\ContactManager;
use BrickTheArt\Model\Repository\InformationManager;
use BrickTheArt\Model\Repository\MasterpieceManager;


/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class HomeController extends DefaultController
{
    /**
     * Render home
     */
    public function displayAction()
    {
        $contactManager = new ContactManager();
        $informationManager = new InformationManager();
        $masterpieceManager = new MasterpieceManager();

        $coordonnees = $contactManager->getCoordonnees();
        $information = $informationManager->getHomeInformations();
        $masterpiece = $masterpieceManager->getMasterpieceConcept();


        return $this->twig->render('user/home.html.twig', array(
            "coordonnees" => $coordonnees,
            "information" => $information,
            "masterpiece" => $masterpiece
        ));

    }

}