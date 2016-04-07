<?php

    namespace Code\CodeCarBundle\Repository;

    use Doctrine\ORM\EntityRepository;

    class FabricanteRepository extends EntityRepository
    {
        public function getTodosFabricantes()
        {
            $dql = "SELECT f FROM CodeCodeCarBundle:Fabricante f";
            return $this->getEntityManager()
                        ->createQuery( $dql)
                        ->getResult()
            ;
        }
    }
