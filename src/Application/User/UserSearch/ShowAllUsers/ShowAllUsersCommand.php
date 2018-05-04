<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 2/05/18
 * Time: 10:01
 */

namespace App\Application\User\UserSearch\ShowAllUsers;


use Assert\Assertion;

class ShowAllUsersCommand
{
    private $page;
    private $limit;

    public function __construct($page, $limit)
    {
        Assertion::notBlank($page, 'Tienes que especificar un numero de pagina');
        Assertion::numeric($page, 'El valor no es un número');

        $this->page = $page;

        Assertion::notBlank($limit, 'Tienes que especificar un limite');
        Assertion::numeric($limit, 'El valor no es un número');

        $this->limit = $limit;
    }

    /**
     * @return mixed
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }
}
