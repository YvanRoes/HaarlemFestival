<?php
require __DIR__ . '/../repositories/danceSessionRepository.php';
require_once __DIR__ . '/../models/danceSession.php';
class DanceSessionService
{
  public function get_AllDanceSessions()
  {
    $repo = new DanceSessionRepository();
    return $repo->get_AllDanceSessions();
  }
  
  public function get_AllDanceSessionsByArtistId($artist_id)
  {
    $repo = new DanceSessionRepository();
    return $repo->get_AllDanceSessionsByArtistId($artist_id);
  }
}