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

  public function update_Page($id, $html)
  {
    try {
      $stmt = $this->conn->prepare("UPDATE page SET html = :html WHERE id = :id");
      $stmt->bindParam(':html', $html);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
