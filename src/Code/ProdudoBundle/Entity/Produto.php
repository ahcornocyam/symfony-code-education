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
            *@ORM\OneToOne(targetEntity="ProdutoDetalhe")
            *@ORM\JoinColumn(name="produto_detalhe_id", referencedColumnName="id")
            *
            */
            private $detalhe;
            /**
            *@ORM\ManyToOne(targetEntity="Code\CategoryBundle\Entity\Category", inversedBy="produtos")
            *@ORM\JoinColumn(name="category_id", referencedColumnName="id")
            *
            */
            private $categoria;

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

          /**
           * Get the value of Detalhe
           *
           * @return mixed
           */
          public function getDetalhe()
          {
              return $this->detalhe;
          }

          /**
           * Set the value of Detalhe
           *
           * @param mixed detalhe
           *
           * @return self
           */
          public function setDetalhe($detalhe)
          {
              $this->detalhe = $detalhe;

              return $this;
          }


    /**
     * Get the value of Categoria
     *
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of Categoria
     *
     * @param mixed categoria
     *
     * @return self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

}
