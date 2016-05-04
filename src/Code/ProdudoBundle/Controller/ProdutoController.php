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

  /**
  * @Route("/{id}/edit/", name="produto_edit")
  * @Template("CodeProdudoBundle:Produto:edit.html.twig")
  */
  public function editAction ($id)
  {
    $em =  $this->getDoctrine()->getEntityManager();
    $entity = $em->getRepository("CodeProdudoBundle:Produto")->find($id);
    if (!$entity) {
      throw $this->createNotFoundException( "registro não encontrado");
    }
    $form = $this->createForm(new ProdutoType(), $entity );
    return [
      'entity' => $entity,
      'form' => $form->createView()
    ];
  }
  /**
  * @Route("/{id}/update/", name="produto_update")
  * @Template("CodeProdudoBundle:Produto:edit.html.twig")
  */
  public function updateAction (Request $request, $id)
  {
    $em =  $this->getDoctrine()->getEntityManager();
    $entity = $em->getRepository("CodeProdudoBundle:Produto")->find($id);

    if (!$entity) {
      throw $this->createNotFoundException( "registro não encontrado");
    }

    $form = $this->createForm(new ProdutoType(), $entity );
    $form->bind($request);
    if($form->isValid() ) {
      $em->persist($entity);
      $em->flush();
      return $this->redirect($this->generateUrl('produto'));
    }

    return [
      'entity' => $entity,
      'form' => $form->createView()
    ];
  }

  /**
  * @Route("/{id}/delete/", name="produto_delete")
  * @Template()
  */
  public function deleteAction ($id)
  {
    $em =  $this->getDoctrine()->getEntityManager();
    $entity = $em->getRepository("CodeProdudoBundle:Produto")->find($id);

    if (!$entity) {
      throw $this->createNotFoundException( "registro não encontrado");
    }

    $em->remove($entity);
    $em->flush();

    return $this->redirect($this->generateUrl('produto'));

  }
}
