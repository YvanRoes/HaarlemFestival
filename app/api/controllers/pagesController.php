<?php
require_once __DIR__ . '/../../services/pageService.php';


class PagesController{
  private $pageService;

  public function index(){
    if($_SERVER["REQUEST_METHOD"] == "GET"){
      $pages = $this->pageService->get_AllPages();
      header('Content-type: Application/JSON');
      echo json_encode($pages);
    }
  }

  function __construct(){
    $this->pageService = new PageService();
  }
}
