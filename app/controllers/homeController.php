<?php 
    require_once 'controller.php';
    class homeController extends Controller {
        public function index() {
            $this->loadView();
        }
    }
?>
