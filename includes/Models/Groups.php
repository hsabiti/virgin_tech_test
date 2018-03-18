<?php
/**
 * Created by PhpStorm.
 * User: hsabiti
 * Date: 16/03/2018
 * Time: 16:34
 */

namespace VIRGIN;

use VIRGIN\Database;


class Groups
{
    private $id;
    private $name;
    private $owner_email;
    private $description;

    private $_table = 'groups';



    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getOwnerEmail()
    {
        return $this->owner_email;
    }

    /**
     * @param mixed $owner_email
     */
    public function setOwnerEmail($owner_email)
    {
        $this->owner_email = $owner_email;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param mixed $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Appliction Object
     */
    public function getApplication($application_id)
    {
        return $this->description;
    }

    /**
     * @param group object
     * @param $id group id
     */

    public function fetchById($id)
    {
        $sql = "SELECT id, name, owner_email, description FROM " . $this->_table . " WHERE id=$id";

        $mysqli = Database::getInstance()->getConnection();

        $result = $mysqli->query($sql);

        $row    = $result->fetch_array(MYSQLI_BOTH);

        $this->setId($row['id']);
        $this->setName($row['name']);
        $this->setOwnerEmail($row['owner_email']);
        $this->setDescription($row['description']);

        return $this;
    }
}