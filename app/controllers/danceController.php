<?php
require_once __DIR__ . '/controller.php';
require_once __DIR__ . '/../services/danceSessionService.php';
require_once __DIR__ . '/../services/artistService.php';
require_once __DIR__ . '/../services/danceLocationService.php';
class DanceController extends Controller
{
    private $danceSessionService;
    private $artistService;
    private $danceLocationService;

    public function __construct()
    {
        $this->danceSessionService = new DanceSessionService();
        $this->artistService = new ArtistService();
        $this->danceLocationService = new DanceLocationService();
    }

    public function index()
    {
        $this->echoPage("dance");
    }


    //create function with name same as in db
    public function detailPage()
    {
        if (isset($_GET['id'])) {
            $artist = $this->artistService->get_ArtistById($_GET['id']);
            $songsString = $artist->get_popularSongs();
            $popularSongs = explode(":", $songsString);
            $danceSessions = $this->danceSessionService->get_AllDanceSessionsByArtistId($_GET['id']);

            foreach ($danceSessions as $session) {
                $venue = $this->danceLocationService->get_DanceLocationById($session->get_venue());
            }
        }
        require __DIR__ . '/../views/dance/detailPage.php';

        $this->displayView($this);
    }
}

?>

<!-- this is for dance pages dark background -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lato&display=swap');

    * {
        padding: 0px;
        margin: 0px;
        /* outline: 1px solid red; */
    }
</style>

<body class="h-[100vh] overflow-x-hidden bg-[#121212] flex flex-col items-center h-fit w-screen"></body>