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
}
