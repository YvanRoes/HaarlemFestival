<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageService.php';
require_once __DIR__ . '/../models/page.php';
class DanceController extends Controller
{
    private $service;

    public function index()
    {
        $this->displayView($this);
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
        $page = $this->service->get_PageByName($name);
        echo $page->get_html();
    }
}
