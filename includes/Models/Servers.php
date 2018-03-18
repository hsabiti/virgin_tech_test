<?php
/**
 * Created by PhpStorm.
 * User: hsabiti
 * Date: 16/03/2018
 * Time: 16:42
 */

namespace VIRGIN;

use VIRGIN\Database;

class Servers
{
    private $id;
    private $name;
    private $ipv4;

    private $group;
    private $application;

    private $_table = 'servers';


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
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup(Groups $group)
    {
        $this->group = $group;
    }

    /**
     * @return mixed
     */
    public function getIpv4()
    {
        return $this->ipv4;
    }

    /**
     * @param mixed $ipv4
     */
    public function setIpv4($ipv4)
    {
        $this->ipv4 = $ipv4;
    }

    /**
     * @return mixed
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param mixed $application
     */
    public function setApplication(Applications $application)
    {
        $this->application = $application;
    }

    /**
     * @param array applications
     */
    public function fetchOne()
    {
        $sql = "SELECT id, name, group_id, ipv4, application_id FROM " . $this->_table . " ORDER BY name LIMIT 1";

        $mysqli = Database::getInstance()->getConnection();

        $result = $mysqli->query($sql);

        if ($result->num_rows == 0) {
            throw new \Exception(Database::NO_DATA_AVAILABLE);
        }

        $row = $result->fetch_array(MYSQLI_BOTH);

        $this->setId($row['id']);
        $this->setName($row['name']);
        $this->setIpv4($row['ipv4']);
        $application = new Applications();
        $this->setApplication($application->fetchById($row['application_id']));
        $group = new Groups();
        $this->setGroup($group->fetchById($row['group_id']));

        return $this;
    }

}