<?php
require __DIR__ . '/../repositories/eventRepository.php';
require_once __DIR__ . '/../models/event.php';

class EventService
{
    public function get_AllEvents(): array
    {
        $repo = new EventRepository();
        return $repo->get_AllEvents();
    }
    public function get_AllEvent2(): array
    {
        $repo = new EventRepository();
        return $repo->get_AllEvent2();
    }
}