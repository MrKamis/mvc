<?php
    class DatabaseConfig {
        private static $username;
        private static $password;
        private static $host;
        private static $dbname;
        private static $type = 'sqlite';
        private static $file = 'database.sqlite';
        
        /**
         * Returns PDO object
         * @return PDO|false
         */
        public static function getPDO() {
            switch (self::$type) {
                case 'sqlite':
                    return new PDO('sqlite:' . __DIR__ . '/' . self::$file);
                case 'mysql':
                    return new PDO('mysql:host=' . self::$host . ';dbname=' . self::$dbname, self::$username, self::$password);
                default:
                    echo '<b>Error with connection to database!</b>';
                    return false;
            }
        }

        /**
         * Creates tables
         * @return bool
         */
        public static function createTables() {

        }
    }
?>