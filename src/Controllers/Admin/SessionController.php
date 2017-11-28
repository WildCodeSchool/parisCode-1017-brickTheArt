<?php

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class SessionController extends DefaultController
{
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
    public function loginSuccessAction(){

        return $this->twig->render('admin/back_office_page1.html.twig');
        //permet de me trouver sur la première page du BO
    }

    /**
     * @return string
     */
    public function logoutAction(){

        return $this->twig->render('admin/successlogout.html.twig');
        //permet de me trouver sur une page de succès
    }

    /**
     * @return string
     */
    public function adminAction(){

        return $this->twig->render('admin/back_office_page2.html.twig');
        //permet de me trouver sur la seconde page du BO
    }

}