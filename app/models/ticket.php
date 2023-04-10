<?php
use Ramsey\Uuid\Uuid;
require_once __DIR__ . '/../models/event2.php';
class Ticket implements JsonSerializable
{
    private ?string $id = null;
    private ?string $status = null;
    private ?float $price = null;
    private ?int $event = null;
    private ?int $user = null;
    private ?DateTime $exp_date = null;
    public function getId(): ?string
    {
        return $this->id;
    }
    public function setId(?string $id): void
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
    public function getUser(): ?int
    {
        return $this->user;
    }
    public function setUser(?int $user): void
    {
        $this->user = $user;
    }
    public function getExpDate(): ?DateTime
    {
        return $this->exp_date;
    }
    public function setExpDate(?DateTime $exp_date): void
    {
        $this->exp_date = $exp_date;
    }
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'price' => $this->price,
            'event' => $this->event,
            'user' => $this->user,
            'exp_date' => $this->exp_date
        ];
    }
}
?>