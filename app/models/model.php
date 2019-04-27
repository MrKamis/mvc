<?php
    /**
     * Basic class to create Models
     */
    abstract class Model {
        /**
         * Stores database connection
         * @var PDO
         */
        protected $pdo;

        /**
         * Connects to database with config. 
         * Stores config
         */
        public function __construct() {
            require_once __DIR__ . '/../database/config.php';
            $this->pdo = DatabaseConfig::getPDO();
        }

        /**
         * Creates sql query
         * @return PDO::query|false
         */
        public function query($query) {
            return $this->pdo->prepare($query);
        }
    }
?>