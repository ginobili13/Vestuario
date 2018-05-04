<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 12:23
 */

namespace App\Application\User\UserSearch\ShowUserBySubDepartments;

use App\Domain\Model\Entity\Users;

class ShowUserBySubDepartmentsDataTransform
{
    /**
     * @param array|Users[] $users
     * @return array
     */
    public function transform(array $users)
    {
        $userTransform = [];
        foreach ($users as $user) {

            $userTransform []= [

                'id' => $user->getId(),
                'name' => $user->getName(),
                'dateFirstCTT' => $user->getDateFirstCTT(),
                'dateOld' => $user->getDateOld(),
                'dateExpirationCTT' => $user->getDateExpirationCTT(),
                'department' => $user->getDepartment()->getName(),
                'subDepartment' => $user->getSubDepartment()->getName(),
                'datePossibleRenovation' => $user->getDatePossibleRenovation(),
                'employeeCode' => $user->getEmployeeCode(),
                'nif' => $user->getNif(),
                'phoneNumber' => $user->getPhoneNumber(),
                'availableHolidays' => $user->getDaysAvailableHolidays(),
                'daysDebtsRequest' => $user->getDaysDebtsRequest(),
                'socialSecurity' => $user->getSocialSecurity(),
                'image' => $user->getImage()
            ];
        }
        return json_encode($userTransform);
    }
}