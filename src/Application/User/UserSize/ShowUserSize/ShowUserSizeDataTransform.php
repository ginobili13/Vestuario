<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 14:21
 */

namespace App\Application\User\UserSize\ShowUserSize;

use App\Application\User\DataTransformInterface;
use App\Domain\Model\Entity\Clothe\Clothes;
use App\Domain\Model\Entity\User\UserSize\UserSizes;

class ShowUserSizeDataTransform implements DataTransformInterface
{
    /**
     * @param array|Clothes[] $clothes
     * @return array
     */
    public function transform(array $clothes)
    {
        $userTransform = [];


        foreach($clothes as $clothe) {

            $userSizesId = [];
            $userSizes = [];
            /**
             * @var UserSizes $userSize
             */
            foreach($clothe->getUserSizes()->toArray() as $userSize) {
                $userSizesId = $userSize->getUserId();
                $userSizes = $userSize->getUserSize();
            }
            $userTransform [] = [
                'clothe_name' => $clothe->getName(),
                'clothe_id' => $clothe->getId(),
                'user_id' => $userSizesId,
                'user_size' => $userSizes,
            ];
        }
        return json_encode($userTransform);
    }
}
