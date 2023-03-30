<?php
require_once __DIR__ . '/controller.php';
class DanceController extends Controller
{

    public function index()
    {
        $this->echoPage("dance");
    }


    //create function with name same as in db
    public function martinGarrix()
    {
        $this->echoPage(__FUNCTION__);
    }

    public function sub2()
    {
        $this->echoPage(__FUNCTION__);
    }
}

?>

<!-- this is for dance pages dark background -->

<body class="h-[100vh] overflow-x-hidden bg-[#121212] flex flex-col items-center h-fit w-screen"></body>

