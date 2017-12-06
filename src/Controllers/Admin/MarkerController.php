<?php
/**
 * Created by PhpStorm.
 * User: cindy
 * Date: 06/12/17
 * Time: 17:30
 */

namespace BrickTheArt\Controllers\Admin;

use BrickTheArt\Controllers\DefaultController;
use BrickTheArt\Model\Repository\MarkerManager;


class MarkerController extends DefaultController
{
 /**
  * Ajoute un marker
  * @return
  */
   public function addMarkerAction(){
       if ($_SERVER['REQUEST_METHOD'] == "POST") {
           $errors = [];
           foreach ($_POST as key=> value) {
               if
           }
       }
   }





}