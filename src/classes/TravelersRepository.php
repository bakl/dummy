<?php

namespace Exercise;

/**
 * User: sergeymartyanov
 * Date: 24.09.15
 * Time: 19:17
 */
class TravelersRepository
{
    private $db;

    public function __construct($host = 'localhost', $user = 'root', $password = '123456', $dbname = 'exercise')
    {
        $this->db = new \PDO(
            sprintf('mysql:dbname=%s;host=',$dbname, $host),
            $user,
            $password
        );
    }


}