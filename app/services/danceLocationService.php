<?php
require __DIR__ . '/../repositories/danceLocationRepository.php';
require_once __DIR__ . '/../models/danceLocation.php';
class DanceLocationService
{
  private $repo;
  function __construct()
  {
    $this->repo = new DanceLocationRepository();
  }
  public function get_AllDanceLocations(): array
  {
    return $this->repo->get_AllDanceLocations();
  }

  public function get_DanceLocationById($id): ?DanceLocation
  {
    return $this->repo->get_DanceLocationById($id);
  }

  public function delete_locationById($id){
    return $this->repo->delete_locationById($id);
  }

  public function insert_location($location){
    return $this->repo->insert_location($location);
  }
  public function edit_locationById($id, $name, $address, $cap){
    return $this->repo->edit_locationById($id, $name, $address, $cap);
  }
}
