<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:27
 */

namespace App\Domain\Model\Entity\Clothe;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ClothesRepository")
 */
class Clothes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $clothes;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @return mixed
     */

    /**
     * @ORM\OneToMany(targetEntity="App\Domain\Model\Entity\User\UserSize\UserSizes", mappedBy="clothe")
     */
    private $userSizes;

    public function __construct() {
        $this->userSizes = new ArrayCollection();
    }

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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->clothes;
    }

    /**
     * @param mixed $clothes
     */
    public function setName($clothes): void
    {
        $this->clothes = $clothes;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getUserSizes()
    {
        return $this->userSizes;
    }
}
