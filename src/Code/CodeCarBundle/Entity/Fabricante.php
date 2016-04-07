<?php
    namespace Code\CodeCarBundle\Entity;

    use Doctrine\ORM\Mapping as ORM;
    /**
    * Fabricantes
    * @ORM\Table()
    * @ORM\Entity(repositoryClass="Code\CodeCarBundle\Repository\FabricanteRepository")
    */
    class Fabricante
    {
        /**
        * @var integer
        * @ORM\Column(name="id", type="integer")
        * @ORM\Id
        * @ORM\GeneratedValue(strategy="AUTO")
        */
        private $id;
        /**
        * var string
        * @ORM\Column(name="nome", type="string", length=40)
        */
        private $nome;

        /**
        *
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
        public function getNome()
        {
            return $this->nome;
        }
        /**
        * @param mixed $nome
        */
        public function setNome($nome)
        {
            $this->nome = $nome;
            return $this;
        }
    }