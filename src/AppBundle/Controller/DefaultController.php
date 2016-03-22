<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/{marca}/{modelo}", name="homepage")
     */
    public function indexAction($marca, $modelo)
    {     
        
        $rota = [
                    'marca' => $marca,
                    'modelo' => $modelo
                ];
        return $this->render('AppBundle:default:index.html.twig', $rota);
    }
}
