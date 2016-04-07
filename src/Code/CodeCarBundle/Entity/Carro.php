<?php

    namespace Code\CodeCarBundle\Entity;
    use Doctrine\ORM\Mapping as ORM;
    /**
    * Carros
    * @ORM\Table()
    * @ORM\Entity(repositoryClass="Code\CodeCarBundle\Repository\CarroRepository")
    */
    class Carro
    {
        /**
        * @var integer
        * @ORM\Column(name="id", type="integer")
        * @ORM\Id
        * @ORM\GeneratedValue(strategy="AUTO")
        */
        private $id;
        /**
        *@var string
        * @ORM\Column(name="modelo", type="string", length=80 )
        */
        private $modelo;
        /**
        *@var integer
        * @ORM\Column(name="id_fabricante", type="integer", nullable=true)
        */
        private $fabricante;
        /**
        *@var date
        * @ORM\Column(name="ano", type="datetime")
        */
        private $ano;
        /**
        *@var string
        * @ORM\Column(name="cor", type="string", length=20)
        */
        private $cor;

    /**
     * Set the value of Carros
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Carros
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Modelo
     *
     * @param mixed modelo
     *
     * @return self
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get the value of Modelo
     *
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of Fabricante
     *
     * @param mixed fabricante
     *
     * @return self
     */
    public function setFabricante($fabricante)
    {
        $this->fabricante = $fabricante;

        return $this;
    }

    /**
     * Get the value of Fabricante
     *
     * @return mixed
     */
    public function getFabricante()
    {
        return $this->fabricante;
    }

    /**
     * Set the value of Ano
     *
     * @param mixed ano
     *
     * @return self
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get the value of Ano
     *
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set the value of Cor
     *
     * @param mixed cor
     *
     * @return self
     */
    public function setCor($cor)
    {
        $this->cor = $cor;

        return $this;
    }

    /**
     * Get the value of Cor
     *
     * @return mixed
     */
    public function getCor()
    {
        return $this->cor;
    }


}
