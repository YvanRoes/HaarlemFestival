<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/event.php';

class EventRepository extends Repository
{
    public function get_AllEvents()
    {
        try {
            $stmt = $this->conn->prepare("SELECT id, title, description, small_title, imagePath, pageLink FROM homepage_events");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event');
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function get_AllEvent2()
    {
        try {
            $stmt = $this->conn->prepare("SELECT id FROM events");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Event2');
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}