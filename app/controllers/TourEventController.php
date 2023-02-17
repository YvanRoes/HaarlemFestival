<?php
    require_once __DIR__ . '/controller.php';
    class TourEventController extends Controller{
        public function index(){
            $this->displayView($this);
        }
    }
?>