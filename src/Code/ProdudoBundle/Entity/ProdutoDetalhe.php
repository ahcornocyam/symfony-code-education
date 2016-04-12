<?php
namespace Code\ProdudoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Table()
* @ORM\Entity()
*/

class ProdutoDetalhe
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
  * @var decimal
  *
  * @ORM\Column(name="peso", type="decimal", precision=10, scale=2)
  */
  private $peso;
  /**
  * @var decimal
  * @ORM\Column(name="largura", type="decimal", precision=10, scale=2)
  */
  private $largura;
  /**
  * @var decimal
  *
  * @ORM\Column(name="altura", type="decimal", precision=10, scale=2)
  */
  private $altura;




    /**
     * Get the value of Id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param integer id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Peso
     *
     * @return decimal
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * Set the value of Peso
     *
     * @param decimal peso
     *
     * @return self
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;

        return $this;
    }

    /**
     * Get the value of Largura
     *
     * @return decimal
     */
    public function getLargura()
    {
        return $this->largura;
    }

    /**
     * Set the value of Largura
     *
     * @param decimal largura
     *
     * @return self
     */
    public function setLargura($largura)
    {
        $this->largura = $largura;

        return $this;
    }

    /**
     * Get the value of Altura
     *
     * @return decimal
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * Set the value of Altura
     *
     * @param decimal altura
     *
     * @return self
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;

        return $this;
    }

}
