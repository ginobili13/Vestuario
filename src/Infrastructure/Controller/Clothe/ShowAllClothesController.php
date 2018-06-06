<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 31/05/18
 * Time: 10:47
 */

namespace App\Infrastructure\Controller\Clothe;


use App\Application\Clothe\ShowAllClothes\ShowAllClothes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ShowAllClothesController extends Controller
{
    public function showAllClothes(ShowAllClothes $showAllUsers)
    {

        $allClothes = $showAllUsers->execute();

        return new Response($allClothes);
    }
}

