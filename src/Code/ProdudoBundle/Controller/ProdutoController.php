<?php

namespace Code\ProdudoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Code\ProdudoBundle\Entity\Produto;

use Code\ProdudoBundle\Form\ProdutoType;

/**
* Produto Controller
* @Route("produto")
*/
class ProdutoController extends Controller
{
  /**
  * @Route("/", name="produto")
  * @Template()
  */
  public function indexAction ()
  {
      $em = $this->getDoctrine()->getEntityManager();
      $repo = $em->getRepository("CodeProdudoBundle:Produto");
      $produtos = $repo->getTodosProdutos();
      return [
        'produtos' => $produtos
      ];
  }

  /**
  * @Route("/new/", name="produto_new")
  * @Template()
  */
  public function newAction()
  {
    $entity = new Produto();
    $form = $this->createForm(new ProdutoType(), $entity );
    return [
      'entity' => $entity,
      'form' => $form->createView()
    ];
  }

  /**
  * @Route("/create/", name="produto_create")
  * @Template("CodeProdudoBundle:Produto:new.html.twig")
  */
  public function createAction (Request $request)
  {
    $entity = new Produto();
    $form = $this->createForm(new ProdutoType, $entity);
    $form->bind($request);
    if ($form->isValid()) {
      $em = $this->getDoctrine()->getEntityManager();
      $em->persist($entity);
      $em->flush();

      return $this->redirect($this->generateUrl('produto'));
    }
    return [
      'entity' => $entity,
      'form' => $form->createView()
    ];
  }
}
