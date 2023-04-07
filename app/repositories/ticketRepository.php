<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticket.php';
USE Ramsey\Uuid\Uuid;
class TicketRepository extends Repository
{
    public function get_AllTickets(): array
    {
        $sql = "SELECT * FROM tickets";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }

    public function get_TicketById($id): Ticket
    {
        $sql = "SELECT * FROM tickets WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_CLASS);
       return $result;
    }
    public function get_TicketsByStatus($status)
    {
        $sql = "SELECT * FROM tickets WHERE status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function get_TicketsByUserIdAndStatus($id, $status)
    {
        $sql = "SELECT * FROM tickets WHERE user_id = :user_id AND status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':status', $_SESSION['status']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function post_Ticket($price, $event)
    {
        $sql = "INSERT INTO tickets(id,status,price,exp_date,event) VALUES (:uuid, available, :price, null, :event)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':uuid',  Uuid::uuid4());
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':event', $event);
        $stmt->execute();
    }
}