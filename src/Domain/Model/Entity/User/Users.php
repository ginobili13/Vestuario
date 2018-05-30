<?php

namespace App\Domain\Model\Entity\User;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $employeeCode;

    /**
     * @ORM\Column(type="string")
     */
    private $nif;

    /**
     * @ORM\Column(type="integer")
     */
    private $socialSecurity;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\Department\Departments")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    private $department;

    /**
     * @ORM\ManyToOne(targetEntity="App\Domain\Model\Entity\Department\SubDepartment\SubDepartments")
     * @ORM\JoinColumn(name="subDepartment_id", referencedColumnName="id")
     */
    private $subDepartment;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @ORM\Column(type="string")
     */
    private $dateFirstCTT;

    /**
     * @ORM\Column(type="string")
     */
    private $dateOld;

    /**
     * @ORM\Column(type="string")
     */
    private $dateExpirationCTT;

    /**
     * @ORM\Column(type="string")
     */
    private $datePossibleRenovation;

    /**
     * @ORM\Column(type="integer")
     */
    private $daysAvailableHolidays;

    /**
     * @ORM\Column(type="integer")
     */
    private $daysDebtsRequest;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmployeeCode()
    {
        return $this->employeeCode;
    }

    /**
     * @param mixed $employeeCode
     */
    public function setEmployeeCode($employeeCode): void
    {
        $this->employeeCode = $employeeCode;
    }

    /**
     * @return mixed
     */
    public function getNif()
    {
        return $this->nif;
    }

    /**
     * @param mixed $nif
     */
    public function setNif($nif): void
    {
        $this->nif = $nif;
    }

    /**
     * @return mixed
     */
    public function getSocialSecurity()
    {
        return $this->socialSecurity;
    }

    /**
     * @param mixed $socialSecurity
     */
    public function setSocialSecurity($socialSecurity): void
    {
        $this->socialSecurity = $socialSecurity;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getDateFirstCTT()
    {
        return $this->dateFirstCTT;
    }

    /**
     * @param mixed $dateFirstCTT
     */
    public function setDateFirstCTT($dateFirstCTT): void
    {
        $this->dateFirstCTT = $dateFirstCTT;
    }

    /**
     * @return mixed
     */
    public function getDateOld()
    {
        return $this->dateOld;
    }

    /**
     * @param mixed $dateOld
     */
    public function setDateOld($dateOld): void
    {
        $this->dateOld = $dateOld;
    }

    /**
     * @return mixed
     */
    public function getDateExpirationCTT()
    {
        return $this->dateExpirationCTT;
    }

    /**
     * @param mixed $dateExpirationCTT
     */
    public function setDateExpirationCTT($dateExpirationCTT): void
    {
        $this->dateExpirationCTT = $dateExpirationCTT;
    }

    /**
     * @return mixed
     */
    public function getDatePossibleRenovation()
    {
        return $this->datePossibleRenovation;
    }

    /**
     * @param mixed $datePossibleRenovation
     */
    public function setDatePossibleRenovation($datePossibleRenovation): void
    {
        $this->datePossibleRenovation = $datePossibleRenovation;
    }

    /**
     * @return mixed
     */
    public function getDaysAvailableHolidays()
    {
        return $this->daysAvailableHolidays;
    }

    /**
     * @param mixed $daysAvailableHolidays
     */
    public function setDaysAvailableHolidays($daysAvailableHolidays): void
    {
        $this->daysAvailableHolidays = $daysAvailableHolidays;
    }

    /**
     * @return mixed
     */
    public function getDaysDebtsRequest()
    {
        return $this->daysDebtsRequest;
    }

    /**
     * @param mixed $daysDebtsRequest
     */
    public function setDaysDebtsRequest($daysDebtsRequest): void
    {
        $this->daysDebtsRequest = $daysDebtsRequest;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartmentId($department): void
    {
        $this->departmentId = $department;
    }

    /**
     * @return mixed
     */
    public function getSubDepartment()
    {
        return $this->subDepartment;
    }

    /**
     * @param mixed $subDepartment
     */
    public function setSubDepartmentId($subDepartment): void
    {
        $this->subDepartmentId = $subDepartment;
    }


}
