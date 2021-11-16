<?php

class Database
{
    private $con;

    //construct
    function __construct()
    {
        $this->con = $this->connect();
    }

    
    //connection to db
    private function connect()
    {
        
        $string = "mysql:host=localhost;oisp_db";

        try
        {
            $connection = new PDO($string, DBUSER,DBPASS);
            return $connection;

        }catch(PDOException $e)
        {
            echo $e -> getMessage();
            die;
        }

        return false;
       
    }

    public function write($query,$data_array = [])
    {
        $con = $this->connect();
        $statement = $con -> prepare($query);
        
        foreach ($data_array as $key => $value) {
            # code...
            $statement ->bindparam(':'. $key,$value);
        }

        $check = $statement->execute();
        if($check)
        {
            return true;
        }
        return false;


    }
    public function generate_id($max)
    {
        $rand = "";
        $rand_count = rand(4,$max);
        
        for ($i=0; $i < $rand_count; $i++) { 
            # code...
            $r = rand(0,9);
            $rand .= $r;
        }
        return $rand;
    }
}

