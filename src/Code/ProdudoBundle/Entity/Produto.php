<?php

    namespace Code\ProdudoBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    /**
    * Produtos
    * @ORM\Table()
    * @ORM\Entity(repositoryClass="ProdutoRepository")
    */
    class Produto
    {
            /**
            * @var integer
            *
            * @ORM\Column(name="id", type="integer")
            * @ORM\Id
            * @ORM\GeneratedValue( strategy="AUTO")
            */
            private $id;

            /**
            * @var string
            *
            * @ORM\Column(name="name", type="string", length=255)
            */
            private $name;

            /**
            * @var text
            *
            * @ORM\Column(name="description", type="text")
            */
            private $description;

            /**
            * @return mixed
            */
            public function getId()
            {
                return $this->id;
            }
            /**
            * @param mixed $id
            */
            public function setId($id)
            {
                $this->id = $id;
                return $this;
            }

            /**
            * @return mixed
            */
            public function getName()
            {
                return $this->name;
            }
            /**
            * @param mixed $name
            */
            public function setName($name)
            {
                $this->name = $name;
                return $this;
            }

            /**
            * @return mixed
            */
            public function getDescription()
            {
                return $this->description;
            }
            /**
            * @param mixed $description
            */
            public function setDescription($description)
            {
                $this->description = $description;
                return $this;
            }
    }
