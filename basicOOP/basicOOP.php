<?php


interface AnimalInterface {

    public function getAnimalName() : string ;
    public function getAnimalWeight() : float ;
    public function getAnimalVoice() : array ;

    public function setAnimalName(string $animalName);
    public function setAnimalWeight(float $animalWeight);
    public function setAnimalVoice(array $animalVoice);
}


abstract class Animal implements AnimalInterface {

    private $name;
    private $weight;
    private $voice;


    protected function __construct(string $animalName, float $animalWeight, array $animalVoice) {
        $this->setAnimalName($animalName);
        $this->setAnimalWeight($animalWeight);
        $this->setAnimalVoice($animalVoice);
    }


    public function getAnimalName() : string {
        return $this->name;
    }


    public function getAnimalWeight() : float {
        return $this->weight;
    }


    public function getAnimalVoice() : array {
        return $this->voice;
    }


    public function setAnimalName(string $animalName) {
        $this->name = $animalName;
    }


    public function setAnimalWeight(float $animalWeight) {
        $this->weight = $animalWeight;
    }


    public function setAnimalVoice(array $animalVoice) {
        $this->voice = $animalVoice;
    }
}


class Cat extends Animal {

    private $stripesAvailability;


    public function __construct(string $animalName, float $animalWeight, array $animalVoice, bool $stripesAvailability) {
        $this->setStripesAvailability($stripesAvailability);
        parent::__construct($animalName, $animalWeight, $animalVoice);
    }


    public function getStripesAvailability() : bool {
        return $this->stripesAvailability;
    }


    public function setStripesAvailability(bool $stripesAvailability) : void {
        $this->stripesAvailability = $stripesAvailability;
    }
}


class Dog extends Animal {

    private $barkingVolume;


    public function __construct(string $animalName, float $animalWeight, array $animalVoice, float $barkingVolume) {
        $this->setBarkingVolume($barkingVolume);
        parent::__construct($animalName, $animalWeight, $animalVoice);
    }


    public function getBarkingVolume() : float {
        return $this->barkingVolume;
    }


    public function setBarkingVolume(float $barkingVolume) : void {
        $this->barkingVolume = $barkingVolume;
    }

    public function __toString() : string {
        $returnValue = '';
        $returnValue .= 'Dog ' . $this->getAnimalName() . " :</br>";
        $returnValue .= 'Weight: ' . $this->getAnimalWeight() . ' kg</br>';
        $returnValue .= 'Can say: ' . implode(', ', $this->getAnimalVoice()) . '</br>';
        $returnValue .= 'Barking volume: ' . $this->getBarkingVolume(). '</br>';
        return $returnValue;
    }
}


class DogHandler {


    public function feedTheDog(Dog $dog, float $foodAmount) : void {
        $this->increaseDogWeight($dog, $foodAmount);
        $this->increaseDogBarkingVolume($dog, $foodAmount);
    }


    private function increaseDogWeight(Dog $dog, float $value) : void {
        $fedDogWeight = $dog->getAnimalWeight() + $value;
        $dog->setAnimalWeight($fedDogWeight);
    }


    private function increaseDogBarkingVolume(Dog $dog, float $value) : void {
        $fedDogBarkingVolume = $dog->getBarkingVolume() + $value;
        $dog->setBarkingVolume($fedDogBarkingVolume);
    }
}


$myDog = new Dog('Simba', 10.4, ['gav', 'grr', 'uuuuuuu'], 80);
$dogOwner = new DogHandler();

echo $myDog;

$dogOwner->feedTheDog($myDog, 0.6);

echo $myDog;