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

        //gestion des erreurs, avec au départ $errors = 0. (header:"Location:index.php?page=success", etc)

    }

    /**
     * @return string
     */

    /*public function successAction(){

        return $this->twig->render('user/contact_success.html.twig')

    }*/


    /**
     * @return string
     */
    public function loginAction(){

        return $this->twig->render('admin/login_admin.html.twig');
        //permet de me trouver sur la page de login côté admin
    }

    /**
     * @return string
     */
    public function successadminAction(){

        return $this->twig->render('admin/back_office_page1.html.twig');
        //permet de me trouver sur la première page du BO
    }

    /**
     * @return string
     */
    public function adminAction(){

        return $this->twig->render('admin/back_office_page2.html.twig');
        //permet de me trouver sur la seconde page du BO
    }

    /**
     * @return string
     */
    public function logoutAction(){

        return $this->twig->render('admin/successlogout.html.twig');
        //permet de me trouver sur une page de succès
    }
}