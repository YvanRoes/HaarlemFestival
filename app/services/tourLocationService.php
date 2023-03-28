<?php
require __DIR__ . '/../repositories/tourLocationRepository.php';
require_once __DIR__ . '/../models/tourLocation.php';
class TourLocationService
{
  public function get_AllTourLocations(): array
  {
    $repo = new TourLocationRepository();
    return $repo->get_AllTourLocations();
  }

  public function get_TourLocationById(int $id)
  {
    $repo = new TourLocationRepository();
    return $repo->get_TourLocationById($id);
  }
}
