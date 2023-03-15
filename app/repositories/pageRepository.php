<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/page.php';
class PageRepository extends Repository
{
  public function get_AllPages()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, name, html FROM page");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'Page');
      $page = $stmt->fetchAll();
      return $page;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
