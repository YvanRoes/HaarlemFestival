<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticket.php';
USE Ramsey\Uuid\Uuid;
class TicketRepository extends Repository
{
    public function get_AllTickets(): array
    {
        $sql = "SELECT * FROM ticket";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function Get_AllTicketsByEventIdAndStatus($id, $status): array
    {
        $sql = "SELECT * FROM ticket WHERE event_id = :id AND status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function get_TicketsByEventId($id): array
    {
        $sql = "SELECT * FROM ticket WHERE event_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function get_TicketById($id): Ticket
    {
        $sql = "SELECT * FROM ticket WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_CLASS);
       return $result;
    }
    public function get_TicketsByStatus($status)
    {
        $sql = "SELECT * FROM ticket WHERE status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function get_TicketsByUserIdAndStatus($id, $status)
    {
        $sql = "SELECT * FROM ticket WHERE user_id = :user_id AND status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':status', $_SESSION['status']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function post_Ticket($event)
    {
        $sql = "INSERT INTO ticket(uuid,status,event_id,price,user_id,exp_date,order_id) VALUES (uuid(), 'available', :event, null, null, null,null)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':event', $event);
        $stmt->execute();
    }
}