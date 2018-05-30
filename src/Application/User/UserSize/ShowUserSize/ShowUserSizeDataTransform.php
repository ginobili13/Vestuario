<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 14:21
 */

namespace App\Application\User\UserSize\ShowUserSize;

use App\Application\User\DataTransformInterface;
use App\Domain\Model\Entity\User\UserSizes;

class ShowUserSizeDataTransform implements DataTransformInterface
{
    /**
     * @param array|userSizes[] $userSizes
     * @return array
     */
    public function transform(array $userSizes)
    {
        $userTransform = [];

        foreach ($userSizes as $userSize) {

            $userTransform [] = [
                'id' => $userSize->getId(),
                'clothe_name' => $userSize->getClothe()->getName(),
                'clothe_type' => $userSize->getClothe()->getType(),
                'user_size' => $userSize->getUserSize(),
                'user_id' => $userSize->getUserId(),
                ];
        }
        return json_encode($userTransform);
    }
}
