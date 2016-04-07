<?php

namespace Code\CodeCarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CodeCarBundle\Entity\Carro;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $ano = new \DateTime('1994');
        $carro = new Carro();
        $carro->setModelo('palio');
        $carro->setAno($ano);
        $carro->setCor("azul");
        $repository = $this->getDoctrine()
                            ->getRepository("CodeCodeCarBundle:Carro");
        $repository->salvarCarro($carro);
        $carros = $repository->getTodosCarros();

        return
            [
                'carros' => $carros
            ]
        ;
    }
}
