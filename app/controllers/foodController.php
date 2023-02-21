<?php
    require_once __DIR__ . '/controller.php';
    class FoodController extends Controller{
        public function index(){
            $this->displayView($this);
        }
    }
?>