<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/13/2019
 * Time: 8:54 PM
 */

namespace App\Core;


class Config {

    protected $salt;

    protected $dbConnection;


    /**
     * @return mixed
     */
    public function getSalt() {

        return $this->salt;
    }


    /**
     * @param mixed $salt
     */
    public function setSalt($salt): void {

        $this->salt = $salt;
    }


    /**
     * @return mixed
     */
    public function getDbConnection() {

        return $this->dbConnection;
    }


    /**
     * @param mixed $dbConnection
     */
    public function setDbConnection($dbConnection): void {

        $this->dbConnection = $dbConnection;
    }

    #put salt generation  method and generation method here when refactoring.
}