<?php

    class Database
    {
        public $con;
        public $server = "localhost";
        public $username = "root";
        public $password = "";
        public $dtb = "pizza";

        function __construct()
        {
            $this->con = mysqli_connect($this->server, $this->username, $this->password, $this->dtb);
            if(mysqli_connect_errno())
            {
                die('Connection failed: ' . mysqli_connect_error());
            }
            else
            {
                mysqli_query($this->con, "SET NAMES 'utf8'");
            }
        }
    }

?>