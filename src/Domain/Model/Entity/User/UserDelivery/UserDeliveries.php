<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 25/04/18
 * Time: 8:43
 */

namespace App\Domain\Model\Entity\User\UserDelivery;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="UserDeliveriesRepository")
 */
class UserDeliveries
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\User\Users")
     * @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\Clothe\Clothes")
     * @ORM\JoinColumn(name="clothes_id", referencedColumnName="id")
     */
    private $clothe;

    /**
     * @ORM\Column(type="string")
     */
    private $dateDelivery;

    /**
     * @ORM\Column(type="integer", length=2)
     */
    private $quantity;

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
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
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
    public function getDateDelivery()
    {
        return $this->dateDelivery;
    }

    /**
     * @param mixed $dateDelivery
     */
    public function setDateDelivery($dateDelivery): void
    {
        $this->dateDelivery = $dateDelivery;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }


}