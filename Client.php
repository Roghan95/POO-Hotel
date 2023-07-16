<?php

class Client
{
    private string $nom;
    private string $prenom;
    private array $reservations;

    public function __construct(string $nom, string $prenom)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
    }

    // Getters --------------------

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function getReservations(): array
    {
        return $this->reservations;
    }

    // Setters --------------------

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function setReservations(Reservation $reservation)
    {
        array_push($this->reservations, $reservation);
    }

    // FIN SETTERS & GETTERS ----------------------------

    // Methodes --------------------
    public function __toString() // Affiche le nom et le prenom du client
    {
        return  $this->prenom . " " . $this->nom;
    }

    // Ajoute une reservation au client
    public function ajouterReservation(Reservation $reservation): void
    {
        $this->reservations[] = $reservation;
    }

    // Affiche les reservations du client pour un hotel donné
    public function afficherReservations()
    {
        $resultat = "Reservation de $this : <br><span style='color:green'>" . count($this->reservations) . " RESERVATIONS <br> </span>";

        $reservations = $this->getReservations();
        $total = 0;
        foreach ($reservations as $reservation) {
            $wifi = $reservation->getChambre()->getWifi() ? " Oui " : " Non ";
            $total += $reservation->CalculPrixTotal();
            $resultat .= $reservation->getChambre()->getHotel()->getNom() . " / Chambre : " . $reservation->getChambre()->getNumero() . " (" . $reservation->getChambre()->getPrix() . " - Wifi : " . $wifi . " ) - du " . $reservation->getDateDebut()->format("d-m-Y") . " au " . $reservation->getDateFin()->format("d-m-Y") . "<br>";
        }
        return $resultat . " Total : $total € <br> <br> ";
    }
}
