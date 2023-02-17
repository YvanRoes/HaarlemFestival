<?php
    require_once __DIR__ . '/controller.php';
    class HomePageController extends Controller{
        public function index(){
            $this->displayView($this);
        }
    }
?>