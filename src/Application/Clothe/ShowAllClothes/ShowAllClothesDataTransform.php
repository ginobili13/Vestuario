<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 9:29
 */

namespace App\Application\Clothe\ShowAllClothes;


use App\Application\User\DataTransformInterface;
use App\Domain\Model\Entity\Clothe\Clothes;

class ShowAllClothesDataTransform implements DataTransformInterface
{
    /**
     * @param array|Clothes[] $clothes
     * @return string
     */
    public function transform(array $clothes)
    {
        $clotheTransform = [];
        foreach ($clothes as $clothe) {

            $clotheTransform []= [

                'id' => $clothe->getId(),
                'clothe' => $clothe->getName(),
                'type' => $clothe->getType()
            ];
        }
        return json_encode($clotheTransform);
    }
}