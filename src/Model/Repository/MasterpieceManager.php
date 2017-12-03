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
    public function addMasterpiece($title,$image,$content){
    // Préparer la requete

        $req = $this->db->prepare("INSERT INTO masterpiece (title, image, content) VALUES (:title, :image, :content)");
    // Executer la requete
        $req->execute(array(
        ':title' => $title,
        ':image' => $image,
        ':content' => $content
        ));
    }



    public function getMasterpiece()
    {

        $statement = $this->db->query('SELECT * FROM masterpiece');
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

}