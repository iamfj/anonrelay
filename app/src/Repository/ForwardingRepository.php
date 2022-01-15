<?php

namespace App\Repository;

use App\Entity\Forwarding;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Forwarding|null find($id, $lockMode = null, $lockVersion = null)
 * @method Forwarding|null findOneBy(array $criteria, array $orderBy = null)
 * @method Forwarding[]    findAll()
 * @method Forwarding[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForwardingRepository extends ServiceEntityRepository {
  public function __construct(ManagerRegistry $registry) {
    parent::__construct($registry, Forwarding::class);
  }
}
