<?php 
    require_once __DIR__ . '/controller.php';
    class RegisterController extends Controller{
        public function index(){          
            $this->displayView($this);
        }
    }
?>