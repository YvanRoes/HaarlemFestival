<?php
require __DIR__ . '/../repositories/artistRepository.php';
require_once __DIR__ . '/../models/artist.php';
class ArtistService
{
  public function get_AllArtists(): array
  {
    $repo = new ArtistRepository();
    return $repo->get_AllArtists();
  }

  public function get_ArtistById($id): Artist
  {
    $repo = new ArtistRepository();
    return $repo->get_ArtistById($id);
  }
  
  public function insert_Artist(Artist $artist){
    $repo = new ArtistRepository();
    return $repo->insert_Artist($artist);
  }

  public function delete_artistById($id){
    $repo = new ArtistRepository();
    return $repo->delete_artistById($id);
  }

  public function edit_artistById($id, $name, $genres, $description){
    $repo = new ArtistRepository();
    return $repo->edit_artistById($id , $name, $genres, $description);
  }
}
