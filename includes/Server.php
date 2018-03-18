<?php
/**
 * Created by PhpStorm.
 * User: hsabiti
 * Date: 16/03/2018
 * Time: 16:48
 */

namespace VIRGIN;



class Server
{

    private $db_handle;

    public function __construct($db_handle)
    {
        $this->db_handle = $db_handle;
    }

    /**
     * @return server Name
     */
    public function Name()
    {
        $servers = new Servers();
        return $servers->fetchOne()->getName();
    }

    /**
     * @return All Applications
     */
    public function Applications()
    {
        $applications = new Applications();
        return $applications->fetchAll();
    }

    /**
     * @return version
     * @param $application id of application
     */
    public function Version($application)
    {
        if (!is_int($application)) {
            throw new \Exception("Invalid application id  " . $application);
        }
        $applications = new Applications();
        if(!$application = $applications->fetchById($application)) {
            throw new \Exception("Failed to Retrieve application for " . $application);
        }

        return $application->getVersion();
    }

    /**
     * @return All Applications
     */
    public function OwnerEmail()
    {
        $servers = new Servers();
        return $server = $servers->fetchOne()->getGroup()->getOwnerEmail();
    }

}