<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageService.php';
require_once __DIR__ . '/../models/page.php';
class DanceController extends Controller
{
    private $service;

    public function index()
    {
        $this->echoPage("danceIndex");
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

    public function echoPage($name)
    {
        $this->service = new PageService();
        //add header and footer
        require __DIR__ . '/../views/header.php';
        generateHeader('home', 'light');

        //insert html from db
        $page = $this->service->get_PageByName($name);
        if(is_null($page)){
            $this->displayView("404");
        }
        echo $page->get_html();

        include __DIR__ . '/../views/danceFooter.php';
    }
}

?>

<!-- this is for dance pages dark background -->

<body class="h-[100vh] overflow-x-hidden bg-[#121212] flex flex-col items-center h-fit w-screen"></body>

