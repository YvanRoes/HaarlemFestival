<?php
require __DIR__ . '/../repositories/pageRepository.php';
require_once __DIR__ . '/../models/page.php';
class PageService
{
  public function get_AllPages(): array
  {
    $repo = new PageRepository();
    return $repo->get_AllPages();
  }

  public function get_PageByName($name)
  {
    $pages = $this->get_AllPages();
    foreach ($pages as $page) {
      if ($page->get_name() == $name) {
        return $page;
      }
    }
    return null;
  }
}
