<?php

namespace Code\ProdudoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\ProdudoBundle\Entity\Produto as Produto;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $response = ['nome'=> 'Maycon'];
        return $response;
    }
    /**
    * @Route("/doctrine")
    * @Template()
    */
    public function testAction()
    {
        $produto  = new Produto();
        $produto->setName("Notebook 1");
        $produto->setDescription("Descrição do notebook 1");

        //persistindo no banco de dados com o doctrine
        $em =$this->getDoctrine()->getEntityManager();
        $em->persist($produto);
        $em->flush();

        $repo = $em->getRepository("CodeProdudoBundle:Produto");
        $produtos = $repo->getTodosProdutos();

        return ['produtos'=> $produtos];
    }
}
