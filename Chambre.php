<?php

class Chambre
{
    private Hotel $hotel;
    private string $numero;
    private int $prix;
    private bool $etat;
    private bool $wifi;
    private array $reservation = [];

    // Constructeur ----------------------------------------

    public function __construct(string $numero, int $prix, bool $wifi, bool $etat, Hotel $hotel)
    {
        $this->numero = $numero;
        $this->prix = $prix;
        $this->wifi = $wifi;
        $this->etat = true;
        $this->hotel = $hotel;
        $this->hotel->ajouterChambre($this);
    }

    // Getters ----------------------------------------
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

    public function getReservation(): array
    {
        return $this->reservation;
    }

    // Setters ----------------------------------------

    public function setNumero(string $numero)
    {
        $this->numero = $numero;
    }

    public function setPrix(int $prix)
    {
        $this->prix = $prix;
    }

    public function setWifi(bool $wifi)
    {
        $this->wifi = $wifi;
    }

    public function setEtat(bool $etat)
    {
        $this->etat = $etat;
    }

    public function setHotel(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }

    public function setReservation(array $reservation)
    {
        $this->reservation[] = $reservation;
    }
    // ----------------------------------------------------------

    // Methods --------------------------------------------------


    public function __toString()
    {
        return $this->numero . ' ' . $this->prix . ' ' . $this->wifi . ' ' . $this->etat . ' ' . $this->hotel;
    }


    // Ajoute une réservation à la chambre
    public function ajouterReservation(Reservation $reservation)
    {
        $this->reservation[] = $reservation;
    }

    // Affiche les reservations de la chambre
    public function afficherReservation()
    {
        $resultat = "";
        $reservations = $this->getReservation();
        foreach ($reservations as $reservation) {
            $resultat .= $reservation->getClient() . " - Chambre " . $reservation->getChambre()->getNumero() . " - depuis " . $reservation->getDateDebut()->format("d-m-Y") . " jusqu'à " . $reservation->get_DateFin()->format("d-m-Y") . "<br>";
        }
        return $resultat;
    }
}
