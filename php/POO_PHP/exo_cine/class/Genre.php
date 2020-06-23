<?php

class Genre{
    private $nomGenre;

    public function __construct($nomGenre)
    {
        $this->nomGenre = $nomGenre;
    }

    public function getNomGenre()
    {
        return $this->nomGenre;
    }

    public function setNomGenre($nomGenre)
    {
        $this->nomGenre = $nomGenre;
        return $this;
    }

    public function __toString()
    {
        return $this->getNomGenre();
    }
}