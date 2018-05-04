<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:38
 */

namespace App\Domain\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Infrastructure\Domain\Model\Repository\UserSizesRepository")
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
    private $user_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\Clothes")
     * @ORM\JoinColumn(name="clothes_id", referencedColumnName="id")
     */
    private $clothe;

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
        return $this->user_id;
    }

    /**
     * @param mixed $user
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
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
        $this->clothe_id = $clothe;
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