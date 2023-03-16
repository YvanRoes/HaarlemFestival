<?php
require __DIR__ . '/../../services/eventService.php';

class EventsController
{
    private $eventService;

    function __construct()
    {
        $this->eventService = new EventService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $result = $this->eventService->get_AllEvents();
            header('Content-type: Application/JSON');
            echo json_encode($result);
        }
    }
}