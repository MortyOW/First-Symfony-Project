<?php

namespace App\Controller;

use App\Repository\DistrictRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    public function nav(DistrictRepository $districtRepository): Response
    {
        return $this->render('menu/nav.html.twig', [
            'districts' => $districtRepository->findAll(),
        ]);
    }
}
