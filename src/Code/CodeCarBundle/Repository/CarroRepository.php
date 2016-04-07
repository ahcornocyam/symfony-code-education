<?php

    namespace Code\CodeCarBundle\Repository;

    use Doctrine\ORM\EntityRepository;

    class CarroRepository extends EntityRepository
    {
        public function getTodosCarros()
        {
            $dql = "SELECT c FROM CodeCodeCarBundle:Carro c";
            return $this->getEntityManager()
                        ->createQuery( $dql)
                        ->getResult()
            ;
        }

        public function salvarCarro($carro)
        {
            $em = $this->getEntityManager();
            $em->persist($carro);
            $em->flush();
        }
    }
