<?php
    require_once __DIR__ . '/controller.php';
    class FoodEventController extends Controller{
        public function index(){
            $this->displayView($this);
        }
    }
?>