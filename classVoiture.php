<?php 

class Voiture {
    private $marque = "Reanult";
    private $couleur = "bleu";
    private $puissance = "v8";
    private $vitesse = 0;

    public function accelerer() {
        $this->vitesse += 50;
        return "La $this->marque $this->couleur roule à $this->vitesse km/h<br>";
    }

    public function freiner() {
        $this->vitesse -= 50;
        return "La $this->marque $this->couleur roule à $this->vitesse km/h<br>";
    }

    public function __construct($marque, $couleur) {
        $this->marque = $marque;
        $this->couleur = $couleur;
    }

    public function getBrand() {
        return $this->marque;
    }

    public function getColor() {
        return $this->couleur;
    }

    public function setBrand($newBrand) {
        $this->marque = $newBrand;
    }

    public function accident($Voiture) {
        $this->vitesse = 0;
        return "La $this->marque a eu un accident avec la $Voiture->marque<br>";
    }
}

$Renault = new Voiture('Jaguar', 'vert');
echo $Renault->accelerer();
echo "<br>";
echo $Renault->freiner();
echo "<br>";
echo $Renault->getBrand();
echo "<br>";
echo $Renault->getColor();
echo "<br>";
echo $Renault->setBrand('Peugeot');
echo "<br>";
echo $Renault->getBrand();
echo "<br>";
echo $Renault->accident("Ferrari");