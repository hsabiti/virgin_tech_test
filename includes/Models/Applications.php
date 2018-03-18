<?php
/**
 * Created by PhpStorm.
 * User: hsabiti
 * Date: 16/03/2018
 * Time: 16:41
 */

namespace VIRGIN;

use VIRGIN\Database;

class Applications
{
    private $id;
    private $version;
    private $name;
    private $description;

    private $_table = 'applications';

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
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

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
     * @param array applications
     */
    public function fetchAll()
    {
        $sql = "SELECT id, name, version, description FROM " . $this->_table . " ORDER BY name";

        $mysqli = Database::getInstance()->getConnection();

        $result = $mysqli->query($sql);

        if ($result->num_rows == 0) {
            throw new \Exception(Database::NO_DATA_AVAILABLE);
        }

        return $result->fetch_all(MYSQLI_BOTH);
    }

    /**
     * @param application object
     * @param $id application id
     */

    public function fetchById($id)
    {
        $sql = "SELECT id, name, version, description FROM " . $this->_table . " WHERE id=$id";

        $mysqli = Database::getInstance()->getConnection();

        $result = $mysqli->query($sql) or die($mysqli->error . " " . $sql);

        if ($result->num_rows == 0) {
            throw new \Exception(Database::NO_DATA_AVAILABLE);
        }

        $row    = $result->fetch_array(MYSQLI_BOTH);

        $this->setId($row['id']);
        $this->setName($row['name']);
        $this->setVersion($row['version']);
        $this->setDescription($row['description']);

        return $this;
    }


}