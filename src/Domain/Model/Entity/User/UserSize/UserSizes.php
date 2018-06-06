<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:38
 */

namespace App\Domain\Model\Entity\User\UserSize;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="UserSizesRepository")
 */
class UserSizes
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
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\Clothe\Clothes", inversedBy="userSizes")
     * @ORM\JoinColumn(name="clothes_id", referencedColumnName="id")
     */
    private $clothe;

    public function __construct() {
        $this->clothe = new ArrayCollection();
    }
    /**
     * @ORM\Column(type="string")
     */
    private $userSize;

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
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $user
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getClothe()
    {
        return $this->clothe;
    }

    /**
     * @param mixed $clothe
     */
    public function setClothe($clothe): void
    {
        $this->clothe = $clothe;
    }

    /**
     * @return mixed
     */
    public function getUserSize()
    {
        return $this->userSize;
    }

    /**
     * @param mixed $userSize
     */
    public function setUserSize($userSize): void
    {
        $this->userSize = $userSize;
    }

}