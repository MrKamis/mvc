<?php
    class Router {
        /**
         * Routes page with $_GET
         * @param array<string> $get Global variable $_GET
         * @return bool
         */
        public static function route($get) {
            /**
             * Main controller
             * @var Controller
             */
            $controller = null;

            if (isset($get['controller']) && isset($get['method']) && isset($get['params'])) {
                if (file_exists(__DIR__ . '\..\controllers/' . $get['controller'] . 'Controller.php')) {
                    require_once __DIR__ . '\..\controllers/' . $get['controller'] . 'Controller.php';
                    $controllerName = $get['controller'] . 'Controller';
                    $controller = new $controllerName();
                    $method = $get['method'];
                    $controller->$method($get['params']);
                    return true;
                } else {
                    self::errorPage();
                    return false;
                }
            } else if (isset($get['controller']) && isset($get['method'])) {
                if (file_exists(__DIR__ . '\..\controllers/' . $get['controller'] . 'Controller.php')) {
                    require_once __DIR__ . '\..\controllers/' . $get['controller'] . 'Controller.php';
                    $controllerName = $get['controller'] . 'Controller';
                    $controller = new $controllerName();
                    $method = $get['method'];
                    $controller->$method();
                    return true;
                } else {
                    self::errorPage();
                    return false;
                }
            } else if(isset($get['controller'])) {
                if (file_exists(__DIR__ . '\..\controllers/' . $get['controller'] . 'Controller.php')) {
                    require_once __DIR__ . '\..\controllers/' . $get['controller'] . 'Controller.php';
                    $controllerName = $get['controller'] . 'Controller';
                    $controller = new $controllerName();
                    $controller->index();
                    return true;
                } else {
                    self::errorPage();
                    return false;
                }
            } else {
                self::defaultPage();
            }
        }

        /**
         * Redirect to error page
         * @return void
         */
        private static function errorPage() {
            require_once __DIR__ . '/../controllers/errorController.php';
            $controller = new ErrorController();
            $controller->index();
        }

        /**
         * Default page, which user see first
         * @return void
         */
        private static function defaultPage() {
            require_once __DIR__ . '/../controllers/homeController.php';
            $controller = new homeController();
            $controller->index();
        }
    }
?>