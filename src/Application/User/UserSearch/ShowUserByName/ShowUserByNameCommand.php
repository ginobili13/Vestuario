<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 26/04/18
 * Time: 11:43
 */

namespace App\Application\User\UserSearch\ShowUserByName;

use Assert\Assertion;

class ShowUserByNameCommand
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        Assertion::notBlank($name, 'Tienes que especificar un nombre de empleado');
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }


}