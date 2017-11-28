<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;

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

        return $this->twig->render('user/home.html.twig');
    }

}