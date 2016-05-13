<?php

namespace Code\ProdudoBundle\Manager;
use Code\ProdudoBundle\Entity\ProdutoInterface;

use Doctrine\ORM\EntityManagerInterface;

class ProdutoManager
{
  private $em;

  public function __construct (EntityManagerInterface $em)
  {
      $this->em = $em;
  }

  public function insert (ProdutoInterface $entity)
  {
      $em = $this->em;
      $em->persist($entity);
      $em->flush();

      return $entity;
  }
}
