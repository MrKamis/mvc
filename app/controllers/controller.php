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
         * @param array<any> $data It's what be showed
         * @return void
         */
        protected function loadView($data = []) {
            if (file_exists(__DIR__ . '/../views/' . str_replace('Controller', '', get_class($this)) . 'View.phtml')) {
                require_once __DIR__ . '/../views/' . str_replace('Controller', '', get_class($this)) . 'View.phtml';
            } else {
                echo '<h3>Error view</h3>
                <p>No view file found!</p>';
            }
        }

        /**
         * Load view with basic template
         * @param string $title Title of page
         * @param array<any> $data 
         * @param string $description
         * @return void
         */
        protected function loadViewBasic($title = null, $data = [], $description = null) {
            if (file_exists(__DIR__ . '/../views/' . str_replace('Controller', '', get_class($this)) . 'View.phtml')) {
                require_once __DIR__ . '/../views/basic/header.phtml';
                require_once __DIR__ . '/../views/' . str_replace('Controller', '', get_class($this)) . 'View.phtml';
                require_once __DIR__ . '/../views/basic/footer.phtml';
            } else {
                echo '<h3>Error view</h3>
                <p>No view file found!</p>';
            }
        }

        /**
         * Loads view file with custom path
         * @param string $file File/path
         * @param 
         */
        protected function loadFileView($file = null, $data = []) {
            if (file_exists(__DIR__ . '/../views/' . $file)) {
                require_once __DIR__ . '/../views/' . $file;
            } else {
                echo '<h3>Error view</h3>
                <p>No view file found!</p>
                <p>File: ' . $file . '</p>';
            }
        }

        /**
         * Loads view file with custom file with basic template
         * @param string $file Path or file
         * @param string $title Title of page
         * @param array<any> $data 
         * @param string $description 
         * @return void
         */
        protected function loadFileViewBasic($file = null, $title = null, $data = [], $description = null) {
            if (file_exists(__DIR__ . '/../views/' . $file)) {
                require_once __DIR__ . '/../views/basic/header.phtml';
                require_once __DIR__ . '/../views/' . $file;
                require_once __DIR__ . '/../views/basic/footer.phtml';
            } else {
                echo '<h3>Error view</h3>
                <p>No view file found!</p>
                <p>File: ' . $file . '</p>';
            }
        }
    }
?>