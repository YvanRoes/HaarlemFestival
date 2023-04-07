<?php
class Ticket implements JsonSerializable
{
    private ?int $id = null;
    private ?string $status = null;
    private ?float $price = null;
    private ?DateTime $expDate = null;
    private ?int $event = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
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
    public function getExpDate(): ?DateTime
    {
        return $this->expDate;
    }
    public function setExpDate(?DateTime $expDate): void
    {
        $this->expDate = $expDate;
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
            'expDate' => $this->expDate,
            'event' => $this->event
        ];

    }
}
?>