<?php
    require_once __DIR__ . '/controller.php';
    class tourController extends Controller{
        public function index(){
            $this->displayView($this);
        }
    }
