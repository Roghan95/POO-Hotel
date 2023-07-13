<?php

class Hotel
{
    private string $nom;
    private string $adresse;
    private array $chambres;

    public function __construct(string $nom, string $adresse)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->chambres = [];
    }
}
