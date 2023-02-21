<?php
    require_once __DIR__ . '/controller.php';
    class TourController extends Controller{
        public function index(){
            $this->displayView($this);
        }
    }
