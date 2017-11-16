<?php

namespace BrickTheArt\Controllers;

use BrickTheArt\Model\Repository\UserManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class DefaultController extends ManagerController
{
	/**
	 * Render home
	 */
	public function indexAction(){

		return $this->twig->render('user/home.html.twig');
	}

	/**
	 * @return string
	 */
	public function conceptAction(){

			return $this->twig->render('user/concept.html.twig');

	}

    /**
     * @return string
     */
    public function bricktourAction(){

        return $this->twig->render('user/bricktour.html.twig');

    }

    /**
     * @return string
     */
    public function contactAction(){

        return $this->twig->render('user/contact.html.twig');

    }

}