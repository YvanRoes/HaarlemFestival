<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/pageService.php';
require_once __DIR__ . '/../models/page.php';

class CmsController extends Controller
{
    private $service;
    public $content;

    function __construct() {
        $this->service = new PageService();
    }

    public function index() {
        error_reporting(E_ALL & ~E_NOTICE);
        if (isset($_GET['page'])) {
            $path = $_GET['page'];

            if($path != "custom"){
                $page = $this->service->get_PageByPath($path);
                $this->content = $page->get_html();
            }
            require __DIR__ . '/../views/cms/index.php';

            // insert page
            if (isset($_POST['editor']) && $path == 'custom') {
                $this->insert_page();
                return;
            }    
            // update page
            else if (isset($_POST['editor']) && $path != 'custom') {
                $this->update_page($page, $path);
                return;
            }
            return;        
        }
        require __DIR__ . '/../views/404/index.html';
        
    }

    function insert_page(){
        $html = $_POST['editor'];
        $title = $_POST['pageNameInput'];
        $newPage = new Page();
        $path = preg_replace('/\s+/', '', $title);
        $newPage->__set_path($path);
        $newPage->__set_html($html);
        $newPage->__set_title($title);
        $this->service->create_Page($newPage);
        return;
    }


    function update_page($page, $path) {
        $html = ($_POST['editor']);
        $this->service->update_Page($page->get_id(), $html);
        $page = $this->service->get_PageByPath($path);
        $this->content = $page->get_html();
    }
}
