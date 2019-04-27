<?php
    /**
     * Basic class for controllers. 
     * Should has index public method. 
     * How it works: URL/controller/method/param
     */
    abstract class Controller {
        /**
         * @var Model
         */
        protected $model;

        /**
         * Loads model and returns into $this->model
         * @return void
         */
        protected function loadModel() {
            if (file_exists(__DIR__ . '/../models/' . str_replace('Controller', '', get_class($this)) . 'Model.php')) {
                require_once __DIR__ . '/../models/' . str_replace('Controller', '', get_class($this)) . 'Model.php';
                $name = str_replace('Controller', '', get_class($this)) . 'Model';
                $this->model = new $name;
            } else {
                echo '<b>Model ' . str_replace('Controller', '', get_class($this)) . 'Model.php not exist</b>';
            }
        }

        /**
         * Main function loads when no methods
         * @return bool
         */
        public function index() {
            return true;
        }

        /**
         * Loads view. 
         * Views should have .phtml
         * @param any $params Any data to loads to view
         * @return void
         */
        protected function loadView($params = false) {
            if (file_exists(__DIR__ . '/../views/' . str_replace('Controller', '', get_class($this)) . 'View.phtml')) {
                require_once __DIR__ . '/../views/' . str_replace('Controller', '', get_class($this)) . 'View.phtml';
            } else {
                echo '<b>No view file!</b>';
            }
        }
    }
?>