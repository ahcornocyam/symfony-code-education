<?php
  namespace Code\CodeCarBundle\Manager;

  use Doctrine\ORM\EntityManagerInterface;

  use Code\CodeCarBundle\Entity\FabricanteInterface;

  class FabricanteManager
  {
    private $em;

    public function __construct (EntityManagerInterface $em)
    {
      $this->em = $em;
    }

    public function insert (FabricanteInterface $entity)
    {
      $em = $this->em;
      $em->persist($entity);
      $em->flush();

      return $entity;
    }

    public function remove (FabricanteInterface $entity)
    {
      $em = $this->em;
      $em->remove($entity);
      $em->flush();
    }
  }
