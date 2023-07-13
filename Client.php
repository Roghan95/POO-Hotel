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
}
