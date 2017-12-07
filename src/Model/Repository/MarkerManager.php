<?php
/**
 * Created by PhpStorm.
 * User: cindy
 * Date: 06/12/17
 * Time: 17:31
 */

namespace BrickTheArt\Model\Repository;

use BrickTheArt\Model\Entity\Marker;
use PDO;

class MarkerManager extends EntityManager
{

    /**
     * Adds a marker in db
     * @param $event
     * @param $description
     * @param $longitude
     * @param $latitude
     */
    public function addMarker($event, $description, $longitude, $latitude) {
     //Préparer la requête
        $req= $this->db->prepare("INSERT INTO marker (event, description, longitude, latitude) VALUES (:event, :description, :longitude, :latitude)");
     //Exécuter la requête
        $req->execute(array(
            ':event' => $event,
            ':description' => $description,
            ':longitude' => $longitude,
            ':latitude' => $latitude
        ));


    }

    /**
     * Get markers from table Marker and use them in views
     * @return mixed
     */
    public function getMarker() {
        $statement =$this->db->query('SELECT * FROM marker');
        return $statement->fetchAll(PDO::FETCH_CLASS, Marker::class);
    }


    public function deleteMarker($id){
        $req=$this->db->prepare('DELETE FROM marker WHERE id= :id');
        $req->execute(array(
            'id' => $id
        ));
    }

}


