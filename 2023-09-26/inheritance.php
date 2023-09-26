<?php

class A {
    //Public - Nurodo, jog metodas arba savybė gali būti pasiekti bet kur
    //Private - Nurodo, jog metodas arba savybė gali būti pasiekti tik toje klasėje
    //Protected - Nuorod, jog metodas arba savybė gali būti pasiekti toje klasėje arba kurioje yra paveldėtas
    protected $vardas = 'Ksavera';
    public $pavarde = 'Pavardine';
    public $amzius = 0;
    public $adresas;
    private $telefonas = '+6371541561656';

    public function setVardas($vardas) {
        $this->vardas = $vardas;
    }

    public function setPavarde($pavarde) {
        $this->pavarde = $pavarde;
    }

    public function generateAge() {
        $this->amzius = rand(1, 110);
    }

    public function setAddress($address) {
        $this->adresas = $address;
    }

    public function getProfile() {
        return "
            <li>$this->vardas</li>
            <li>$this->pavarde</li>
            <li>$this->amzius</li>
            <li>$this->adresas</li>
        ";
    }
}

$a = new A;

$a->setVardas('Jonas');
$a->setPavarde('Jonaitis');
$a->generateAge();
$a->setAddress('Sodų g. 12 Vilkaviškis');
echo $a->getProfile();

class B extends A {
    public function getProfile() {
        return "
            <table>
                <tr>
                    <td>$this->vardas</td>
                    <td>$this->pavarde</td>
                    <td>$this->amzius</td>
                    <td>$this->adresas</td>
                </tr>
            </table>
        ";
    }
}

$b = new B;
var_dump($b);
$b->setVardas('Jonas');
$b->setPavarde('Jonaitis');
$b->generateAge();
$b->setAddress('Sodų g. 12 Vilkaviškis');
echo $b->getProfile();


class Pirmas {
    public $pasisveikinimas;
    
    public function __construct($vardas, $data) {
        $this->pasisveikinimas = 'Sveiki, ' . $vardas . ' ' . $data;
    }
}

$pirmas = new Pirmas('Gytis', '2023-09-26');

echo $pirmas->pasisveikinimas . '<br />';

class Antras extends Pirmas {
    public $laikas;

    public function __construct($vardas, $data) {
        $this->laikas = date('Y-m-d H:i:s');
        parent::__construct($vardas, $data);
    }
}

$antras = new Antras('Giedrius', '2023-08-08');

echo $antras->laikas . '<br />';
echo $antras->pasisveikinimas . '<br />';

class Vaisius {

}

class Krepsys {
    public function add() {
        //new Vaisius
    }
}




