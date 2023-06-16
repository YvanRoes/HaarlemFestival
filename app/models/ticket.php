<?php
use Ramsey\Uuid\Uuid;
require_once __DIR__ . '/../models/event2.php';
class Ticket implements JsonSerializable
{
    private ?Uuid $id = null;
    private ?string $status = null;
    private ?float $price = null;
    private ?int $event = null;
    private ?int $user_id = null;
    private ?DateTime $exp_date = null;
    private ?int $order_id = null;
    private ?bool $isAllAccess = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }
    public function setId(?Uuid $id): void
    {
        $this->id = $id;
    }
    public function getStatus(): ?string
    {
        return $this->status;
    }
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }
    public function getEvent(): ?int
    {
        return $this->event;
    }
    public function setEvent(?int $event): void
    {
        $this->event = $event;
    }
    public function getExpDate(): ?DateTime
    {
        return $this->exp_date;
    }
    public function setExpDate(?DateTime $exp_date): void
    {
        $this->exp_date = $exp_date;
    }
    public function getOrderId(): ?int
    {
        return $this->order_id;
    }
    public function setOrderId(?int $order_id): void
    {
        $this->order_id = $order_id;
    }
    public function getUser(): ?int
    {
        return $this->user_id;
    }
    public function setUser(?int $user_id): void
    {
        $this->user_id = $user_id;
    }
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'price' => $this->price,
            'event' => $this->event,
            'exp_date' => $this->exp_date,
            'order_id' => $this->order_id,
            'user_id' => $this->user_id,
        ];
    }
}
?>