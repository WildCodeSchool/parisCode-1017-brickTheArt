<?php
/**
 * Created by PhpStorm.
 * User: anysiabeauzel
 * Date: 28/11/2017
 * Time: 14:29
 */

namespace BrickTheArt\Model\Repository;

use BrickTheArt\Model\Entity\Contact;

/**
 * Class ContactManager
 * @package BrickTheArt\Model\Repository
 */
class ContactManager extends EntityManager
{
    /**
     *
     */
    public function getCoordonnees(){

        $statement = $this->db->query('SELECT * FROM contact_information');
        return $statement->fetchObject(Contact::class);
    }
}