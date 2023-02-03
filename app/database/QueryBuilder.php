<?php

namespace App\App\Database;
use \PDO;

// A class responsible for building database queries.
class QueryBuilder
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function selectAll(string $table, string $where, string $fetchClass=null)
    {
        $sql = "select * from {$table} ";

        if ($where) {
            $sql .= "where {$where}";
        }

        $query = $this->db->prepare($sql);

        $query->execute();
        
        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function selectLimitOrder(string $table, string $start, string $limit, string $order)
    {
        $sql = "select * from {$table}";

        if ($order) {
            $sql .= " ORDER BY {$order}";
        }

        if ($limit) {
            $sql .= " LIMIT {$start}, {$limit}";
        }

        $query = $this->db->prepare($sql);

        $query->execute();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $toDoItems[] = $row;
        }

        return $toDoItems;
    }

    public function selectCount(string $table)
    {
        $query = $this->db->prepare("select count(*) from {$table};");
        $query->execute();
        $count = $query->fetchColumn();
        
        return $count;
    }

    public function insert(string $table, array $parameters)
    {
        $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                $table,
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
        );  
        $query = $this->db->prepare($sql);
        $result = $query->execute($parameters);

        return $result;
    }

    public function update(string $table, array $parameters)
    {
        $sql = sprintf(
                "UPDATE %s SET %s = %s WHERE id = %d",
                $table, $parameters['column'], $parameters['value'], $parameters['id']);

        $query = $this->db->prepare($sql);
        $result = $query->execute($parameters);

        return $result;
    }
}