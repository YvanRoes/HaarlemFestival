<?php
use Ramsey\Uuid\Uuid;
require_once __DIR__ . '/../models/event2.php';
class Ticket implements JsonSerializable
{
    private ?Uuid $id = null;
    private ?string $status = null;
    private ?float $price = null;
    private ?int $event = null;

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
    public function jsonSerialize(): mixed
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'price' => $this->price,
            'event' => $this->event
        ];
    }
}
?>