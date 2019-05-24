<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BiensRepository")
 */
class Biens
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle() {
        return $this -> title;
    }

    public function getSurface() {
        return $this -> surface;
    }

    public function getPicture() {
        return $this -> picture;
    }

    public function getPrice() {
        return $this -> price;
    }

    public function setTitle($title) {
        $this -> title = $title;
    }

     public function setSurface($surface) {
        $this -> surface = $surface;
    }

     public function setPicture($picture) {
        $this -> picture = $picture;
    }

     public function setPrice($price) {
        $this -> price = $price;
    }
}
