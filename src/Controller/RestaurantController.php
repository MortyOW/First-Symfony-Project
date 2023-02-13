<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    #[Route('/restaurant/{id}', name: 'restaurant_show')]
    public function show($id, RestaurantRepository $restaurantRepository): Response
    {
        $restaurant = $restaurantRepository->find($id);
        if(!$restaurant){
            throw $this->createNotFoundException('Restaurant Not Found');
        }
        return $this->render('restaurant/index.html.twig', [
            'restaurant' => $restaurant,
        ]);
    }
}
