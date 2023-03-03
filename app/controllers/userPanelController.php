<?php
    require_once __DIR__ . '/controller.php';
    class UserPanelController extends Controller{
        public function index(){
            $this->displayView($this);
        }
    }

?>