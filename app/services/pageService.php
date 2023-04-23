<?php
require_once __DIR__ . '/../repositories/pageRepository.php';
require_once __DIR__ . '/../models/page.php';
class PageService
{
  private $repo;

  public function __construct()
  {
    $this->repo = new PageRepository();
  }

  public function get_AllPages(): array
  {
    return $this->repo->get_AllPages();
  }

  public function get_PageByPath($path):Page
  {
    $pages = $this->get_AllPages();
    foreach ($pages as $page) {
      if ($page->get_path() == $path) {
        return $page;
      }
    }
    return null;
  }

  public function update_Page($id, $html)
  {
    $this->repo->update_Page($id, $html);
  }

  public function create_Page($page)
  {
    $this->repo->create_Page($page);
  }
}
