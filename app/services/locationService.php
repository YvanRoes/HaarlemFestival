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

  public function insert_location(Location $location){
    $repo = new LocationRepository();
    return $repo->insert_location($location);
  }

  public function delete_locationById($id){
    $repo = new LocationRepository();
    return $repo->delete_locationById($id);
  }

  public function edit_locationById($id, $name, $address, $cap){
    $repo = new LocationRepository();
    return $repo->edit_locationById($id, $name, $address, $cap);
  }
}
