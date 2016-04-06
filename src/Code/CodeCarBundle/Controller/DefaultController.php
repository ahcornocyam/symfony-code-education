<?php

namespace Code\CodeCarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        
        return [
            'cars' => [
                [
                    'marca' => 'fiat',
                    'modelo' => 'uno'
                ],
                [
                    'marca' => 'fiat',
                    'modelo' => 'palio'
                ],
                [
                    'marca' => 'ford',
                    'modelo' => 'ka'
                ],
                [
                    'marca' => 'chevrolet',
                    'modelo' => 's10'
                ],
                [
                    'marca' => 'volkswagen',
                    'modelo' => 'gol'
                ],
                [
                    'marca' => 'volkswagen',
                    'modelo' => 'golf'
                ],
                [
                    'marca' => 'volkswagen',
                    'modelo' => 'fusca'
                ],
                [
                    'marca' => 'renault',
                    'modelo' => 'clio'
                ],
                [
                    'marca' => 'peuegeot',
                    'modelo' => '308'
                ],
                [
                    'marca' => 'nissan',
                    'modelo' => '350z'
                ],
            ]
        ];
    }
}
