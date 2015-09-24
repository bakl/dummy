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

    public function __construct($host = 'localhost', $user = 'root', $password = 'CeRf', $dbname = 'exercise')
    {
        $this->db = new \PDO(
            sprintf('mysql:dbname=%s;host=',$dbname, $host),
            $user,
            $password
        );
    }


    /**
     * Get all travelers with destinations
     *
     * @return array
     */
    public function getAllTravelersWithDestinations()
    {
        return $this->db->query("
                SELECT
                 h.name AS name,
                 GROUP_CONCAT(vd.name SEPARATOR ', ') AS distinations
                FROM human h
                JOIN human_vacation_dist AS hvd
                 ON hvd.human_id = h.id
                JOIN vacation_dist AS vd
                 ON vd.id = hvd.distination_id
                GROUP BY h.id
              ")->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Get travelers who visit passed destinations
     *
     * if $only = true return travelers who visit
     * only passed destinations
     *
     * @param $destinations
     * @param bool|false $only
     * @return array
     */
    public function getTravelersByDestinations($destinations, $only = false)
    {
        $query = "
        SELECT
         h.name
        FROM human h
        LEFT JOIN human_vacation_dist AS hvd
         ON hvd.human_id = h.id
        LEFT JOIN vacation_dist AS vd
         ON vd.id = hvd.distination_id  AND vd.name IN (%s)
        GROUP BY h.id
        HAVING count(*) %s ? AND SUM(IF(vd.name IS NOT NULL, 1, 0)) >= ?
        ";

        $query = sprintf(
            $query,
            rtrim(str_repeat('?, ', count($destinations)), ', '), //placeholders vd.name IN
            ($only) ? '=' : '>=' // operand HAVING COUNT(*) [= or >=]
        );

        $destinationsCount = count($destinations);

        $params = array_merge($destinations, array($destinationsCount, $destinationsCount));

        $st = $this->db->prepare($query);
        $st->execute($params);

        return $st->fetchAll(\PDO::FETCH_ASSOC);
    }




}