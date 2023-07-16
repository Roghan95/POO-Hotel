<?php

class Hotel
{
    private string $nom;
    private string $adresse;
    private array $chambres = [];

    public function __construct(string $nom, string $adresse)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    // Getters --------------------

    public function getNom()
    {
        return $this->nom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getChambres()
    {
        return $this->chambres;
    }

    // Setters --------------------

    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;
    }

    public function setChambres(array $chambres)
    {
        $this->chambres = $chambres;
    }

    // Methodes --------------------

    // Méthode __toString()
    public function __toString()
    {
        return $this->getNom() . " " . $this->getAdresse();
    }

    public function ajouterChambre(Chambre $chambre)
    {
        $this->chambres[] = $chambre;
    }


    // Affiche les chambres de l'hotel
    public function afficherChambres()
    {
        $chambres = $this->getChambres();


        echo 'Status des chambres de : ' . $this->nom . '<br><br>';
?>
        <table>
            <tr>
                <th>CHAMBRE</th>
                <th>PRIX</th>
                <th>WIFI</th>
                <th>ETAT</th>
            </tr> <?php
                    foreach ($chambres as $chambre) {
                        $wifi = $chambre->getWifi() ? "📶" : " ";
                        $etat = $chambre->getEtat() ? '<span style="color:green"> Disponible </span>' : '<span style="color:red"> Réservée </span>';

                    ?>

                <tr>
                    <td>Chambre <?= $chambre->getNumero() ?></td>
                    <td><?= $chambre->getPrix() ?> €</td>
                    <td><?= $wifi ?></td>
                    <td><?= $etat ?></td>
                </tr>
            <?php
                    }
            ?>
        </table> <?php
                }

                // -----------------------------------------------------------------------------------------

                // affiche le nombre de chambres disponibles
                public function totalChambres()
                {
                    return count($this->getChambres());
                }


                // affiche le nombre de chambres réservées
                public function nbReservationChambres()
                {
                    $resultat = 0;
                    $chambres = $this->getChambres();
                    foreach ($chambres as $chambre) {
                        if ($chambre->getEtat() == false) {
                            $resultat++;
                        }
                    }
                    return $resultat;
                }
                public function Reservations()
                {
                    $retour = "Réservations de l'hôtel $this->nom<br>";
                    $result = 0;
                    foreach ($this->chambres as $chambre) {
                        if (count($chambre->getReservation()) > 0) {
                            $result += 1;
                        }
                    }
                    if ($result > 0) {
                        $resultat = 0;
                        foreach ($this->chambres as $chambre) {
                            $resultat += count($chambre->getReservation());
                        }
                        $retour .= "<span style='color:green'>$resultat RESERVATIONS <br></span>";
                        foreach ($this->chambres as $chambre) {
                            foreach ($chambre->getReservation() as $reservation) {
                                $retour .= $reservation;
                            }
                        }
                    } else {
                        $retour .= "Aucune Réservation !";
                    }
                    return $retour .= "<br>";
                }


                // affiche les infos de l'hotel
                public function getHotelInfo()
                {
                    return $this->getNom() . "<br>" . $this->getAdresse() . "<br>Nombre de chambres : " . $this->totalChambres() . "<br> Nombre de chambres réservées : " . $this->nbReservationChambres() . "<br> Nombre de chambres disponible : " . $this->totalChambres() - $this->nbReservationChambres() . "<br>";
                }

                // affiche les chambres réservées
                public function afficherChambresReservees()
                {
                    $resultat = "";
                    $chambres = $this->getChambres();
                    foreach ($chambres as $chambre) {
                        if ($chambre->getEtat() == false) {
                            $resultat .= $chambre->getNumero() . " ";
                        }
                    }
                    return $resultat;
                }
            }
