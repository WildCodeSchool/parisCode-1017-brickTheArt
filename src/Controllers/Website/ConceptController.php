<?php

namespace BrickTheArt\Controllers\Website;

use BrickTheArt\Controllers\DefaultController;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class ConceptController extends DefaultController
{
    /**
     * Render Concept
     */
    public function displayAction()
    {

        return $this->twig->render('user/concept.html.twig');
    }
}