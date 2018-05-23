<?php

    namespace App\Entity;


    class Article
    {

        //constante d'une classe toujours public et static
        const REMISE_MAX = 30;

        /** @var string $reference reference produit */
        private $reference;

        /** @var string $nom nom du produit */
        private $nom;

        /** @var string $description description de l'article*/
        private $description;

        /** @var int $prix prix de l'article*/
        private $prix;

        //variable de classe
        /** @var float $remise remise de l'article*/
        private static $remise;

        /*
        public function __construct($reference, $nom, $description)
        {
            $this->reference = $reference;
            $this->nom = $nom;
            $this->description = $description;
        }
        */

        public function __destruct()
        {
            echo 'L\'objet de type Article '.$this->getNom().' a été détruit';
        }

        public function getReference()
        {
            return $this->reference;
        }

        public function setReference($reference)
        {
            $this->reference = $reference; 

            return $this;
        }

        public function getNom()
        {
            return $this->nom;
        }

        public function setNom($nom)
        {
            $this->nom = $nom;

            return $this;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function setDescription($description)
        {
            $this->description = $description;

            return $this;
        }

        public function getPrix()
        {
            return $this->prix;
        }

        public function setPrix($prix)
        {
            if(self::isPositive($prix)){
                $this->prix = $prix;
                
            }else{
                $this->prix = 0;
            }  
            
            return $this;
        }

        public static function getRemise()
        {
            return self::$remise;     
        }

        public static function setRemise($remise){
            if($remise > self::REMISE_MAX){
                self::$remise = self::REMISE_MAX;
            }else if($remise > 0 && $remise < self::REMISE_MAX){
                self::$remise = $remise;
            }else{
                self::$remise = 0;
            }
        }

        public function getPrixDiminuer()
        {
            if(self::$remise == 0){
                $this->prix = $this->prix;
            }
            else{
                return $this->prix = $this->prix * (1 - self::$remise / 100);
            } 
        }

        public static function isPositive($prix){
            if($prix >= 0){
                return true;
            }

            return false;
        }

        public function generateReference()
        {
            $words = explode(' ', $this->nom);
            $letters = '';
            foreach ($words as $word){
                $letters .= strtoupper(substr($word,0,2));
            }
            $this->reference = sha1($letters);
        }

        public function autoAssignementReference()
        {
            $this->reference = $this->generateReference();
        }

        private static function constVar(){
            return 20;
        }

        public static function remiseMax(){
            return self::constVar();
        }

    }