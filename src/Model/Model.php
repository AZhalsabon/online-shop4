<?php
namespace Model;

class Model
{
    protected $PDO;

    public function __construct()
    {
        $this->PDO = new \PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
    }
}