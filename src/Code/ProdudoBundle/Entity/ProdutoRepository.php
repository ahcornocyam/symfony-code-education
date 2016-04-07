<?php
    namespace Code\ProdudoBundle\Entity;

    use Doctrine\ORM\EntityRepository;

    class ProdutoRepository extends EntityRepository
    {
        # consulta usando dql
        public function getProdutosIdMaiorQue($num)
        {
            $dql = "SELECT p FROM CodeProdudoBundle:Produto p WHERE "
                    ."p.id > :num";
            return $this->getEntityManager()
                        ->createQuery( $dql)
                        ->setParameter(":num", $num)
                        ->getResult()
            ;
        }
        # consulta usando queryBuilder
        public function getProdutosMenorQue($num)
        {
            return $this->createQueryBuilder("p")
                        ->where("p.id < :num")
                        ->setParameter(":num", $num)
                        ->getQuery()
                        ->getResult();
        }
        #listando todos os produtos
        public function getTodosProdutos()
        {
            return $this->createQueryBuilder("p")
                        ->getQuery()
                        ->getResult();
        }
    }
