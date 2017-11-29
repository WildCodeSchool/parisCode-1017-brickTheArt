<?php
/**
 * Created by PhpStorm.
 * User: anysiabeauzel
 * Date: 29/11/2017
 * Time: 14:45
 */

namespace BrickTheArt\Model\Entity;


class Information
{
    private $id;
    private $home;
    private $concept;

    /**
     * @return mixed
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * @param mixed $home
     */
    public function setHome($home)
    {
        $this->home = $home;
    }

    /**
     * @return mixed
     */
    public function getConcept()
    {
        return $this->concept;
    }

    /**
     * @param mixed $concept
     */
    public function setConcept($concept)
    {
        $this->concept = $concept;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }




}