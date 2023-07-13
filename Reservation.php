<?php

class Reservation
{
    private DateTime $dateDebut;
    private DateTime $dateFin;
    private Client $client;
    private Chambre $chambre;

    public function __construct(string $dateDebut, string $dateFin, Client $client, Chambre $chambre)
    {
        $this->dateDebut = new DateTime($dateDebut);
        $this->dateFin = new DateTime($dateFin);
        $this->dateFin = $dateFin;
        $this->client = $client;
        $this->chambre = $chambre;
    }

    // Getters --------------------

    public function getDateDebut(): DateTime
    {
        return $this->dateDebut;
    }

    public function getDateFin(): DateTime
    {
        return $this->dateFin;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function getChambre(): Chambre
    {
        return $this->chambre;
    }

    // Setters --------------------

    public function setDateDebut(DateTime $dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    public function setDateFin(DateTime $dateFin): void
    {
        $this->dateFin = $dateFin;
    }

    public function setClient(Client $client): void
    {
        $this->client = $client;
    }

    public function setChambre(Chambre $chambre): void
    {
        $this->chambre = $chambre;
    }

    // // Methods --------------------
}
