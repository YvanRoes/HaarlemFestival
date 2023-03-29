<?php
    require_once __DIR__ . '/controller.php';

    class HomeController extends Controller{

        public function index(){
            $this->echoPage("home");
        }
    }
?>

<body class="h-[100vh] overflow-x-hidden bg-[white]"></body>