<?php

class Chambre
{
    private Hotel $hotel;
    private string $numero;
    private int $prix;
    private bool $etat;
    private bool $wifi;
    private array $reservation;

    // Constructeur ----------------------------------------

    public function __construct(string $numero, int $prix, bool $wifi, bool $etat, Hotel $hotel)
    {
        $this->numero = $numero;
        $this->prix = $prix;
        $this->wifi = $wifi;
        $this->etat = $etat;
        $this->hotel = $hotel;
        $this->etat = true;
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

    public function setReservation(array $reservation): void
    {
        $this->reservation = $reservation;
    }
    // ----------------------------------------------------------

    // Methods --------------------

    public function __toString()
    {
        return $this->numero . ' ' . $this->prix . ' ' . $this->wifi . ' ' . $this->etat . ' ' . $this->hotel;
    }

    public function ajouterReservation(Reservation $reservation) // Ajoute une réservation à la chambre
    {
        $this->reservation[] = $reservation;
    }

    public function afficheReservation() // Affiche les réservations de la chambre
    {
        $resultat = "";
        $reservation = $this->getReservation();
        foreach ($this->reservation as $reservation) {
            echo $reservation->getDateDebut()->format('d/m/Y') . ' - ' . $reservation->getDateFin()->format('d/m/Y') . ' : ' . $reservation->getClient()->getNom() . ' ' . $reservation->getClient()->getPrenom() . '<br>';
        }
        return $resultat;
    }
}
