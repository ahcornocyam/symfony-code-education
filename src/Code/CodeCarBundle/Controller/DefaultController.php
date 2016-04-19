<?php

namespace Code\CodeCarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Code\CodeCarBundle\Entity\Carro;
use Code\CodeCarBundle\Entity\Fabricante;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {

        $fabricante = new Fabricante();
        $fabricante->setNome('Fiat');

        $ano = new \DateTime('1994');

        $carro = new Carro();
        $carro->setModelo('palio');
        $carro->setAno($ano);
        $carro->setCor("azul");
        $carro->setFabricante($fabricante);

        $carRepo = $this->getDoctrine()
                            ->getRepository("CodeCodeCarBundle:Carro");
        $fabricanteRepo = $this->getDoctrine()
                            ->getRepository("CodeCodeCarBundle:Fabricante");

        $fabricanteRepo->salvarFabricante($fabricante);
        $carRepo->salvarCarro($carro);

        $carros = $carRepo->getTodosCarros();
        $fabricantes = $fabricanteRepo->getTodosFabricantes();

        return
            [
                'carros' => $carros,
                'fabricantes' => $fabricantes
            ]
        ;
    }
}
