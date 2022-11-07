<?php

    $servername = "uploaddatabase.cmi7k84twi7t.us-east-1.rds.amazonaws.com";
    $dbUsername = "nikhil";
    $dBPassword = "TFjune2022";
    $dBName = "login";


    // DB Connection
    $conn = mysqli_connect($servername,$dbUsername,$dBPassword,$dBName);

    if (!$conn){
        die("connection failed: " .mysqli_connect_error());
    }

    
    // class DbConnect {
    //     private $host = 'uploaddatabase.cmi7k84twi7t.us-east-1.rds.amazonaws.com';
    //     private $dbName = 'Activity_mapping';
    //     private $user = 'nikhil';
    //     private $pass = 'TFjune2022';

    // public function connect() {
    //     try {
    //         $conn = new PDO('mysql:host=' . $this->host .';dbname=' . $this->dbName, $this->user, $this->pass );
    //         $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //         return $conn;
    //         } catch( PDOException $e){
    //         echo 'Database Error : '. $e->getMessage();
    //         }
    //     }
    // }

