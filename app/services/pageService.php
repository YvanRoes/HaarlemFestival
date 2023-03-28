<?php
require_once __DIR__ . '/../repositories/pageRepository.php';
require_once __DIR__ . '/../models/page.php';
class PageService
{
  public function get_AllPages(): array
  {
    $repo = new PageRepository();
    return $repo->get_AllPages();
  }

  public function get_PageByName($name):Page
  {
    $pages = $this->get_AllPages();
    foreach ($pages as $page) {
      if ($page->get_name() == $name) {
        return $page;
      }
    }
    return null;
  }

  public function update_Page($id, $html)
  {
    $repo = new PageRepository();
    $repo->update_Page($id, $html);
  }
}
