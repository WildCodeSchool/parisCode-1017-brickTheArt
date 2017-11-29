<?php
/**
 * Created by PhpStorm.
 * User: anysiabeauzel
 * Date: 29/11/2017
 * Time: 15:44
 */

namespace BrickTheArt\Model\Repository;

use BrickTheArt\Model\Entity\Masterpiece;
use PDO;

class MasterpieceManager extends EntityManager
{

    public function getMasterpiece() {

        $statement = $this->db->query('SELECT * FROM masterpiece');
        return $statement->fetchAll(PDO::FETCH_CLASS, Masterpiece::class);
    }


}