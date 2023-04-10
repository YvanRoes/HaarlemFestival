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

    public function get_TicketById($id): array
    {
        $sql = "SELECT * FROM ticket WHERE uuid = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        echo 'returning result' ;
       return $result;
    }
    public function get_TicketsByStatus($status)
    {
        $sql = "SELECT * FROM ticket WHERE status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS,);	
        return $result;
    }
    public function get_TicketsByUserIdAndStatus($id, $status)
    {
        $sql = "SELECT * FROM ticket JOIN WHERE user_id = :user_id AND status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['user_id']);
        $stmt->bindParam(':status', $_SESSION['status']);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
    public function get_QuantityOfTicketsByEventIdAndStatus($id, $status)
    {
        $sql = "SELECT COUNT(*) FROM ticket WHERE event_id = :id AND status = :status";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':status', $status);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_NUM);
        return $result[0];
    }
    public function get_AvailableEventTickets($eventTable){
        try
        {
            $sql = 'select t.uuid, t.status, t.event_id, t.price, t.user_id, t.exp_date from ticket as t join :event AS e where t.event_id = e.id and status=`available`;';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':event', $eventTable);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_AvailableEventYummieTickets(){
        try
        {
            $sql = 'select t.uuid, t.status, t.event_id, t.price, t.user_id, t.exp_date from ticket as t join event_yummie AS e where t.event_id = e.id and status="available";';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_AvailableEventEdmTickets(){
        try
        {
            $sql = 'select t.uuid, t.status, t.event_id, t.price, t.user_id, t.exp_date from ticket as t join event_edm AS e where t.event_id = e.id and status="available";';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function get_AvailableEventStrollTickets(){
        try
        {
            $sql = 'select t.uuid, t.status, t.event_id, t.price, t.user_id, t.exp_date from ticket as t join event_stroll AS e where t.event_id = e.id and status="available";';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            return $result;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function post_Ticket($event)
    {
        $sql = "INSERT INTO ticket(uuid,status,event_id,price,user_id,exp_date) VALUES (uuid(), 'available', :event, null, null, null)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':event', $event);
        $stmt->execute();
    }
    public function update_Ticket($ticket)
    {
        echo 'in update ticket';
        $sql = "UPDATE ticket SET status = :status, user_id = :user_id, exp_date = :exp_date WHERE uuid = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':status', $ticket->status);
        $stmt->bindParam(':user_id', $ticket->user_id);
        $stmt->bindParam(':exp_date', $ticket->exp_date);
        $stmt->bindParam(':id', $ticket->uuid);
        $stmt->execute();
    }
}