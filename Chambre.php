<?php

class Chambre
{
    private string $numero;
    private int $prix;
    private bool $etat;
    private bool $wifi;
    private array $reservation;
    private Hotel $hotel;

    public function __construct(string $numero, int $prix, bool $wifi, bool $etat, Hotel $hotel)
    {
        $this->numero = $numero;
        $this->prix = $prix;
        $this->wifi = $wifi;
        $this->etat = $etat;
        $this->hotel = $hotel;
    }

    // Getters --------------------
    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getPrix(): int
    {
        return $this->prix;
    }

    public function getWifi(): bool
    {
        return $this->wifi;
    }

    public function getEtat(): bool
    {
        return $this->etat;
    }

    public function getHotel(): Hotel
    {
        return $this->hotel;
    }

    // Setters --------------------

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }

    public function setWifi(bool $wifi): void
    {
        $this->wifi = $wifi;
    }

    public function setEtat(bool $etat): void
    {
        $this->etat = $etat;
    }

    public function setHotel(Hotel $hotel): void
    {
        $this->hotel = $hotel;
    }

    // Methods --------------------
}
