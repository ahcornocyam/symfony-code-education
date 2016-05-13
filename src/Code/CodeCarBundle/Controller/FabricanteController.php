<?php

namespace Code\CodeCarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Code\CodeCarBundle\Entity\Fabricante;
use Code\CodeCarBundle\Form\FabricanteType;

/**
* Fabricante Controller
* @Route("fabricante")
*/
class FabricanteController extends Controller
{
    /**
     * @Route("/", name="fabricante")
     * @Template()
     */
    public function indexAction()
    {
        $em =  $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository("CodeCodeCarBundle:Fabricante");
        $fabricantes =  $repo->getTodosFabricantes();
        return [
          'fabricantes' => $fabricantes
        ];
    }

    /**
     * @Route("/new", name="fabricante_new")
     * @Template()
     */
    public function newAction()
    {
        $entity =  new Fabricante();
        $form = $this->createForm( new FabricanteType, $entity);
        return [
          'entity' => $entity,
          'form' => $form->createView()
        ];
    }

    /**
     * @Route("/create", name="fabricante_create")
     * @Template("CodeCodeCarBundle:Fabricante:index.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Fabricante();
        $form = $this->createForm(new FabricanteType, $entity );
        $form->bind($request);
        if ($form->isValid()) {

          $fabricanteService = $this->get('code_code_car.manager.fabricante');
          $entity = $fabricanteService->insert($entity);

          return $this->redirect($this->generateUrl('fabricante'));
        }
        return [
          'entity' => $entity,
          'form' => $form->createView()
        ];

        return [];
    }

    /**
    * @Route("/{id}/edit/", name="fabricante_edit")
    * @Template("CodeCodeCarBundle:Fabricante:edit.html.twig")
    */
    public function editAction ($id)
    {
      $em =  $this->getDoctrine()->getEntityManager();
      $entity = $em->getRepository("CodeCodeCarBundle:Fabricante")->find($id);
      if (!$entity) {
        throw $this->createNotFoundException( "registro não encontrado");
      }
      $form = $this->createForm(new FabricanteType(), $entity );
      return [
        'entity' => $entity,
        'form' => $form->createView()
      ];
    }

    /**
    * @Route("/{id}/update/", name="fabricante_update")
    * @Template("CodeCodeCarBundle:Fabricante:edit.html.twig")
    */
    public function updateAction (Request $request, $id)
    {
      $em =  $this->getDoctrine()->getEntityManager();
      $entity = $em->getRepository("CodeCodeCarBundle:Fabricante")->find($id);

      if (!$entity) {
        throw $this->createNotFoundException( "registro não encontrado");
      }

      $form = $this->createForm(new FabricanteType(), $entity );
      $form->bind($request);
      if($form->isValid() ) {
        $fabricanteService = $this->get('code_code_car.manager.fabricante');
        $entity = $fabricanteService->insert($entity);
        return $this->redirect($this->generateUrl('fabricante'));
      }

      return [
        'entity' => $entity,
        'form' => $form->createView()
      ];
    }

    /**
    * @Route("/{id}/delete/", name="fabricante_delete")
    * @Template()
    */
    public function deleteAction ($id)
    {
      $em =  $this->getDoctrine()->getEntityManager();
      $entity = $em->getRepository("CodeCodeCarBundle:Fabricante")->find($id);

      if (!$entity) {
        throw $this->createNotFoundException( "registro não encontrado");
      }

      $fabricanteService = $this->get('code_code_car.manager.fabricante');
      $entity = $fabricanteService->remove($entity);

      return $this->redirect($this->generateUrl('fabricante'));

    }

}
