<?php

namespace App\Domain\Model\Entity\Size;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="SizesRepository")
 */
class Sizes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idClothes;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $size;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdClothes()
    {
        return $this->idClothes;
    }

    /**
     * @param mixed $idClothes
     */
    public function setIdClothes($idClothes): void
    {
        $this->idClothes = $idClothes;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock): void
    {
        $this->stock = $stock;
    }
}
