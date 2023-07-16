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
        $this->client = $client;
        $this->chambre = $chambre;
        $this->chambre->ajouterReservation($this);
        $this->client->ajouterReservation($this);
        $this->chambre->setEtat(false);
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

    public function setDateDebut(DateTime $dateDebut)
    {
        $this->dateDebut = $dateDebut;
    }

    public function setDateFin(DateTime $dateFin)
    {
        $this->dateFin = $dateFin;
    }

    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    public function setChambre(Chambre $chambre)
    {
        $this->chambre = $chambre;
    }

    // // Methods --------------------

    public function __toString()
    {
        return $this->getClient() . " - Chambre " . $this->getChambre()->getNumero() . " - depuis " . $this->getDateDebut()->format("d-m-Y") . " jusqu'à " . $this->getDateFin()->format("d-m-Y") . "<br>";
    }
    public function CalculPrixTotal()
    {
        $prix = $this->getChambre()->getPrix();
        $dateDebut = $this->getDateDebut();
        $dateFin = $this->getDateFin();
        $nbJours = $dateDebut->diff($dateFin)->format("%a");
        $prixTotal = $prix * $nbJours;
        return $prixTotal;
    }
}
