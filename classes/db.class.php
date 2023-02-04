<?php
    class db{

        private $host;
        private $usuario;
        private $pass;
        private $db;

        private $connection;
    

        function __construct($host, $usuario, $pass, $db)
        {
            $this->host = $host;
            $this->usuario = $usuario;
            $this->pass = $pass;
            $this->db = $db;
        }

        function connect()
        {
            // $opciones = array(
            //     PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            //     PDO::MYSQL_ATTR_FOUND_ROWS => true
            // );
     
            $this->connection = new db(
                'mysql:host=' . $this->host . ';dbname=' . $this->db,
                $this->usuario,
                $this->pass,
                //$opciones
            );
        }

    }
?>