<?php
require __DIR__ . '/../repositories/locationRepository.php';
require_once __DIR__ . '/../models/location.php';
class LocationService
{
  public function get_AllLocations(): array
  {
    $repo = new LocationRepository();
    return $repo->get_AllLocations();
  }
}
