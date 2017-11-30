<?php

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\InformationManager;

/**
 * Class DefaultManagerController
 * @package MyApp\ManagerController
 */
class ArticleController extends DefaultController
{
    /**
     * @return
     */
    public function addMasterpieceAction(){

        /*$masterpiece = $addmasterpieceManager->addMasterpiece();*/

        return $this->twig->render('admin/add_masterpiece.html.twig');

        }

    /**
     * @return
     */
    public function deleteArticleAction(){

    }



}