<?php


global $config;

class DB
{
    private $db;

    public function __construct($config)
    {
        $this->db = new PDO($this->getDsn($config));
    }


    public function query($query, $class = null, $params = [])
    {
        $prepare = $this->db->prepare($query);

        if ($class) {
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        $prepare->execute($params);

        return $prepare;
    }

    private function getDsn($config){
        $driver = $config['driver'];
        unset($config['driver']);

        $dsn = $driver.':'.http_build_query($config, '',';');

        if($driver == 'sqlite'){
            $dsn = $driver.':'.$config['database'];
        }

        return $dsn;
    }
}

$DB = new DB(config('database'));
