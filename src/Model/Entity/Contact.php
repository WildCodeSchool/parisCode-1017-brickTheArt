<?php
/**
 * Created by PhpStorm.
 * User: anysiabeauzel
 * Date: 28/11/2017
 * Time: 14:53
 */

namespace BrickTheArt\Model\Entity;


class Contact
{
    private $id;
    private $phone;
    private $adress;
    private $opening;

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @return mixed
     */
    public function getOpening()
    {
        return $this->opening;
    }

    /**
     * @param mixed $opening
     */
    public function setOpening($opening)
    {
        $this->opening = $opening;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



}