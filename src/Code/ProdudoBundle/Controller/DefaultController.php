<?php

namespace Code\ProdudoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\ProdudoBundle\Entity\Produto as Produto;
use Code\ProdudoBundle\Entity\ProdutoDetalhe as ProdutoDetalhe;
use Code\CategoryBundle\Entity\Category;

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
        $category = new Category();
        $category->setNome('Informática');

        $detalhe = new ProdutoDetalhe();
        $detalhe->setAltura(10);
        $detalhe->setLargura(19);
        $detalhe->setPeso(15);

        $produto  = new Produto();
        $produto->setName("Notebook detalhe");
        $produto->setDescription("Descrição do notebook detalhe");
        $produto->setDetalhe($detalhe);
        $produto->setCategoria($category);

        //persistindo no banco de dados com o doctrine
        $em =$this->getDoctrine()->getEntityManager();
        $em->persist($category);
        $em->persist($detalhe);
        $em->persist($produto);
        $em->flush();

        $repo = $em->getRepository("CodeProdudoBundle:Produto");
        $produtos = $repo->getTodosProdutos();

        return ['produtos'=> $produtos];
    }
}
