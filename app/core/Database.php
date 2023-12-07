<?php

    class Database
    {
        public $con;
        public $server = "localhost";
        public $username = "root";
        public $password = "";
        public $dtb = "pizzacompany";

        function __construct()
        {
            $this->con = mysqli_connect($this->server, $this->username, $this->password, $this->dtb);
            if (!$this->con) {
                die('Connection failed: ' . mysqli_connect_error());
            } else {
                mysqli_query($this->con, "SET NAMES 'utf8'");
                echo 'Connected successfully!';
            }
        }
    }

    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $dtb = "pizza";

    // $con = mysqli_connect($server, $username, $password, $dtb);
    // if($con->connect_error)
    // {
    //     die('Connection failed: ' . $con->connect_error);
    // }
    // else 
    // {
    //     mysqli_query($con, "SET NAMES 'utf8'");
    
    // }

?>