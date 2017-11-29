<?php
/**
 * Created by PhpStorm.
 * User: anysiabeauzel
 * Date: 29/11/2017
 * Time: 14:46
 */

namespace BrickTheArt\Model\Repository;


use BrickTheArt\Model\Entity\Information;

class InformationManager extends EntityManager
{
    /**
     *
     */
    public function getHomeInformations(){

        $statement = $this->db->query('SELECT home FROM informations');
        return $statement->fetchObject(Information::class);
    }

    public function getConceptInformations(){

        $statement = $this->db->query('SELECT concept FROM informations');
        return $statement->fetchObject(Information::class);
    }

}