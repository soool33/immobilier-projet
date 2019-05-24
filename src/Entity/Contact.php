<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
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
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subject;

    /**
     * @ORM\Column(type="text", length=60000)
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

     public function getMail(): ?string
   {
       return $this->mail;
   }

   public function setMail(string $mail): self
   {
       $this->mail = $mail;

       return $this;
   }

    public function getSubject(): ?string
   {
       return $this->subject;
   }

   public function setSubject(string $subject): self
   {
       $this->subject = $subject;

       return $this;
   }

    public function getMessage(): ?string
   {
       return $this->message;
   }

   public function setMessage(string $message): self
   {
       $this->message = $message;

       return $this;
   }
}
