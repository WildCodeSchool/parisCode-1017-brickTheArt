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

    /**
     *Add masterpiece in bdd
     *@param $url
     */
    public function addMasterpiece($title, $content, $image){
    // Préparer la requete
        $req = $this->db->prepare("INSERT INTO masterpiece (title, image, content) VALUES (:title, :image, :content)");
    // Executer la requete
        $req->execute(array(
            ':title' => $title,
            ':image' => $image,
            ':content' => $content
        ));
    }

    public function getOneMasterpiece($id)
    {
        $statement = $this->db->prepare('SELECT * FROM masterpiece WHERE id=:id');
        $statement->execute(array(
            ':id'=> $id
        ));
        return $statement->fetchObject( Masterpiece::class);
    }

    public function getMasterpiece()
    {

        $statement = $this->db->query('SELECT * FROM masterpiece');
        return $statement->fetchAll(PDO::FETCH_CLASS, Masterpiece::class);
    }

    public function getMasterpieceConcept()
    {

        $statement = $this->db->query('SELECT * FROM masterpiece ORDER BY RAND() LIMIT 2');
        return $statement->fetchAll(PDO::FETCH_CLASS, Masterpiece::class);
    }

    /**
     * Suppression d'une masterpiece
     * @param  [int] $id Id de la masterpiece
     */
    public function deleteMasterpiece($id){

       $req = $this->db->prepare("DELETE FROM masterpiece WHERE id=:id");
       $req ->execute(array(
       ':id'=> $id
       ));

    }

    public function updateMasterpiece($id, $title, $content)
    {
        $req = $this->db->prepare("UPDATE masterpiece SET title=:title, content=:content WHERE id=:id");
        $req ->execute(array(
            ':id'=> $id,
            ':title' => $title,
            ':content'=> $content
        ));

    }

}