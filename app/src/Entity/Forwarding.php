<?php

namespace App\Entity;

use App\Repository\ForwardingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ForwardingRepository::class)
 */
class Forwarding {
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private $id;

  public function getId(): ?int {
    return $this->id;
  }
}
