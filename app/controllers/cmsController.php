<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageService.php';
require_once __DIR__ . '/../models/page.php';

class CmsController extends Controller
{
    private $service;
    public function index()
    {
        if (isset($_GET['page'])) {
            $pageName = $_GET['page'];
            $page = $this->service->get_PageByName($pageName);
            $_SESSION['EditableHTML'] = $page->get_html();
        }
        //$this->displayView($this);
        require __DIR__ . '/../views/cms/index.php';
    }

    function __construct()
    {
        $this->service = new PageService();
    }
}
