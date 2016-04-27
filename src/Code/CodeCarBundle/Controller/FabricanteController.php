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
          $em = $this->getDoctrine()->getEntityManager();
          $em->persist($entity);
          $em->flush();

          return $this->redirect($this->generateUrl('fabricante'));
        }
        return [
          'entity' => $entity,
          'form' => $form->createView()
        ];

        return [];
    }

}
