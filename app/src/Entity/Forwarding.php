<?php

namespace App\Entity;

use App\Repository\ForwardingRepository;

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
