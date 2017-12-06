<?php

namespace BrickTheArt\Model\Repository;

use PDO;
use BrickTheArt\Model\Entity\User;

/**
 * Class UserManager
 * @package MyApp\Repository
 */
class UserManager extends EntityManager
{
	/**
	 * Get all user
	 * @return array
	 */
	public function getAll(){
		$statement = $this->db->query('SELECT * FROM user');
		return $statement->fetchAll(PDO::FETCH_OBJ, User::class);
	}

	/**
	 * Get one user
	 * @param $id int
	 * @return mixed
	 */
	public function getOne($id){
		$statement = $this->db->prepare("SELECT * FROM user WHERE id = :id");
		$statement->execute([
			':id' => $id
		]);
		return $statement->fetch();
	}

	/**
	 * Get password
	 */
	public function getPassword($password){
	    $statement = $this->db->prepare("SELECT password from user");
	    $statement->execute([
	        ':password' => $password
        ]);
        return $statement->fetch();
	}


    /**
     * Get login
     */
    public function getLogin($login){
        $statement = $this->db->prepare("SELECT login from user");
        $statement->execute([
            ':login' => $login
        ]);
        return $statement->fetch();
    }





	/**
	 * Update one user
	 */
	public function update(){
//		....
	}

	/**
	 * Delete one user
	 */
	public function delete(){
//		....
	}
}