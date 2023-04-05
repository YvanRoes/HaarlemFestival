<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/ticket.php';
class TicketRepository extends Repository
{
    public function get_AllTickets()
    {
        try {
            $sql = "SELECT id, status, price, user_id FROM ticket";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
            $r = $stmt->fetchAll();
            return $r;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function get_TicketById($id): Ticket
    {
        $sql = "SELECT * FROM tickets WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $ticket = new Ticket($result['id'], $result['status'], $result['price'], $result['user_id']);
        return $ticket;
    }
    public function get_TicketsByStatus($status)
    {
        $sql = "SELECT * FROM tickets WHERE status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tickets = [];
        foreach ($result as $row) {
            $ticket = new Ticket($row['id'], $row['status'], $row['price'], $row['user_id']);
            array_push($tickets, $ticket);
        }
        return $tickets;
    }
    public function get_TicketsByUserIdAndStatus($id, $status)
    {
        $sql = "SELECT * FROM tickets WHERE user_id = :user_id AND status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':status', $_SESSION['status']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $tickets = [];
        foreach ($result as $row) {
            $ticket = new Ticket($row['id'], $row['status'], $row['price'], $row['user_id']);
            array_push($tickets, $ticket);
        }
        return $tickets;
    }
}