<?php 

// Création de la classe Car
class Car {
    // Propriétés d'une classe
    protected $brand;
    private $color;
    private $year;

    // Méthode de type contruct cad qu'elle est appellée automatiquement
    // lors de l'instanciation de la classe
    public function __construct($brand, $color, $year) {
        $this->brand = $brand;
        $this->color = $color;
        $this->year = $year;
    }

    // Méthode d'une classe (= fonction)
    public function drive() {
        return "Ma voiture roule !";
    }

    // Exemple de getter 
    public function getColor() {
        return $this->color;
    }

    // Exemple de setter 
    public function setColor($color) {
        $this->color = $color;
    }
}



// Je code une classe enfant / fille Convertible qui hérie des proriétés et des methodes de Car (L'héritage)
// À une seule condition cependant : que la portée des propriétés ou méthodes soit public ou protected
class Convertible extends Car {
    public $roof;
    public $model = "twingo";

    public function __construct($brand, $color, $year, $roof) {
        $this->roof = $roof; 
    }
}


// On instancie la classe Car et on crée un objet $renault 
// $renault = new Car('Renault', 'Jaune', 1998);

// echo $renault->brand; // Va me retourner 'Renault'
// echo "<br>";
// echo $renault->drive(); // Va afficher 'Ma voiture roule !'



// On va coder une classe User avec comme propriétés

// Les propriétés suivantes sont de portée publique : 
// - Name 
// - Birthdate
// - Gender 
// - Money (solde bancaire) - On pourra partir du principe qu'un User commence avec 150.

// Les propriétés seront publiques. Et on va avoir une méthode sayHello() qui retourne une phrase du type . 
// "Bonjour je suis ... le nom ... et je suis né le ..." si c'est un homme sinon meme phrase mais "Je suis néE etc..." 

// Autre méthode spendMoney() et on veut que cette méthode prenne un paramètre qui soit un entier. Le chiffre 
// donné en paramètre devra etre retiré du montant de Money et on affiche une phrase : Votre compte est désormais
// à xxx euros.
// Si jamais notre montant Money devient négatif, on affiche une phrase de type : "Vous n'avez plus d'argent".

// Qqes étapes : 

// - On crée la classe
// - On crée les propriétés 
// - On crée la fonction de type __construct 
// - On code les méthodes  
// - On instancie et on vérifie que tout est ok

class User {
    public $name;
    public $birthdate;
    public $gender;
    public $money;

    public function __construct($name, $birthdate, $gender, $money) {
        $this->name = $name;
        $this->birthdate = $birthdate;
        $this->gender = $gender;
        $this->money = $money;
    }

    public function sayHello() {
        // Opérateur ternaire cad un if ... else écrit différemment : (condition) ? si true : si false
        $ne = $this->gender == 'homme' ? 'né' : 'née';
        return "Je suis " . $this->name . " et je suis " . $ne . " le " . $this->birthdate . "<br>";
    }

    public function spendMoney($amount) {
        $this->money = $this->money - $amount;

        if (($this->money) < 0) {
            return "Votre solde est négatif ...";
        } else {
            return "Votre solde est de : " . ($this->money);
        }
    }
}

// On crée 2 objets de classe User : picsou et goldie
$picsou = new User('Picsou', '12 octobre 1830', 'homme', 200);
$goldie = new User('Goldie', '13 Aout 1995', 'femme', 300);

// echo $goldie->sayHello();
$goldie->spendMoney(120);
echo "<br>";
echo $goldie->spendMoney(190);
