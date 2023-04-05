<?php
require __DIR__ . '/../repositories/danceLocationRepository.php';
require_once __DIR__ . '/../models/danceLocation.php';
class DanceLocationService
{
  public function get_AllDanceLocations(): array
  {
    $repo = new DanceLocationRepository();
    return $repo->get_AllDanceLocations();
  }

  public function get_DanceLocationById($id): ?DanceLocation
  {
    $repo = new DanceLocationRepository();
    return $repo->get_DanceLocationById($id);
  }
}
