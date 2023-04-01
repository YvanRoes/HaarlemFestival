<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/danceSession.php';
class DanceSessionRepository extends Repository
{
  public function get_AllDanceSessions()
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, venue, artist_id, date, session, duration, ticketsAmount, price FROM event_edm");
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'DanceSession');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public function get_AllDanceSessionsByArtistId($artist_id)
  {
    try {
      $stmt = $this->conn->prepare("SELECT id, venue, artist_id, date, session, duration, ticketsAmount, price FROM event_edm WHERE artist_id = :artist_id");
      $stmt->bindParam(':artist_id', $artist_id);
      $stmt->execute();

      $stmt->setFetchMode(PDO::FETCH_CLASS, 'DanceSession');
      $r = $stmt->fetchAll();
      return $r;
    } catch (PDOException $e) {
      echo $e;
    }
  }
}