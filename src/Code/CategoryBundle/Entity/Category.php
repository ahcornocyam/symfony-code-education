<?php

namespace Code\CategoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Code\CategoryBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=60)
     */
    private $nome;

    /**
    * @var integer
    * @ORM\OneToMany(targetEntity="Code\ProdudoBundle\Entity\Produto", mappedBy="categoria" )
    */
    private $produtos;


    public function __construct() {
      $this->produtos = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Category
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of Id
     *
     * @param int id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Produtos
     *
     * @return integer
     */
    public function getProdutos()
    {
        return $this->produtos;
    }

    /**
     * Set the value of Produtos
     *
     * @param integer produtos
     *
     * @return self
     */
    public function setProdutos($produtos)
    {
        $this->produtos = $produtos;

        return $this;
    }

}
