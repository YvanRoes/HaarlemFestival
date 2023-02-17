<?php
    require_once __DIR__ . '/controller.php';
    class DanceEventController extends Controller{
        public function index(){
            $this->displayView($this);
        }
    }
?>