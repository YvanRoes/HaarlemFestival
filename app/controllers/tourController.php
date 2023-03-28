<?php
    require_once __DIR__ . '/controller.php';

    class tourController extends Controller{

        public function index(){
            $this->echoPage("tour");
        }

        public function tourOverview(){
            $this->echoPage(__FUNCTION__);
        }
    }
?>

    <body class="overflow-x-hidden bg-[#F7F7FB] flex flex-col items-center h-fit w-screen"></body>
