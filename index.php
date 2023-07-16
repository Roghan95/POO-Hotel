<?php
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

// Instance Hotel
$hilton = new Hotel("Hilton **** Strasbourg", "10 route de la Gare 67000 STRASBOURG");
$regent = new Hotel("Regent **** Paris", "61 rue Dauphine 75006 PARIS");


// Instance Client
$micka = new Client("MURMANN", "Micka");
$virgile = new Client("GIBELLO", "Virgile");


// Instance Chambre
$c1 = new Chambre("1", 120, false, false, $hilton);
$c2 = new Chambre("2", 120, false, false, $hilton);
$c3 = new Chambre("3", 120, false, false, $hilton);
$c4 = new Chambre("4", 120, false, false, $hilton);
// ------------------------------------------------
$c16 = new Chambre("16", 300, true, true, $hilton);
$c17 = new Chambre("17", 300, true, true, $hilton);
$c18 = new Chambre("18", 300, true, true, $hilton);
$c19 = new Chambre("19", 300, true, true, $hilton);


// Instance Reservation
$r3 = new Reservation("2021-01-01", "2021-01-05", $virgile, $c17);
$r1 = new Reservation("2021-01-01", "2021-01-05", $micka, $c3);
$r2 = new Reservation("2021-01-01", "2021-01-05", $micka, $c4);


// Affichage des informations
echo $hilton->getHotelInfo() . "<br>";
echo $hilton->Reservations() . "<br>";
echo $regent->Reservations() . "<br>";
echo $micka->afficherReservations() . "<br>";
echo $hilton->afficherChambres() . "<br>";
