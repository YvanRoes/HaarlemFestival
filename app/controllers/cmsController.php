<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageService.php';
require_once __DIR__ . '/../models/page.php';

class CmsController extends Controller
{
    private $service;
    public $content;
    public function index()
    {
        if (isset($_GET['page'])) {
            $pageName = $_GET['page'];
            
            $page = $this->service->get_PageByName($pageName);
            $this->content = $page->get_html();
            
            if (isset($_POST['editor'])) {
                $html = ($_POST['editor']);
                $this->service->update_Page($page->get_id(), $html);
                $page = $this->service->get_PageByName($pageName);
                $this->content = $page->get_html();
            }            
            require __DIR__ . '/../views/cms/index.php';
        }
        else {
            require __DIR__ . '/../views/404/index.html';
        }
        
    }

    function __construct()
    {
        $this->service = new PageService();
    }
}
